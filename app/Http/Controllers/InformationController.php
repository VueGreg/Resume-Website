<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Http\Requests\StoreinformationRequest;
use App\Http\Requests\UpdateinformationRequest;

class InformationController extends Controller
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
    public function store(StoreinformationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinformationRequest $request, information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(information $information)
    {
        //
    }
}
