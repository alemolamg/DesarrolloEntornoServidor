<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller
{

    public function index()
    {
        return view('frutas')->with('frutas', array('manzana', 'pera', 'melón', 'sandía', 'naranja'));
        //echo "Controlador de Frutas";
    }

    public function naranjas($kilos = 0)
    {
        if ($kilos > 0)
            return "Acción de Naranjas - Las naranjas pesan $kilos kg";
        else
            return "No hay kilos de naranjas, ni naranjas xD";
    }

    public function peras()
    {
        return "Acción de Peras";
    }
}
