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
            <table id="mytable" class="table table-bordred table-striped" style="width:100%">
             <thead>
               <th>Código</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th># Celular</th>
               <th>Email</th>
               <th>Foto</th>
               <th>Foto Chip</th>
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
                <td>@if($cliente->foto!="")<a href="/storage/{{$cliente['foto']}}" target="_blank">Ver foto</a> @endif</td>
                <td>@if($cliente->foto_chip!="")<a href="/storage/{{$cliente['foto_chip']}}" target="_blank">Ver foto chip</a> @endif</td>

                <td><a class="btn btn-primary btn-xs" href="{{action('ClientesController@edit', $cliente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ClientesController@destroy', $cliente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button onclick = "if (! confirm('¿Esta seguro?')) { return false; }" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#mytable').DataTable( {
        responsive: true,
        info: false,
        searching:false,
        paging:false
    } );
} );
</script>
@endsection
