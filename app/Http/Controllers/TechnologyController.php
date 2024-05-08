<?php

namespace App\Http\Controllers;

use App\Models\technology;
use App\Http\Requests\StoretechnologyRequest;
use App\Http\Requests\UpdatetechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoretechnologyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetechnologyRequest $request, technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(technology $technology)
    {
        //
    }
}
