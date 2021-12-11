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

      .c,
      .d {
          display: flex;
          justify-content: center
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
              <a class="btn btn-info" href="{{ route('category.index') }}">Volver</a>
          </div>
      </div>

      <div class="container b">
          <div>
              <form action="{{ route('category.update', $category->id) }}" method="POST">
                  @method('put')
                  @csrf

                  <div class="input-group input-group-sm mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                      <input type="text" name="slug" value="{{ $category->slug }}" class="form-control"
                          aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div>
                      <div class="c">
                          <div>
                              <a class="btn btn-primary" href="#ex1" rel="modal:open">Agregar Descripcion</a>
                          </div>
                      </div>
                      <label for="">Descripcion del Categoría</label>
                      <table class="table">
                          <thead>
                              <td>Nombre</td>
                              <td>Lenguaje</td>
                              <td></td>
                          </thead>
                          <tbody id="tableCategoryBody">
                              @foreach ($categoryDescription as $item)
                                  <tr>
                                      <td><input readonly aria-label="Sizing example input"
                                              aria-describedby="inputGroup-sizing-sm" required
                                              class="inputName form-control" id=""
                                              name="categoryDescription[{{ $item->id }}][name]" type="text"
                                              value="{{ $item->name }}"></td>
                                      <td><input readonly aria-label="Sizing example input"
                                              aria-describedby="inputGroup-sizing-sm" required
                                              class="inputLanguage form-control" id=""
                                              name="categoryDescription[{{ $item->id }}][language]" type="text"
                                              value="{{ $item->language }}"></td>
                                      <td><button class="btn btn-danger" id="btnDeleteCategoryDescription">X</button>
                                      </td>
                                  </tr>
                              @endforeach

                          </tbody>
                      </table>
                  </div>
                  <div class="d">
                      <button class="btn btn-success">Actualizar</button>

                  </div>
              </form>
          </div>
      </div>
      {{-- Error --}}
      @include('messages.error')
      {{--  --}}

      {{-- {{-- Modal --}}

      {{-- <div id="ex1" class="modal">
          <div id="modalCategoryContent">
              <h1>Descripcion de categoría</h1>
              <div>
                  <label for="">Nombre</label>
                  <input type="text" id="inputNameModal">
              </div>
              <div>
                  <label for="">Lenguaje</label>
                  <input type="text" id="inputLanguageModal">
              </div>
              <button id="btnAddCategoryDescription">Insertar</button>

          </div>
      </div> --}}
      {{-- Modal --}}

      <script>
          $(document).ready(function() {
              $('#btnAddCategoryDescription').on('click', function(e) {
                  let inputLanguageModal = $('#inputLanguageModal').val()
                  let inputNameModal = $('#inputNameModal').val();
                  let raws = $('#tableCategoryBody tr');
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
                <td><input readonly class="inputName form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                    type="text" value="${inputNameModal}" name="categoryDescription[${i}][name]"  required></td>
                <td><input readonly class="inputName form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                    type="text" value="${inputLanguageModal}" name="categoryDescription[${i}][language]" required></td>
                  <td><button class="btn btn-danger" id="btnDeleteCategoryDescription">X</button></td>
                </tr>`;
                          $('#tableCategoryBody').append(raw)
                      }

                  e.preventDefault();
              })
              $(document).on('click', '#btnDeleteCategoryDescription', function(e) {
                  let raw = $(this).closest('tr');
                  raw.remove();
                  e.preventDefault();
              })
          })
      </script>

  </body>
  {{-- Modal --}}
  @include('categories.modal')
  {{-- <div id="ex1" class="modal">
    <div class="modal-content">
        <div>
            <h5>Descripcion de Categoría</h5>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Lenguaje</span>
            <input required id="inputLanguageModal" type="text" class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
            <input required id="inputNameModal" type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm">
        </div> --}}
  {{-- <div>
            <label for="">Nombre</label>
            <input required type="text" id="inputNameModal">
        </div> --}}

  {{-- <div>
            <label for="">Lenguaje</label>
            <input required type="text" id="inputLanguageModal">
        </div> --}}
  {{-- <div class="btn">
            <button class="btn btn-success" id="btnAddCategoryDescription">Insertar</button>
        </div>
    </div>
</div> --}}
  {{-- Modal --}}

  </html>
