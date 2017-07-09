<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;
use Impresoras\ModeloImpresora;
use Illuminate\Support\Facades\Redirect;
use Impresoras\Http\Requests\ModeloImpresoraFormRequest;
use DB;

class ModeloImpresoraController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $modeloimpresora=DB::table('modelo_impresoras')->where(
                'detalle','LIKE','%'.$query.'%')-> where('condicion','=','1')->orderBy('idmodelo_impresoras','asc')->paginate(7);
            return view ('inven.modeloimpresora.index',["modelo_impresoras"=>$modeloimpresora, "searchText"=>$query]);
        }
    }

    public function create (){
        return view("inven.modeloimpresora.create");
    }

    public function store (ModeloImpresoraFormRequest $request){
        $modeloimpresora= new ModeloImpresora;
        $modeloimpresora->detalle=$request->get('detalle');
        $modeloimpresora->condicion='1';
        $modeloimpresora->save();
        return Redirect::to('inven/modeloimpresora');
    }

    public function show ($id){
        return view ("inven.modeloimpresora.show",["modeloimpresora"=>ModeloImpresora::findOrFail($id)]);
    }

    public function edit ($id){
        return view("inven.modeloimpresora.edit",["modeloimpresora"=>ModeloImpresora::findOrFail($id)]);
    }

    public function update (ModeloImpresoraFormRequest $request,$id){
        $modeloimpresora=ModeloImpresora::findOrFail($id);
        $modeloimpresora->detalle=$request->get('detalle');
        $modeloimpresora->update();
        return Redirect::to('inven/modeloimpresora');
    }

    public function destroy ($id){
        $modeloimpresora=ModeloImpresora::findOrFail($id);
        $modeloimpresora->condicion='0';
        $modeloimpresora->update();
        return Redirect::to('inven/modeloimpresora');
    }
}
