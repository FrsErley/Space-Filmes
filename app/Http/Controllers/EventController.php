<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class EventController extends Controller
{
    
    public function index() {

        return view('welcome');
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
