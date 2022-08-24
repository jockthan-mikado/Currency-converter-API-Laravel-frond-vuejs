<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use Illuminate\Http\Request;
use App\Http\Requests\PairRequest;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pair = Pair::with('currencyFrom','currencyTo')->get();
        return response()->json([
            'status' => true,
            'currencies'=> $pair,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\PairRequest  $pairRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PairRequest $pairRequest)
    {
        $pair = Pair::create($pairRequest->validated()->all());
        // dd($request->all());
        return response()->json([
            'status' => true,
            'message'=>"ok",
            'post' => $pair
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PairRequest $pairRequest, Pair $pair)
    {
        $pair->update($pairRequest->all());
        return response()->json([
            'status' => true,
            'message'=>"ok",
            'post' => $pair
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
