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
  <a href="{{ route('companias.create')}}" class="btn btn-primary">Crear Compañia</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Web Site</td>
          <td colspan="2">Actiones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($companias as $compania)
        <tr>
            <td>{{$compania->Name}}</td>
            <td>{{$compania->Email}}</td>
            <td>{{$compania->logo}}</td>
            <td>{{$compania->Website}}</td>
            <td><a href="{{ route('companias.edit',$compania->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('companias.destroy', $compania->id)}}" method="post">
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