<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function Laravel\Prompts\alert;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loans.index', [
            'loans' => Loan::all(),
            'items' => Item::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $selectedItem = request()->input('item_id');

        return view('loans.create', [
            'items' => Item::all(),
            'users' => User::all(),
            'selectedItem' => $selectedItem,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'due_date' => 'required|date|after:today',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['checkout_date'] = now();

        Loan::create($validated);

        return redirect('loans')->with('success', 'Loan created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan): View
    {
        $loans = Loan::all();

        return view('loans.show', [
            'loan' => $loan,
            'item' => $loan->item,
            'user' => $loan->user,
            'loans' => $loans,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update(['returned_date' => now()]);
        return redirect('loans')->with('success', 'Loan updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }

    public function returnItem(Loan $loan)
    {
        $loan->is_returned = true;
        $loan->save();

        return redirect('loans')->with('success', 'Item returned');
    }
}
