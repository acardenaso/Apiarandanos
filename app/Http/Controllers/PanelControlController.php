<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelControlController extends Controller
{
    public function __construct()
    {
        
    }

  
    public function usuarios()
    {
        return view('PanelControl.mantenedor_usuarios');
        
    }

     
    public function panel_control()
    {
        return view('PanelControl.panel_control');
        
    }
    public function create()
    {
        
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

