<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();

        return response()->json($cities);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);

        return response()->json($city);
    }
}
