<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BetslipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $betslips = auth()->user()->betSlips()->with('bets')->latest()->get();
        return response()->json($betslips);
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
    public function show(BetSlip $betSlip)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
