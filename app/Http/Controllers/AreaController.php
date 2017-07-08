<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;
use Impresoras\Http\Requests;
use Impresoras\Area;
use Illuminate\Support\Facades\Redirect;
use Impresoras\Http\Requests\AreaFormRequest;
use DB;


class AreaController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $area=DB::table('areas')->where(
                'detalle','LIKE','%'.$query.'%')-> where('condicion','=','1')->orderBy('idareas','asc')->paginate(7);
            return view ('inven.area.index',["areas"=>$area, "searchText"=>$query]);
        }
    }

    public function create (){
        return view("inven.area.create");
    }

    public function store (AreaFormRequest $request){
        $area= new Area;
        $area->detalle=$request->get('detalle');
        $area->condicion='1';
        $area->save();
        return Redirect::to('inven/area');
    }

    public function show ($id){
        return view ("inven.area.show",["area"=>Area::findOrFail($id)]);
    }

    public function edit ($id){
        return view("inven.area.edit",["area"=>Area::findOrFail($id)]);
    }

    public function update (AreaFormRequest $request,$id){
        $area=Area::findOrFail($id);
        $area->detalle=$request->get('detalle');
        $area->update();
        return Redirect::to('inven/area');
    }

    public function destroy ($id){
        $area=Area::findOrFail($id);
        $area->condicion='0';
        $area->update();
        return Redirect::to('inven/area');
    }
}
