@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Registrar Emeplado
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
      <form method="post" action="{{ route('empleados.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="First_name" required/>
          </div>
          <div class="form-group">
              <label for="email">Apellido:</label>
              <input type="text" class="form-control" name="Last_name" required/>
          </div>
          <div class="form-group">
              <label for="logo">Email:</label>
              <input type="email" class="form-control" name="Email" required/>
          </div>
          <div class="form-group">
          <label for="">Compañia:</label>
            <select name="company_id" id="inputCompany_id" class="form-control" required>
            @foreach ($companias as $compania)
                <option value="{{$compania['id']}}">{{$compania['Name']}}</option>
            @endforeach
        </select>
          </div>
          <div class="form-group">
              <label for="web">Telefono:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
      </form>
  </div>
</div>
@endsection