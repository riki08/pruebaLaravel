@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Compañia
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('companias.update', $compania->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" required name="Name" value={{ $compania->Name }} />
        </div>
        <div class="form-group">
          <label for="Email">Email :</label>
          <input type="email" class="form-control" required name="Email" value={{ $compania->Email }} />
        </div>
        <div class="form-group">
          <label for="logo">Logo:</label>
          <input type="text" class="form-control" required name="logo" value={{ $compania->logo }} />
        </div>
        <div class="form-group">
          <label for="Website">WebSite:</label>
          <input type="text" class="form-control" required name="Website" value={{ $compania->Website }} />
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection