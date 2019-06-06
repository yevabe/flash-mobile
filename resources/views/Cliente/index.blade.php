@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Clientes</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('cliente.create') }}" class="btn btn-info" >Añadir Cliente</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Código</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th># Celular</th>
               <th>Email</th>
               <th>Foto</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($clientes->count())
              @foreach($clientes as $cliente)
              <tr>
                <td>{{$cliente->codigo}}</td>
                <td>{{$cliente->nombres}}</td>
                <td>{{$cliente->apellidos}}</td>
                <td>{{$cliente->celular}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->foto}}
                  <a href="" target="">Ver foto</a>
                </td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ClientesController@edit', $cliente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ClientesController@destroy', $cliente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $clientes->links() }}
    </div>
  </div>
</section>

@endsection
