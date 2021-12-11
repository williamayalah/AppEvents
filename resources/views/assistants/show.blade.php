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

</head>

<style>
    .container {
        width: 60%;
        height: 100%;
        display: flex;
        justify-content: center;

    }

    .a {
        margin-top: 50px;
        display: flex;
        justify-content: left
    }

    .b {
        margin-top: 25px
    }

    .c {
        display: flex;
        justify-content: center
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
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
                <input readonly value="{{ $event->date }}" input min="1" class="form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                <input readonly value="{{ $event->slug }}" input min="1" class="form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            @if ($eventAssistantsAvailable > 0)
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Aforo Disponible</span>
                <input readonly value="{{ $eventAssistantsAvailable }}" input min="1" class="form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            
            <form action="{{ route('assistant.store', $event->id) }}" method="POST">
                @method('post')
                @csrf

           
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                        <input type="email" name="email" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad de entradas</span>
                        <input type="number" name="quantity" min="1" {{-- max="{{ $eventAssistantsAvailable }}" --}}
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="c">
                        <button class="btn btn-success">Comprar</button>

                    </div>
              

            </form>
              @else
              <div>
                  <div>
                      <h3>¡ENTRADAS AGOTADAS!</h3>
                  </div>
              </div>
              @endif
            
        </div>
    </div>
    @include('messages.error')

</body>

</html>
