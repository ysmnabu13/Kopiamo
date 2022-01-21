<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\OrderItem;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Rating::all();
        return view('review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   //$reviews = Rating::all();
        //return view('review.create',compact('reviews'))->with(['orderid'=>$orderid]);
    }

    public function addreview($orderid)
    {   
       // $review=Review::where('order_id',$orderid)->get();
       
       $reviews = Rating::all();
       if (Rating::where('order_id',$orderid)->first())
       {
        return view('review.index');
       }
       else
       return view('review.create',compact('reviews'))->with(['orderid'=>$orderid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Rating;
        $review->user_id = auth()->id();
        $review->order_id = $request->input('orderid');
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');

        $review->save();
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('review.reviewdetails',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $reviews = Rating::orderBy('id', 'DESC')->get();
        return view('review.eachuserlist',compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review->delete();
        return redirect()->route('review.index');
    }
}
