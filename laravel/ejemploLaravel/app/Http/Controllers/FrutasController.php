<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormRequest;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //$frutas = DB::table('frutas')->get();
        $frutas = Fruit::all();

        return view('peras')->with('frutas', $frutas);
    }

    /**
     * @param ValidationFormRequest $request Contiene los métodos de validación personalizados.
     * @return \Illuminate\Http\RedirectResponse|string Mensaje de error si es incorrecto, la nueva página si es correcto
     */
    public function recibirForm(ValidationFormRequest $request)
    {

        if ($request->input('nombre') != 'pera') {
            return redirect()->back()->withInput()->with('status', 'ERROR en form, COMPRUEBA si es "pera" el nombre');
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
