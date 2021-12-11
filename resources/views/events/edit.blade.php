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
    <!-- jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

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

    .modal {
        height: 200px;
        width: 450px;
        padding: 10px
    }

    .modal-content {
        display: flex;
        justify-content: center;
        border: none
    }

    .btn {
        text-align: center
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
            <form action="{{ route('event.update', $event->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Slug de Evento</span>
                    <input value="{{ $event->slug }}" type="text" name="slug" id="" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Aforo</span>
                    <input value="{{ $event->capacity }}" input min="1" type="number" name="capacity" id=""
                        class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div>
                    <label for="">Fecha:</label>
                    <input min="<?= date('Y-m-d') ?>" type="date" name="date" id="" value="{{ $event->date }}">
                </div>
                <label for="">Categoria</label>
                <select name="categoryId" id="" class="form-select form-select-sm" aria-label=".form-select-lg example">
                    @foreach ($categories as $categoryAux)
                        @if ($categoryAux->id == $category->id)
                            <option selected="selected" value="{{ $categoryAux->id }}">{{ $categoryAux->slug }}
                            </option>
                        @else
                            <option value="{{ $categoryAux->id }}">{{ $categoryAux->slug }}</option>
                        @endif
                    @endforeach
                </select>
                <div>
                    <br>

                    <div class="c">
                        <div>
                            <a class="btn btn-primary" href="#ex1" rel="modal:open">Agregar Descripcion</a>

                        </div>

                    </div>
                    <label for="">Descripcion del Evento</label>


                    <table>
                        <thead>
                            <td>Nombre</td>
                            <td>Lenguaje</td>
                            <td></td>
                        </thead>
                        <tbody id="tableEventBody">
                            @foreach ($eventDescription as $item)
                                <tr>
                                    <td><input readonly class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" class="inputName" id=""
                                            name="eventDescription[{{ $item->id }}][name]" type="text"
                                            value="{{ $item->name }}"></td>
                                    <td><input readonly class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" class="inputLanguage" id=""
                                            name="eventDescription[{{ $item->id }}][language]" type="text"
                                            value="{{ $item->language }}"></td>
                                    <td><button class="btn btn-danger" id="btnDeleteEventDescription">X</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>

    {{-- Error --}}
    @include('messages.error')
    {{--  --}}

    {{-- Modal --}}

    {{-- <div id="ex1" class="modal">
        <div id="modalEventContent">
            <h1>Descripcion de evento</h1>
            <div>
                <label for="">Nombre</label>
                <input type="text" id="inputNameModal">
            </div>
            <div>
                <label for="">Lenguaje</label>
                <input type="text" id="inputLanguageModal">
            </div>
            <button id="btnAddEventDescription">Insertar</button>

        </div>


    </div> --}}
    {{-- Modal --}}

    <script>
        $(document).ready(function() {

            $('#btnAddEventDescription').on('click', function(e) {
                let inputLanguageModal = $('#inputLanguageModal').val()
                let inputNameModal = $('#inputNameModal').val();
                let raws = $('#tableEventBody tr');
                let bandera = false;
                for (i = 0; i < raws.length; i++) {
                    var cells = $(raws[i]).find("td");
                    language = $($(cells[1]).children("input")).val();
                    if (inputLanguageModal == language && inputLanguageModal != '') {
                        $($(cells[0]).children("input")).val(inputNameModal);
                        bandera = true;
                    }
                }
                if (bandera == false && inputLanguageModal != '') {
                    let i = raws.length+1;
                    let raw = `<tr>
                  <td><input readonly
                    class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                      type="text" value="${inputNameModal}" name="eventDescription[${i}][name]" ></td>
                  <td><input  readonly
                    class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                    type="text" value="${inputLanguageModal}" name="eventDescription[${i}][language]" ></td>
                    <td><button class="btn btn-danger" id="btnDeleteEventDescription">X</button></td>
                  </tr>`;
                    $('#tableEventBody').append(raw)
                }

                e.preventDefault();
            })
            $(document).on('click', '#btnDeleteEventDescription', function(e) {
                let raw = $(this).closest('tr');
                raw.remove();
                e.preventDefault();
            })
        })
    </script>

</body>
@include('events.modal')

</html>
