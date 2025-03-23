<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Percent;
use App\Models\Review;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        $reviews = Review::all();
        $percent = Percent::all()->first();
        $reviewdata = [];
        $carddata = [];
        foreach ($reviews as $review) {
            $reviewdata[] = [
                'name' => $review->name,
                'role' => $review->role,
                'text' => $review->text,
                'image' => asset('storage/' . $review->image),
            ];
        }
        foreach ($cards as $card) {
            $carddata[] = [
                'title' => $card->title,
                'description' => $card->description,
                'image' => asset('storage/' . $card->image),
            ];
        }
        return response()->json([
            'reviews' => $reviewdata,
            'cards' => $carddata,
            'percent' => $percent->percent,
        ], 200);
    }
}
