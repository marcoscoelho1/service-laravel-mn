<?php

namespace App\Http\Controllers;

use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adresses =  Address::with('city.state')->get();

        return response()->json($adresses);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::with('city.state')->find($id);

        return response()->json($address);
    }
}
