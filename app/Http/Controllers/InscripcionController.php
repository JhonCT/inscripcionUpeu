<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;


class InscripcionController extends Controller
{

    public function registrarse(Request $request)
    {
        $disciplinas = $request['disciplina'];

        //obteniendo el archivo
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();

        //Guardar Archivo
        //Ver config/filesystems.php para configuración
        //de la dirección donde se guarda el documento
        \Storage::disk('local')->put($nombre, \File::get($file));

        $inscripcion = new Inscripcion($request->all());

        $inscripcion->jugadores = $nombre;
        //conviertiendo el array de disciplinas a a string
        $inscripcion->disciplina = implode(", ", $disciplinas);

        $inscripcion->save();

        return redirect('/');
    }
}