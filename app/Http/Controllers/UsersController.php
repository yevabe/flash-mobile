<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::orderBy('id')->paginate(5);
        return view('User/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_exist = User::where("email", $request->email)->count();
        if($user_exist==0){
          $this->validate($request,[ 'username'=>'required', 'name'=>'required', 'email'=>'required', 'password'=>'required']);


          $password = $request->password; // password is form field
          $hashed = \Hash::make($password);

          $user = new User;

          $user->name = $request->name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->password = $hashed;


          $user->save();

          $request->session()->flash('success', 'Registro creado satisfactoriamente');
          return redirect()->route('tiendas.index');
        }else{
          $request->session()->flash('error', 'Ya existe una tienda con este correo electrónico');
          return redirect()->route('tiendas.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('User.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[ 'username'=>'required', 'name'=>'required', 'email'=>'required', 'password'=>'required']);

        User::find($request->id)->update($request->all());
        return redirect()->route('tiendas.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::where('id', $id)->delete();
      return redirect('/tiendas');
    }
}
