<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select(['id', 'name', 'email', 'id_address'])
            ->with('address.city.state')
            ->get();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->street = $request->address['street'];


        $address->number = $request->address['number'];
        $address->zipCode = $request->address['zipCode'];
        $address->id_city = $request->address['id_city'];


        if (!$address->save()) {
            return response(['message' => 'Erro ao salvar endereço.'], 500);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_address = $address->id;

        if (!$user->save()) {
            return response(['message' => 'Erro ao salvar usuário.'], 500);
        }

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::select(['id', 'name', 'email', 'id_address'])
            ->with('address.city.state')
            ->find($id);

        return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if (!$user->save()) {
            return response(['message' => 'Erro ao editar usuário.'], 500);
        }

        $address = $user->address;
        if ($address) {
            $address->update([
                'street' => $request->address['street'],
                'number' => $request->address['number'],
                'zipCode' => $request->address['zipCode'],
                'id_city' => $request->address['id_city'],
            ]);
        } else {
            return response(['message' => 'Endereço não encontrado.'], 404);
        }

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response(['message' => 'No data found.'], 203);
        }

        if (!$user::destroy($id)) {
            return response(['message' => 'Error to delete data.'], 500);
        }

        return response(['message' => 'User removed.'], 201);
    }
}
