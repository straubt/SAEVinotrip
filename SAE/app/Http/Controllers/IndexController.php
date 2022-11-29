<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Index;
use App\Models\Client;
use App\Models\Sejour;
use App\Models\Destination;
use App\Models\Categorie_Participant;
use App\Models\Theme;
use App\Models\Route_des_vins;
use App\Models\Avis;
use App\Models\Sejour_To_Cat_Participant;




class IndexController extends Controller
{
    public function index(){
        return view("welcome", ["sejour" => Sejour::all()]);
    }

    public function sejour(){
        return view("lessejours", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(), "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()]);
    }

    public function unSejour(){
        return view("sejour", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(),"avis" => Avis::all()]) ;
    }

    public function client(){
        return view("client", ["client" => Client::all()]);
    }

    public function route_des_vins(){
        return view("route_des_vins", ["route_des_vins" => Route_des_vins::all()]);
    }


    // public function destination(){
    //     return view("sejour", ["destination" => Destination::all()]);
    // }
}
