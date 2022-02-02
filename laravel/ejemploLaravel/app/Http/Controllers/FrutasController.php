<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormRequest;
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

    /**
     * @param ValidationFormRequest $request Contiene los métodos de validación personalizados.
     * @return \Illuminate\Http\RedirectResponse|string Diferentes tipos de erroes si es incorrecto, la nueva página si es correcto
     */
    public function recibirForm(ValidationFormRequest $request)
    {

        if ($request->input('nombre') != 'pera') {
            return redirect()->back()->withInput()->with('status', 'error en form');
        }
        return "Se ha recibido el formulario";

    }

    /*  Versión antigua con reglas de validación en el método.
    public function recibirForm(Request $request)
    {

        $messages = [
            'nombre.required' => 'El nombre es obligatorio',
            'descrip.required' => 'La descripción es obligatoria',
        ];

        $request->validate([
            'nombre' => 'required|max:15',
            'descrip' => 'required',
        ], $messages);


        if ($request->input('nombre') != 'pera') {
            return redirect()->back()->withInput()->with('status', 'error en form');
        }
        return "Se ha recibido el formulario";

        //echo $request['nombre'];    //Método más usual
        //echo "<br>";
        //echo $request->input('nombre');   //Otro método
    }
    */
}
