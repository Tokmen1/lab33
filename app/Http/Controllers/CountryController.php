<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the countries.
     */
    public function index()
    {
        $countries = Country::all();
        return view('countries', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('country_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $country = new Country();
        $country->name = $request->country_name;
        $country->code = $request->country_code;
        $country->save();

        #to perform a redirect back, we need country code from ID
        $action = action([CountryController::class, 'index']);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::findOrfail($id)->delete();
        return redirect('country/');
    }
}
