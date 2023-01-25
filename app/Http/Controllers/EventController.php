<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Http\Controllers\array_filmes;


class EventController extends Controller
{
    
    public function index() {

        $filmes = include 'array_filmes.php';

        return view('welcome',['filmes'=>$filmes]);
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
