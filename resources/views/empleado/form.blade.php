<section class="w-50 mx-auto align-items-center">
    <a href="{{ url('empleado/') }}" class="btn btn-primary">Regresar</a>
    <br><br>
    <form  action="{{ url('/empleado') }}" method='post' enctype='multipart/form-data'>
        @csrf
        <h1>{{ $modo }} Empleado</h1>

        @if(count($errors)>0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input class="form-control" type="text"
                value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')  }}" name="Nombre" id="Nombre">
            <br>
        </div>
        <div class="form-group">
            <label for="">Apellido Paterno</label>
            <input class="form-control" type="text"
                value="{{ isset( $empleado->ApellidoP)?$empleado->ApellidoP:old('ApellidoP') }}" name="ApellidoP"
                id="ApellidoP">
        </div>
        <br>
        <div class="form-group">
            <label for="ApellidoM">Apellido Materno </label>
            <input class="form-control" type="text"
                value="{{ isset($empleado->ApellidoM)?$empleado->ApellidoM:old('ApellidoM') }}" name="ApellidoM"
                id="ApellidoM">
        </div>
        <br>
        <div class="form-group">
            <label for="Correo">Correo</label>
            <input class="form-control" type="email"
                value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" name="Correo" id="Correo">
        </div>
        <br>
        <div class="form-group">
            @if (isset($empleado->Foto))
        </div>
        <img class="my-2" width='100' height="70" src="{{ asset('storage').'/'.$empleado->Foto }}" alt="">
        @endif
        <input class="form-control" type="file" name="Foto" id="Foto">
        <br>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value='{{ $modo }} Datos'>

        </div>
    </form>
</section>