<?php

namespace App\Http\Controllers;

use App\Models\CDRRecord;
use App\Models\Parser;
use Illuminate\Http\Request;


class CDRRecordController extends Controller
{
    /**
     * Display all cdr records for the user.
     */
    public function index()
    {
        //
        $record = CDRRecord::all();
        return view("record.index", ["records" => $record]);
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
    public function show(CDRRecord $cdr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CDRRecord $cdr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CDRRecord $cdr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CDRRecord $cdr)
    {
        //
    }


    /**
     * Search for records that match the caller name field.
     * @param CDRRecord $cDRRecord
     * @return \Illuminate\Contracts\View\View
     */
    public function search_by_number(Request $request)
    {
        $all = CDRRecord::where('caller_number', $request->caller_number)->get();
        return view('record.search', ['results' => $all]);
    }

    /**
     * Search for a CDR record set by the caller name field
     * @param CDRRecord $cDRRecord
     * @return CDRRecord|\stdClass|null
     */
    public function search_by_name(CDRRecord $cdr): CDRRecord
    {
        return CDRRecord::first();
    }

    /**
     * Search for CDR Records by a date range.
     * @param CDRRecord $cDRRecord
     * @return CDRRecord
     */
    public function search_by_date(CDRRecord $cdr): CDRRecord
    {
        return CDRRecord::where('caller_name', $cdr->caller_name);
    }
}
