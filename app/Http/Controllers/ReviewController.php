<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view("admin.reviews.index", compact("reviews"));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'image' => 'required|image',
            'text' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $reviews = Review::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imagePath,
            'text' => $request->text,
        ]);

        return redirect()->route('admin.reviews.index')->with('success','Created');
    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success','Deleted');
    }
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'image' => 'required|image',
            'text' => 'required|string',
        ]); 

        $imagePath = $request->file('image')->store('images', 'public');

        $review->update([
            'name'=> $request->name,
            'role'=> $request->role,
            'image'=> $imagePath,
            'text' => $request->text
        ]);
        return redirect()->route('admin.reviews.index')->with('success','Updated');
    }
}
