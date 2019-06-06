<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Cliente::where('user_id', Auth::user()->id)->orderBy('id')->paginate(5);
        return view('Cliente/index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = Auth::user()->id;
        $this->validate($request,[
          'codigo'=>'required',
          'nombres'=>'required',
          'apellidos'=>'required',
          'celular'=>'required',
          'email'=>'required']);
        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Registro creado satisfactoriamente');
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
        $cliente = cliente::find($id);
        return view('Cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        //
        $this->validate($request,[ 'nombres'=>'required', 'apellidos'=>'required', 'celular'=>'required', 'email'=>'required', 'foto'=>'required']);

        libro::find($id)->update($request->all());
        return redirect()->route('cliente.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cliente::where('id', $id)->delete();
      return redirect('/');
    }
}
