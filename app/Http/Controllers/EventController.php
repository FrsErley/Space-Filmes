<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Http\Controllers\array_filmes;
use App\Models\Movie;


class EventController extends Controller
{
    
    public function index() {

        $filmes = include 'array_filmes.php';

        $movies = Movie::all();

        return view('welcome',['filmes'=>$filmes, 'movie'=>$movies]);
    }

    public function show($id) {

        $movies = Movie::findorFail($id);

        return view('show', ['movie' => $movies]);
    }

    public function showusers() {

        return view('users');
    }
    
    public function telafilme() {

        return view('telafilme');
    }

}
