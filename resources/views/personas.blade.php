<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Personas</title>
</head>

<body>

    <div class="container mt-5">
        <h1>CRUD DDD</h1>
        <div class="row">

            <div class="col-md-4">
                <form
                    action="{{ isset($persona) ? route('personas.createOrUpdate', $persona->id) : route('personas.createOrUpdate') }}"
                    method="post">
                    @csrf
                    @if (isset($persona))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="id" id="id"
                        value="{{ isset($persona) ? $persona->id : '' }}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                            value="{{ isset($persona) ? $persona->nombre : '' }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"
                            value="{{ isset($persona) ? $persona->apellido : '' }}">
                    </div>
                    <button type="submit"
                        class="btn btn-primary">{{ isset($persona) ? 'Actualizar' : 'Guardar' }}</button>
                    <button type="button" class="btn btn-secondary limpiar" id="cancelar">Cancelar</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Registros</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personas as $persona)
                            <tr>
                                <th>{{ $persona->id }}</th>
                                <th>{{ $persona->nombre }}</th>
                                <th>{{ $persona->apellido }}</th>
                                <th>
                                    <button type="button" class="btn btn-warning btn-sm editar-btn"
                                        data-id="{{ $persona->id }}" data-nombre="{{ $persona->nombre }}"
                                        data-apellido="{{ $persona->apellido }}">Editar</button>
                                </th>
                                <th>

                                    <form action="{{ route('personas.delete', ['id' => $persona->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    </td>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
    $('.editar-btn').click(function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');

        $('#id').val(id);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
    });

    $('.limpiar').click(function() {
        var id = document.getElementById('id');
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');


        id.value = '';
        nombre.value = '';
        apellido.value = '';
    })
</script>
