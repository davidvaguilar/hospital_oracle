<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ho_tlises;

class Ho_tlisesController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if( $buscar == '' ){
            $listas = Ho_tlises::take(150)->orderBy('fec_solici', 'desc')->paginate(10);
        } else {
            $listas = Ho_tlises::where($criterio, 'like', '%'.$buscar.'%' )->orderBy('fec_solici', 'desc')->paginate(10);
        }
        //dd($listas);
        return view('listaespera.index', compact('listas'));
    }

    public function create()
    {
        return "HOLA";
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
