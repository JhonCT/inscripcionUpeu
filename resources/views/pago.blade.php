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
<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$pago->delegado}}
    </div>
    <div class="card-body">
        <h4 class="col-sm-6 col-form-label col-form-label-md">Categoria</h4>
        <input class="form-control form-control-sm" type="text" value="{{$pago->categorias}}" readonly="readonly">
        <h4 class="col-sm-6 col-form-label col-form-label-md">Disciplinas</h4>
        <input type="text" class="form-control form-control-sm" value="{{$pago->disciplina}}" readonly="readonly">
        <h4 class="col-sm-6 col-form-label col-form-label-md">Costo</h4>
        <input type="text" class="form-control form-control-sm" value="S/. {{$pago->costo}}" readonly="readonly">
    </div>

    <div class="card-footer">
        <button class="btn btn-primary">Pagar</button>
    </div>
</div>
    </div>
</div>
</body>
</html>