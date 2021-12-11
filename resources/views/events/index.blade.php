<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{--  --}}
</head>
<style>
    .container {
        width: 60%;
        height: 100%;
        display: flex;
        justify-content: center;

    }

    .a {
        margin-top: 10px;
    }

    .b {
        margin-top: 25px
    }

    .menu {
        display: flex;
        justify-content: center;
    }

</style>

<body>
    @include('header')
    @include('messages.success')

    <div class="container a">
        <div ">
    <a class="     btn btn-success" href="{{ route('event.create') }}">Crear Evento</a>
        </div>
    </div>
    <div class="container b">
        <div>


            <div class="titulo-lista-evento">
                <div>
                    <h5>Lista de Eventos</h5>
                </div>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Evento</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Capacidad</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($events as $event)
                        <tr>
                            <th scope="row">{{ $event->name }}</th>
                            <td>{{ $event->category }}</td>
                            @if ($event->capacityAvailable == 0)
                                <td>Agotado</td>
                            @else
                                <td>{{ $event->capacityAvailable }}/{{ $event->capacity }}</td>
                            @endif

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="b btn btn-primary" href="{{ route('event.show', $event->id) }}">Ver</a>
                                    <a class="b btn btn-warning"
                                        href="{{ route('event.edit', $event->id) }}">Editar</a>
                                    <a href="">
                                        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="b btn btn-danger">Eliminar</button>
                                        </form>
                                    </a>
                                    <a class="b btn btn-success"
                                        href="{{ route('assistant.show', $event->id) }}">Comprar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <table class="table">
        <thead>
            <th scope="col">
            <td>Evento</td>
            </th>
            <th scope="col">
            <td>Categoría</td>
            </th>
            <th scope="col">
            <td>Capacidad</td>
            </th>
            <th scope="col">
            <td>Opciones</td>
            </th>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->category }}</td>
                    <td>{{ $event->capacity }}/{{ $event->capacity }}</td>
                    <td><a class="btn btn-primary" href="{{ route('event.show', $event->id) }}">Ver</a>
                        <a class="btn btn-warning" href="{{ route('event.edit', $event->id) }}">Editar</a>
                        <a href="">
                            <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </a>
                        <a class="btn btn-success" href="{{ route('assistant.show', $event->id) }}">Comprar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

</body>



</html>
