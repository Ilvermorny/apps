<?php

namespace App\Http\Controllers;

use \App\User;

use Illuminate\Http\Request;

use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = [
            'password' => 'required|min:6|max:18',
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'type' => 'required',
        ];

        $messages = [
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'Debes ingresar al menos 6 caracteres',
            'password.max' => 'Debes ingresar máximo 18 caracteres',
            'name.unique' => 'El nombre de usuario seleccionado ya existe',
            'name.required' => 'El campo es requerido',
            'email.unique' => 'El email ya está en uso',
            'email.required' => 'El campo es requerido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $user = new User();
        $user->name = $request->get('name');
        $user->password = Hash::make($request->get('password'));
        $user->email = $request->get('email');
        $user->type = $request->get('type');
        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin/users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        \Alert::success('Usuario actualizado correctamente');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function password(User $user)
    {
        return view('admin/users/password', compact('user'));
    }
    public function updatePassword(Request $request, User $user)
    {
        $rules = [
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'Debes ingresar al menos 6 caracteres',
            'password.max' => 'Debes ingresar máximo 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
            return redirect(route('users.password', $user))->withErrors($validator);

        $user->update([
            'password' => bcrypt($request->get('password'))
        ]);

        \Alert::success('La contraseña se cambió correctamente');
        return redirect(route('users.index'));

        //return view('admin/users/password');
    }
}
