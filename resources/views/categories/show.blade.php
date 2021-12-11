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
        display: flex;
        justify-content: left
    }

    .b {
        margin-top: 25px
    }

</style>

<body>
    @include('header')
    <div class="container a">
        <div>
            <a class="btn btn-info" href="{{ route('category.index') }}">Volver</a>
        </div>
    </div>
    <div class="container b">
        <div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Id</span>
                <input readonly value="{{ $category->id }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            {{-- <div>
                <label for="">Id Categoría:</label>
                <label for="">{{ $category->id }}</label>
            </div> --}}
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                <input readonly value="{{ $category->slug }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            {{-- <div>
                <label for="">Slug de Categoria:</label>
                <label for="">{{ $category->slug }}</label>
            </div> --}}
            <table class="table">
                <thead>
                    <th>Lenguaje</th>
                    <th>Nombre </th>
                </thead>
                <tbody>
                    @foreach ($categoryDescription as $item)
                   <tr>
                       <td>{{ $item->language }}</td>
                       <td>{{ $item->name }}</td>
                   </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>
