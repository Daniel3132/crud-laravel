@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ url('/js/app.js') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<div class="container">

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible " role="alert">
        {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',

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
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
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
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-primary">Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Borrar
                    </button>
                </td>
                <!-- Modal -->
                <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>¿Seguro desea borrarlo?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ url('/empleado/'.$empleado->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input id="borrar" class="btn btn-danger" value="Borrar" type="submit">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mx-auto w-25 mt-4">
        {!! $empleados->links() !!}
    </div>

</div>
@endsection