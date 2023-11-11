<?php

namespace App\Http\Controllers;

use App\Models\Reconsiderations;
use App\Http\Requests\StoreReconsiderationsRequest;
use App\Http\Requests\UpdateReconsiderationsRequest;

class ReconsiderationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reconsiderations = Reconsiderations::get();
        return view('reconsiderations', ['reconsiderations' => $reconsiderations]);
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
    public function store(StoreReconsiderationsRequest $request)
    {
        $validatedData = $request->validated();
        Reconsiderations::create($validatedData);
        return back()->with('message', 'Reconsideración creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reconsiderations $reconsiderations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reconsiderations $reconsiderations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReconsiderationsRequest $request, Reconsiderations $reconsiderations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reconsiderations $reconsiderations)
    {
        // Verifica si la reconsideración existe
          if (!$reconsideration) {
        return back()->with('error', 'La reconsideración no fue encontrada');
    }

     $reconsideration->delete();
     return back()->with('message', 'Reconsideración eliminada con éxito');

    }
}
