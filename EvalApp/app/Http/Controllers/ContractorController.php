<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractors = Contractor::get();
        return view('contractors', ['contractors' => $contractors]);
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
    public function store(StoreContractorRequest $request)
    {
        $validatedData = $request->validated();
        Contractor::create($validatedData);
        return back()->with('message', 'Contratista Creado Con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractor $contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contractor $contractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractorRequest $request)
    {
        $request->validated();

        try {
            $contractor = Contractor::where('id',$request->id)->first();
            $contractor->name = $request->name;
            $contractor->phone = $request->phone;
            $contractor->email = $request->email;
            $contractor->save();

            return back()->with('message', 'Contratista actualizado con éxito');
        } catch (\Exception $e) {
            return back()->with('error', 'Se produjo un error al actualizar el contratista');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $contractor = Contractor::findOrFail($request->id);
            $contractor->delete();
    
            return back()->with('message', 'Contratista eliminado con éxito');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'No se encontró al contratista');
        } catch (\Exception $e) {
            return back()->with('error', 'Se produjo un error al eliminar al contratista');
        }
    }
}
