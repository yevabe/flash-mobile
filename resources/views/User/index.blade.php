@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
      @endif
      @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Tiendas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tiendas.create') }}" class="btn btn-info" >Añadir Tienda</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped" style="width:100%">
             <thead>
               <th>Código</th>
               <th>Nombres</th>
               <th>E-mail</th>
               <th data-priority="2">Celular</th>
               <th>Foto</th>
               <th data-priority="1">Editar</th>
               <th data-priority="1">Activar/Inactivar</th>
             </thead>
             <tbody>
              @if($users->count())
              @foreach($users as $user)
              <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->celular}}</td>
                <td>@if($user->foto!="")<a href="/storage/{{$user['foto']}}" target="_blank">Ver foto</a> @endif</td>
                <td>
                  <a href="{{action('UsersController@edit', $user->id)}}" class="btn btn-primary">Editar</a>

                </td>
                @if($user->active==1)
                <td>
                  @if($user->admin == 0)
                    <form action="{{action('UsersController@destroy', $user->id)}}" method="post">
                     {{csrf_field()}}
                     <input name="_method" type="hidden" value="DELETE">

                     <button onclick = "if (! confirm('¿Esta seguro?')) { return false; }" class="btn btn-success" type="submit">Activo</button>
                   </form>
                   @endif
                 </td>
                 @else
                 <td>
                   <a href="{{action('UsersController@activar', $user->id)}}" class="btn btn-danger">Inactivo</a>
                </td>
                 @endif
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="7">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $users->links() }}
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
