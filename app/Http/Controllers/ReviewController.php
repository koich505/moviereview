<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        return $this->authorizeResource(Review::class, 'review');
        //
    }
    public function index()
    {
        $reviews = Review::all()->sortByDesc('created_at');
        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function create()
    {
        return view('reviews/create');
    }

    public function store(ReviewRequest $request, Review $review)
    {
        $review->fill($request->all());
        $review->user_id = $request->user()->id;
        $review->save();
        return redirect()->route('reviews.index');
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', ['review'=>$review]);
    }

    public function update(Request $request, Review $review)
    {
        $review->fill($request->all())->save();
        return redirect()->route('reviews.index');
    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index');
    }

    public function show(Review $review)
    {
        return view('reviews.show',['review'=>$review]);
    }
}
