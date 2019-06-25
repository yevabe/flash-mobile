<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin==0){
          return redirect('home');
        }
        $users= User::orderBy('id')->paginate(7);
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
        $code_exist = User::where("username", $request->username)->count();

        if($user_exist==0 && $code_exist==0){
          $this->validate($request,[ 'username'=>'required', 'name'=>'required', 'password'=>'required']);


          $user = new User;

          $user->name = $request->name;
          $user->username = $request->username;
          $user->email = $request->email;

          if($request->password!=""){
            $password = $request->password; // password is form field
            $hashed = \Hash::make($password);
            $user->password = $hashed;
          }

          $user->celular = $request->celular;
          if ($request->hasFile('foto')) {
            $storagePath = $request->foto->store('public');
            if(basename($storagePath)!=""){
                $user->foto = basename($storagePath);
            }
          }
          $user->save();

          $request->session()->flash('success', 'Registro creado satisfactoriamente');
          return redirect()->route('tiendas.index');
        }else{
          if($user_exist > 0){
            $request->session()->flash('error', 'Ya existe una tienda con este correo electrónico');
          }elseif($code_exist > 0){
            $request->session()->flash('error', 'Ya existe una tienda con este código');
          }
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
    public function perfil()
    {
      $user = User::find(Auth::user()->id);
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
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password!=""){
          $password = $request->password; // password is form field
          $hashed = \Hash::make($password);
          $user->password = $hashed;
        }
        $user->celular = $request->celular;
        if ($request->hasFile('foto')) {
              $storagePath = $request->foto->store('public');
              if(basename($storagePath)!=""){
                  $user->foto = basename($storagePath);
              }
        }
        $user->active = $request->active;

        $user->save();

        $this->validate($request,[ 'username'=>'required', 'name'=>'required']);

        if(Auth::user()->admin==0){
          return redirect()->route('tiendas.perfil')->with('success','Registro actualizado satisfactoriamente');
        }

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
      $user = User::find($id);
      $user->active = 0;
      $user->save();

      return redirect('/tiendas');
    }
    public function activar($id)
    {
      $user = User::find($id);
      $user->active = 1;
      $user->save();
      return redirect('/tiendas');
    }
}
