{{-- Modal --}}

<div id="ex1" class="modal">
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
        </div>
        {{-- <div>
            <label for="">Nombre</label>
            <input required type="text" id="inputNameModal">
        </div> --}}

        {{-- <div>
            <label for="">Lenguaje</label>
            <input required type="text" id="inputLanguageModal">
        </div> --}}
        <div class="btn">
            <button class="btn btn-success" id="btnAddCategoryDescription">Insertar</button>
        </div>
    </div>
</div>
{{-- Modal --}}