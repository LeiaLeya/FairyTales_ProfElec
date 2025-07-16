<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Character::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                ->orWhere('origin', 'like', "%$search%")
                ->orWhere('theme', 'like', "%$search%");
        }

        $characters = $query->get();

        return view('characters.index', compact('characters'));
    }

    public function uploadForm()
    {
        $characters = Character::all();
        return view('characters.upload', compact('characters'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'character_id' => 'required|exists:characters,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $character = Character::find($request->character_id);

        // Delete old image if it exists
        if ($character->image_path && Storage::disk('public')->exists($character->image_path)) {
            Storage::disk('public')->delete($character->image_path);
        }

        // Store new image
        $path = $request->file('image')->store('characters', 'public');
        $character->image_path = $path;
        $character->save();

        return redirect()->route('characters.upload')->with('success', 'Image updated!');
    }

    public function ajaxSearch(Request $request)
    {
        $query = Character::query();
        $search = $request->search;
        if ($request->has('search') && trim($search) !== '') {
            $query->where('name', 'like', "%$search%")
                ->orWhere('origin', 'like', "%$search%")
                ->orWhere('theme', 'like', "%$search%");
        }
        $characters = $query->get();
        return view('characters._grid', compact('characters'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
