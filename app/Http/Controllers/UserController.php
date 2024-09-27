<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::select('id', 'name', 'email')
            ->withTrashed()
            ->paginate('10');

        return [
            'status' => 200,
            'menssagem' => 'Usuários encontrados!!',
            'user' => $user
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        dd($someVariable);

        
       // $data = $request->all();

       // $user = User::create([
         //   'name' => $data['name'],
        //    'email' => $data['email'],
        //    'password' => bcrypt($data['password']),
      //  ]);

       // return [
       //     'status' => 200,
       //     'menssagem' => 'Usuário cadastrado com sucesso!!',
       //     'user' => $user
       //  ];
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if(!$user){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        return [
            'status' => 200,
            'message' => 'Usuário encontrado com sucesso!!',
            'user' => $user
        ];
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
    public function update(UserUpdateRequest $request, string $id)
    {
        $data = $request->all();

        $user = User::find($id);

        if(!$user){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        $user->update($data);

        return [
            'status' => 200,
            'message' => 'Usuário atualizado com sucesso!!',
            'user' => $user
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user){
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado! Que triste!',
                'user' => $user
            ];
        }

        $user->delete($id);

        return [
            'status' => 200,
            'message' => 'Usuário deletado com sucesso!!'
        ];

    }
}
