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
               <th data-priority="1">Eliminar</th>
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
                <td><a class="btn btn-primary btn-xs" href="{{action('UsersController@edit', $user->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  @if($user->admin == 0)
                    <form action="{{action('UsersController@destroy', $user->id)}}" method="post">
                     {{csrf_field()}}
                     <input name="_method" type="hidden" value="DELETE">

                     <button onclick = "if (! confirm('¿Esta seguro?')) { return false; }" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                   </form>
                   @endif
                 </td>
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
        searching:false,
        paging:false
    } );
} );
</script>
@endsection
