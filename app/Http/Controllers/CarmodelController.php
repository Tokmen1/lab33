<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Carmodel;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //look up the country by its 2-letter code
        $manufacturers = Manufacturer::where('id','=', $id)->first();
        
        $carmodels = $manufacturers->carmodels()->get(); 
        return view('carmodels', ['manufacturers' => $manufacturers, 'carmodels' => $carmodels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $manufacturer = Manufacturer::where('id','=', $id)->first();
        return view('carmodel_new', compact('manufacturer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carmodel = new Carmodel();
        $carmodel->name = $request->carmodel_name;
        $carmodel->manufacturer_id = $request->manufacturer_id;
        $carmodel->save();

        #to perform a redirect back, we need country code from ID
        $manufacturer = manufacturer::findOrFail($request->manufacturer_id);
        $action = action([CarmodelController::class, 'index'], ['id' => $manufacturer->id]);
        return redirect($action);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $carmodel = Carmodel::findOrFail($id);
    //     return view('manufacturer_edit', compact('carmodel'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $carmodel = Carmodel::findOrFail($id);
    //     $carmodel->name = $request->carmodel_name;
    //     $carmodel->save();
    //     return redirect(action([CarmodelController::class, 'index'], ['id' => $carmodel->manufacturer->country->code]));
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     Carmodel::findOrfail($id)->delete();
    //     $manufacturer = Manufacturer::findOrFail($request->manufacturer_id);
    //     $action = action([CarmodelController::class, 'index'], ['id' => $manufacturer->id]);
    //     return redirect($action);
    // }
}