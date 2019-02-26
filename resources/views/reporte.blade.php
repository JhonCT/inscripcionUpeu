<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-hover col-9">
            <thead>
            <tr>
                <th>Categorias</th>
                <th>Disciplinas</th>
                <th>Jugadores</th>
                <th>Delegado</th>
                <th>Costo</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscripciones as $inscripcion)
                <tr>
                    <td>{{$inscripcion->categorias}}</td>
                    <td>{{$inscripcion->disciplina}}</td>
                    <td><a href="/download/{{$inscripcion->jugadores}}" >{{$inscripcion->jugadores}}</a></td>
                    <td>{{$inscripcion->delegado}}</td>
                    <td>S/. {{$inscripcion->costo}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>