@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar empleado
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
      <form method="post" action="{{ route('empleados.update', $empleado->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" required  name="First_name" value={{ $empleado->First_name }}  />
        </div>
        <div class="form-group">
          <label for="Email">Apellido :</label>
          <input type="text" class="form-control" required name="Last_name" value={{ $empleado->Last_name }} />
        </div>
        <div class="form-group">
          <label for="logo">Email:</label>
          <input type="email" class="form-control" required name="Email" value={{ $empleado->Email }} />
        </div>
        <div class="form-group">
          <label for="">Compañia:</label>
            <select name="company_id" id="inputCompany_id" required class="form-control" value={{ $empleado->company_id }}>
            @foreach ($companias as $compania)
                <option value="{{$compania['id']}}">{{$compania['Name']}}</option>
            @endforeach
        </select>
          </div>
        <div class="form-group">
          <label for="Website">Telefono:</label>
          <input type="text" class="form-control" name="phone" value={{ $empleado->phone }} />
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection