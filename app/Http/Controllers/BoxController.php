<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('boxes.index', [
            'boxes' => Box::all(),
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'label' => 'required|max:255',
                'location' => 'nullable|max:255',
            ]);

            Box::create($validated);

            return redirect('boxes')->with('success', 'Box created');
        } catch (\Exception $e) {
            return redirect('boxes')->with('error', 'Box not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box): View
    {
        $box->load('items');
        return view('boxes.show', [
            'box' => $box,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        return view('boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'required|max:255',
            'location' => 'nullable|max:255',
        ]);

        $box->update($validated);

        return redirect('boxes')->with('success', 'Box updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->items()->update(['box_id' => null]);
        $box->delete();

        return redirect('boxes')->with('success', 'Box deleted');
    }
}
