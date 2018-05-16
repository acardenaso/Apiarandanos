<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unity;
use Toastr;

class UnitiesController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
      
    }

    public function store(Request $request)
    {
        //registrar nuevo trabajador en la bd
    
        $unity = new Unity();
        $unity->medida = $request->input('medida');
        $unity->save();//INSERT
        $title = "Unidad Creada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $unity = Unity::find($id);
        return view('admin.unities.edit')->with(compact('unity'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $unity = Unity::find($id);
        $unity->medida = $request->input('medida');
        $unity->save();//UPDATE
        $title = "Unidad Editada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $unity = Unity::find($id);
        $unity->delete();
        $title = "Unidad Eliminada correctamente!";
        Toastr::success($title);
        return back(); 
    }   
}
