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
          'apellidos'=>'required']);

          $cliente = new Cliente;

          $cliente->codigo = $request->codigo;
          $cliente->cedula = $request->cedula;
          $cliente->expedicion = $request->expedicion;
          $cliente->nombres = $request->nombres;
          $cliente->apellidos = $request->apellidos;
          $cliente->direccion = $request->direccion;
          $cliente->barrio = $request->barrio;
          $cliente->ciudad = $request->ciudad;
          $cliente->departamento = $request->departamento;
          $cliente->nacimiento = $request->nacimiento;
          $cliente->celular = $request->celular;
          $cliente->referido_id = $request->referido_id;
          $cliente->referido_nombre = $request->referido_nombre;
          $cliente->email = $request->email;
          $cliente->activacion = $request->activacion;
          $cliente->chip = $request->chip;
          $cliente->numero_temporal_flash = $request->numero_temporal_flash;
          $cliente->valor_recarga_activacion = $request->valor_recarga_activacion;
          $cliente->plan_flash_mobile = $request->plan_flash_mobile;
          $cliente->numero_a_portar = $request->numero_a_portar;
          $cliente->operador = $request->operador;
          $cliente->tipo_plan_operador_actual = $request->tipo_plan_operador_actual;
          $cliente->nip = $request->nip;
          $cliente->fecha_portabilidad = $request->fecha_portabilidad;
          $cliente->fecha_renovacion = $request->fecha_renovacion;
          $cliente->cuenta_flash = $request->cuenta_flash;
          $cliente->contrasena_cuenta = $request->contrasena_cuenta;
          $cliente->correo_creado = $request->correo_creado;
          $cliente->contrasena_correo = $request->contrasena_correo;
          $cliente->estado = $request->estado;
          $cliente->user_id = $request->user_id;
          if ($request->hasFile('foto_chip')) {
                  $storagePath = $request->foto_chip->store('public');
                  if(basename($storagePath)!=""){
                      $cliente->foto_chip = basename($storagePath);
                  }
          }
          if ($request->hasFile('foto')) {
                  $storagePath = $request->foto->store('public');
                  if(basename($storagePath)!=""){
                      $cliente->foto = basename($storagePath);
                  }
          }
          $cliente->save();

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
    public function update(Request $request, $id)
    {        //
        $this->validate($request,[ 'nombres'=>'required', 'apellidos'=>'required', 'codigo'=>'required']);

        $cliente = Cliente::find($request->id);
        $cliente->codigo = $request->codigo;
        $cliente->cedula = $request->cedula;
        $cliente->expedicion = $request->expedicion;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->direccion = $request->direccion;
        $cliente->barrio = $request->barrio;
        $cliente->ciudad = $request->ciudad;
        $cliente->departamento = $request->departamento;
        $cliente->nacimiento = $request->nacimiento;
        $cliente->celular = $request->celular;
        $cliente->referido_id = $request->referido_id;
        $cliente->referido_nombre = $request->referido_nombre;
        $cliente->email = $request->email;
        $cliente->activacion = $request->activacion;
        $cliente->chip = $request->chip;
        $cliente->numero_temporal_flash = $request->numero_temporal_flash;
        $cliente->valor_recarga_activacion = $request->valor_recarga_activacion;
        $cliente->plan_flash_mobile = $request->plan_flash_mobile;
        $cliente->numero_a_portar = $request->numero_a_portar;
        $cliente->operador = $request->operador;
        $cliente->tipo_plan_operador_actual = $request->tipo_plan_operador_actual;
        $cliente->nip = $request->nip;
        $cliente->fecha_portabilidad = $request->fecha_portabilidad;
        $cliente->fecha_renovacion = $request->fecha_renovacion;
        $cliente->cuenta_flash = $request->cuenta_flash;
        $cliente->contrasena_cuenta = $request->contrasena_cuenta;
        $cliente->correo_creado = $request->correo_creado;
        $cliente->contrasena_correo = $request->contrasena_correo;
        $cliente->estado = $request->estado;
        $cliente->user_id = $request->user_id;
        if ($request->hasFile('foto_chip')) {
                $storagePath = $request->foto_chip->store('public');
                if(basename($storagePath)!=""){
                    $cliente->foto_chip = basename($storagePath);
                }
        }
        if ($request->hasFile('foto')) {
                $storagePath = $request->foto->store('public');
                if(basename($storagePath)!=""){
                    $cliente->foto = basename($storagePath);
                }
        }
        $cliente->save();

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
      $cliente = Cliente::find($id);
      $cliente->estado = "inactivo";
      $cliente->save();
      return redirect('/');
    }
    public function activar($id)
    {
      $cliente = Cliente::find($id);
      $cliente->estado = "activo";
      $cliente->save();
      return redirect('/');
    }
}
