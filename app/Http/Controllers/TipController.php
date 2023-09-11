<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tips = Tip::all();
        return view('blog.index', ['tips' => $tips]);
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
    public function show(string $name)
    {
        $tip = Tip::where('name', $name)->first();
        return view('blog.show', ['tip' => $tip]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tip $Tip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tip $Tip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tip $Tip)
    {
        //
    }
}
