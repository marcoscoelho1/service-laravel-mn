<?php

namespace App\Http\Controllers;

use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();

        return response()->json($states);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $state = State::find($id);

        return response()->json($state);
    }
}
