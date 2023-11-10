<?php

namespace App\Http\Controllers;

use App\Models\Apparaisal;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppraisalRequest;
use App\Http\Requests\UpdateAppraisalRequest;

class ApparaisalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apparaisal = Apparaisal::get();
        return view('apparaisal', ['apparaisal' => $apparaisal]);
    
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
    public function store(StoreAppraisalRequest $request)
    {
        $validatedData = $request->validated();
        Apparaisal::create($validatedData);
        return back()->with('message', 'Avalúo creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apparaisal $apparaisal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apparaisal $apparaisal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppraisalRequest $request, Apparaisal $apparaisal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apparaisal $apparaisal)
    {
        //
    }
}
