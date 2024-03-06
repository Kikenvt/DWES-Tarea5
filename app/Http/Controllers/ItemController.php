<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Box;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('items.index', [
            'items' => Item::latest()->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'items.create',
            ['boxes' => Box::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);


        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/photos');
        }

        Item::create($validated);

        return redirect('items')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item,
            'boxes' => Box::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item): View
    {
        return view(
            'items.edit',
            [
                'item' => $item,
                'boxes' => Box::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/photos');

            if ($item->picture) {
                Storage::delete($item->picture);
            }
        }

        $item->update($validated);

        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->picture) {
            Storage::delete($item->picture);
        }

        $item->delete();

        return redirect('items')->with('success', 'Item deleted successfully');
    }
}
