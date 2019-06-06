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
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Usuario</th>
               <th>Nombres</th>
               <th>E-mail</th>
               <th>Activo</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($users->count())
              @foreach($users as $user)
              <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->active}}</td>

                <td><a class="btn btn-primary btn-xs" href="{{action('UsersController@edit', $user->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  @if($user->admin == 0)
                    <form action="{{action('UsersController@destroy', $user->id)}}" method="post">
                     {{csrf_field()}}
                     <input name="_method" type="hidden" value="DELETE">

                     <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                   @endif
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
      {{ $users->links() }}
    </div>
  </div>
</section>

@endsection
