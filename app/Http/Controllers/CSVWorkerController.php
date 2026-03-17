<?php

namespace App\Http\Controllers;

use App\Models\CSVWorker;
use App\Http\Requests\StoreCSVWorkerRequest;
use App\Http\Requests\UpdateCSVWorkerRequest;

class CSVWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("csv.index");
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
    public function store(StoreCSVWorkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CSVWorker $csv)
    {
        return view("csv.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CSVWorker $csv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCSVWorkerRequest $request, CSVWorker $csv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CSVWorker $csv)
    {
        //
    }
}
