<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Configuration;
use App\Position;
use App\Gender;
use App\Location;
use App\Nationality;
use App\State;
use App\Category;
use App\Unity;

class ConfigurationController extends Controller
{
    public function index()
    {

        $positions = Position::all();
        $genders = Gender::all();
        $locations = Location::all();
        $nationalities = Nationality::all();
        $states = State::all();
        $categories = Category::all();
        $unities = Unity::all();
        return view('admin.configuration.index')->with(compact('positions','genders','locations','nationalities','states','categories','unities'));

   
    }

}
