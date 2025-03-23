<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view("admin.cards.index", compact("cards"));
    }

    public function create()
    {
        return view('admin.cards.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $cards = Card::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cards.index')->with('success','Created');
    }
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('admin.cards.index')->with('success','Deleted');
    }
    public function edit(Card $card)
    {
        return view('admin.cards.edit', compact('card'));
    }
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $card->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $imagePath,
        ]);
        return redirect()->route('admin.cards.index')->with('success','Updated');
    }
}
