<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Movie::all();
        return view('catalog.index')->with('listaPeliculas', $peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peliculas = Movie::all();
        return view('catalog.show')->with('miPeli', $peliculas[$id])->with('idPeli', $id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peliculas = Movie::all();
        return view('catalog.edit')->with('miPeli', $peliculas[$id])->with('idPeli', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = array([
            'title' => $request->titulo,
            'year' => $request->anio,
            'director' => $request->director,
            'poster' => $request->poster,
            'synopsis' => $request->resumen,
        ]);

        
        return view('catalog.index')->with('listaPeliculas', $pelicula);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getArrayPelis(): array
    {
        return $this->arrayPeliculas;
    }

    public function aniadirPeli(Request $request)
    {
        //
        $peli = array(
            'title' => $request->titulo,
            'year' => $request->anio,
            'director' => $request->director,
            'poster' => $request->poster,
            'rented' => false,
            'synopsis' => $request->resumen
        );

        array_push($this->arrayPeliculas, $peli);
        //$this->arrayPeliculas[] = $peli;
        return view('catalog.index')->with('listaPeliculas', $this->arrayPeliculas);
    }
}
