<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/semantic.min.css') }}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/semantic.min.js')}}"></script>
</head>
<body>
<div class="ui grid">
    <div class="ui text container four wide column">
        <form class="ui form" method="post" action="{{route('inscripcion')}}" accept-charset="UTF-8"
              enctype="multipart/form-data">
            @csrf
            <h4 class="ui dividing header">Datos de Inscripción</h4>
            <div class="field">
                <label>Selecciona la Categoría</label>
                <select class="ui fluid dropdown" name="categorias">
                    <option value="Master">Master</option>
                    <option value="Libre">Libre</option>
                </select>
            </div>
            <div class="field">
                <label>Seleccione la Disciplina</label>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" value="Futsal Varones" name="disciplina[]"
                               onchange="toggleCheckbox(this)">
                        <label>Futsal Varones</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" value="Voley Damas" name="disciplina[]" onchange="toggleCheckbox(this)">
                        <label>Voley Damas</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" value="Basquet Varones" name="disciplina[]"
                               onchange="toggleCheckbox(this)">
                        <label>Básquet Varones</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" value="Basquet Damas" name="disciplina[]"
                               onchange="toggleCheckbox(this)">
                        <label>Básquet Damas</label>
                    </div>
                </div>
            </div>
            <h4 class="ui dividing header">Datos de Facturación</h4>
            <div class="field">
                <label>Costo</label>
                <input name="costo" value="S/. 0" id="costo" disabled>
            </div>

            <h4 class="ui dividing header">Datos de Jugadores</h4>
            <div class="field">
                <label for="file" class="ui button">Cargar Archivo</label>
                <input type="file" name="file" id="file" style="display:none">
            </div>
            <div class="field">
                <label>Apellidos y Nombres del Delegado</label>
                <div class="ui input">
                    <input type="text" placeholder="Apellidos y Nombres" name="delegado">
                </div>
            </div>


            <h4 class="ui dividing header">Datos de Egreso</h4>
            <div class="field">
                <label>Facultad</label>
                <select class="ui fluid dropdown" name="facultad">
                    <option value="FIA">Ingeniería y Arquitectura</option>
                    <option value="Empresariales">Ciencias Empresariales</option>
                </select>
            </div>

            <div class="field">
                <label>Año de Egreso</label>
                <div class="ui input">
                    <input type="text" placeholder="Año" name="anho">
                </div>
            </div>

            <h4 class="ui dividing header">Reglamento</h4>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" onchange="reglamento(this)">
                    <label>Lea el reglamento</label>
                </div>
            </div>

            <button class="ui button" id="btnsave" type="submit" disabled>Registrarse</button>
        </form>
    </div>
</div>

<div class="ui modal">
    <div class="header">
        Reglamento
    </div>
    <div class="content">
        <div class="description">
            <div class="ui header">Lorem ipsum dolor sit amet</div>
            <p>, consectetur adipisicing elit. <a href="https://www.upeu.edu.pe" target="_blank">UPeU</a> A aliquid
                beatae eos est labore necessitatibus sunt veniam?</p>
            <p>Alias iure libero minus obcaecati quasi qui quis reprehenderit, sed? Praesentium, quos, rerum!</p>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cerrar
        </div>
        <div class="ui positive button">
            Aceptar
        </div>
    </div>
</div>

<script>
    function toggleCheckbox(element) {
        var costoDOM = document.getElementById('costo').value;
        var x = costoDOM.split(" ");
        var costo = x[1];
        costo = parseInt(costo);

        if (element.checked == true) {
            document.getElementById('costo').value = "S/. " + String(costo + 150);
        } else {
            document.getElementById('costo').value = "S/. " + String(costo - 150);
        }
    }

    function reglamento(element) {
        if (element.checked == true) {
            document.getElementById('btnsave').classList.add('primary');
            document.getElementById('btnsave').disabled = false;

            $('.ui.modal').modal('show');
        } else {
            document.getElementById('btnsave').classList.remove('primary');
            document.getElementById('btnsave').disabled = true;
        }
    }
</script>
<style type="text/css">
    .ui.text.container {
        margin-top: 50px !important;
    }

    #costo {
        border: 0px;
        color: black;
        text-decoration: none;
        font-size: 30px;
        padding: 0px;
    }
</style>
</body>
</html>