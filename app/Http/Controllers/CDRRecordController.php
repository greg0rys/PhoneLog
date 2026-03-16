<?php

namespace App\Http\Controllers;

use App\Models\CDRRecord;
use Illuminate\Http\Request;

class CDRRecordController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CDRRecord $cDRRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CDRRecord $cDRRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CDRRecord $cDRRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CDRRecord $cDRRecord)
    {
        //
    }

    /**
     * Summary of parsed CDR File.
     * @param CDRRecord $cDRRecord - the CDR Record object to parse.
     * @return void
     */
    private function parse(CDRRecord $cDRRecord)
    {
        if(!$cDRRecord)
            return;

        CDRRecord::create([
            '' => '',
        ]);
    }

    /**
     * Search for all records for a given phone number and return them in a grouped view
     * @param CDRRecord $cDRRecord
     * @return \Illuminate\Contracts\View\View
     */
    public function search(CDRRecord $cDRRecord)
    {
        $all = CDRRecord::where('caller_number', $cDRRecord->caller_number)->get();
        return view('record.search', ['results' => $all]);
    }
}
