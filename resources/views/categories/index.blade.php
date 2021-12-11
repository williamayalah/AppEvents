<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{--  --}}
<style>
    .a {
        margin-top: 25px;
        display: flex;
        justify-content: center
    }

    .a div {
        width: 80%;
        text-align: left
    }

    .container {
        width: 60%;
        height: 100%;
        display: flex;
        justify-content: center;

    }

    .b {
        margin-top: 10px;
    }

    .c {
        margin-top: 25px
    }

</style>

<body>
    @include('header')
    @include('messages.success')
    <div class="container b">
        <div>
            <a class="btn btn-success" href="{{ route('category.create') }}">Nueva Categoría</a>
        </div>
    </div>
    <div class="container c">
        <div>
            <h5>Lista de categorías</h5>
            <table class="table">
                <thead>
                    <th>Slug</th>
                    <th>Nombre</th>
                    <th>Lenguaje</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->language }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary"
                                        href="{{ route('category.show', $category->id) }}">Ver</a>
                                    <a class="btn btn-warning"
                                        href="{{ route('category.edit', $category->id) }}">Editar</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
