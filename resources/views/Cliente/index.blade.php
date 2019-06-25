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
            <table id="mytable" class="display responsive nowrap" style="width:100%">
             <thead>
               <th>Código</th>
               <th>Nombre</th>
               <th># a portar</th>
               <th>Plan</th>
               <th>Fecha ren</th>
               <th>Cuenta</th>
               <th>Contraseña</th>
               <th data-priority="1">Editar</th>
               <th data-priority="1">Activar/Inactivar</th>
             </thead>
             <tbody>
              @if($clientes->count())
              @foreach($clientes as $cliente)
              <tr>
                <td>{{$cliente->codigo}}</td>
                <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                <td>{{$cliente->numero_a_portar}}</td>
                <td>{{$cliente->plan_flash_mobile}}</td>
                <td>{{$cliente->fecha_renovacion}}</td>
                <td>{{$cliente->cuenta_flash}}</td>
                <td>{{$cliente->contrasena_cuenta}}</td>
                <td>
                  <a href="{{action('ClientesController@edit', $cliente->id)}}" class="btn btn-primary">Editar</a>

                </td>
                @if($cliente->estado=="activo")
                <td>
                  <form action="{{action('ClientesController@destroy', $cliente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button onclick = "if (! confirm('¿Esta seguro?')) { return false; }" class="btn btn-success" type="submit">Activo</button>
                 </td>
                 @else
                 <td>
                   <a href="{{action('ClientesController@activar', $cliente->id)}}" class="btn btn-danger">Inactivo</a>

                 @endif
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
      @if(Auth::user()->admin==0)
      searching:false,
      @endif
      language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      paging:false
    } );
} );
</script>
@endsection
