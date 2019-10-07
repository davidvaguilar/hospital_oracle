<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function index(){
        $users =DB::select('select * from DAVID');
       // dd($users);
        return view('welcome')->with(compact('users'));;
    }

    public function test(Request $request){

        //if( !$request->ajax() ) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if( $buscar == '' ){
            $users = Davids::orderBy('rut', 'desc')->paginate(10);
        } else {
            $users = Davids::where($criterio, 'like', '%'.$buscar.'%' )->orderBy('rut', 'desc')->paginate(10);
        }

        return[
            'pagination' => [
                'total' => $users->total(),
                'current_page' => $users->currentPage(),
                'per_page' => $users->perPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem(),
            ],
            'users' => $users
        ];
    }


    public function desactivar(Request $request)
    {
        if( !$request->ajax()) return redirect('/');
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = '0';
        $categoria->save();
    }

    public function activar(Request $request)
    {
        if( !$request->ajax()) return redirect('/');
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = '1';
        $categoria->save();
    }

}
