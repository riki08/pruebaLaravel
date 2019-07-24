@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('empleados.create')}}" class="btn btn-primary">Crear Empleado</a>
  <table class="table table-striped">
    <thead>
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Email</td>
          <td>Telefono</td>
          <td>Compañia</td>
          
          <td colspan="2">Actiones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($empleado as $empleados)
        <tr>
            <td>{{$empleados->First_name}}</td>
            <td>{{$empleados->Last_name}}</td>
            <td>{{$empleados->Email}}</td>
            <td>{{$empleados->phone}}</td>
            <td>{{$empleados->companiaModel->Name}}</td>
            
            <td><a href="{{ route('empleados.edit',$empleados->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('empleados.destroy', $empleados->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection