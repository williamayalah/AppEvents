<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
            <a class="btn btn-info" href="{{ route('event.index') }}">Volver</a>
        </div>
    </div>

    <div class="container b">
        <div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Id Evento</span>
                <input value="{{ $event->id }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
                <input value="{{ $event->date }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Slug de evento</span>
                <input value="{{ $event->slug }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Aforo</span>
                <input value="{{ $event->capacity }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Slug Categoría</span>
                <input value="{{ $category->slug }}" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <label for="">Descripción de Evento</label>

            @foreach ($eventDescription as $item)
                <table class="table">
                    <thead>
                        <th>Lenguaje</th>
                        <th>Nombre</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item->language }}</th>
                            <td>{{ $item->name }}</td>
                        </tr>
                    </tbody>
                </table>

            @endforeach
        </div>

    </div>
</body>

</html>
