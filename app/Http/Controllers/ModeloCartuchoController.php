<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;
use Impresoras\ModeloCartucho;
use Illuminate\Support\Facades\Redirect;
use Impresoras\Http\Requests\ModeloCartuchoFormRequest;
use DB;

class ModeloCartuchoController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $modelocartucho=DB::table('modelo_cartuchos')->where(
                'detalle','LIKE','%'.$query.'%')-> where('condicion','=','1')->orderBy('idmodelo_cartuchos','asc')->paginate(7);
            return view ('inven.modelocartucho.index',["modelo_cartuchos"=>$modelocartucho, "searchText"=>$query]);
        }
    }

    public function create (){
        return view("inven.modelocartucho.create");
    }

    public function store (ModeloCartuchoFormRequest $request){
        $modelocartucho= new ModeloCartucho;
        $modelocartucho->detalle=$request->get('detalle');
        $modelocartucho->condicion='1';
        $modelocartucho->save();
        return Redirect::to('inven/modelocartucho');
    }

    public function show ($id){
        return view ("inven.modelocartucho.show",["modelocartucho"=>ModeloCartucho::findOrFail($id)]);
    }

    public function edit ($id){
        return view("inven.modelocartucho.edit",["modelocartucho"=>ModeloCartucho::findOrFail($id)]);
    }

    public function update (ModeloCartuchoFormRequest $request,$id){
        $modelocartucho=ModeloCartucho::findOrFail($id);
        $modelocartucho->detalle=$request->get('detalle');
        $modelocartucho->update();
        return Redirect::to('inven/modelocartucho');
    }

    public function destroy ($id){
        $modelocartucho=ModeloCartucho::findOrFail($id);
        $modelocartucho->condicion='0';
        $modelocartucho->update();
        return Redirect::to('inven/modelocartucho');
    }
}
