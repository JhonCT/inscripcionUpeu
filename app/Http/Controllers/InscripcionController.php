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

        //Obteniendo el archivo
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();

        //Guardar Archivo
        //Ver config/filesystems.php para configuración
        //de la dirección donde se guarda el documento
        \Storage::disk('local')->put($nombre, \File::get($file));

        $inscripcion = new Inscripcion($request->all());

        $inscripcion->jugadores = $nombre;

        //Conviertiendo el array de disciplinas a a string
        $inscripcion->disciplina = implode(", ", $disciplinas);

        //Conviertiendo costo

        $costo = explode(" ", $request['costo'], 2)[1];

        $inscripcion->costo = $costo;

        $inscripcion->save();

        $lastInscripcion = Inscripcion::all()->last();

        return view('pago')->with('pago', $lastInscripcion);
    }

    public function inscripciones(){
        $inscripciones = Inscripcion::all();
        return view('reporte')->with('inscripciones', $inscripciones);
    }

    public function downloadFile($file){
        $pathtoFile = '/home/hidden/Desktop/blog/storage/app/'.$file;
        return response()->download($pathtoFile);
    }

    public function descargarFormato(){
        $pathtoFile = '/home/hidden/Desktop/blog/storage/app/formato.xlsx';
        return response()->download($pathtoFile);
    }

    public function descargarReglamento(){
        $pathtoFile = '/home/hidden/Desktop/blog/public/recursos/ECO-1927.pdf';
        return response()->download($pathtoFile);
    }
}