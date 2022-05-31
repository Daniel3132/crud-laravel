@extends('layouts.app')

@section('content')
<div class="container">

  @if (Session::has('mensaje'))
  <div class="alert alert-success alert-dismissible " role="alert">

  {{ Session::get('mensaje') }}
</div>
@endif
<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
<br><br>

<table class="table table-striped table-inverse table-responsive text-white">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>ApellidoP</th>
            <th>ApellidoM</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody >
            @foreach($empleados as $empleado)
            <tr>
                <td scope="row">{{$empleado->id}}</td>
                <td>
                <img width='70' src="{{ asset('storage').'/'.$empleado->Foto }}" alt="">    
            </td>

                <td class="text-white">{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoP}}</td>
                <td>{{$empleado->ApellidoM}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>
                    
                <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-primary" >Editar</a>
                    
                <form action="{{ url('/empleado/'.$empleado->id)}}" method="post" class="d-inline">
                @csrf   
                {{ method_field('DELETE') }} 
                <input class="btn btn-danger" type="submit" value="Borrar" onclick="return confirm('Quieres borrar?')">
                </form>
                
            </td>
            </tr>
            @endforeach
        </tbody>
</table>

{!! $empleados->links() !!}
</div>
@endsection