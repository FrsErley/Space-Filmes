<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;



class EventController extends Controller
{
    
    public function index() {

        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        $filme = url('public/img/3197518.jpg');

        return view('welcome',[
            'arr' => $arr,
            'filme' => $filme

        ]);
    }

    public function pagemovie() {


        return view('show');
    }

    public function showusers() {

        return view('users');
    }
    
    public function telafilme() {

        return view('telafilme');
    }

}
