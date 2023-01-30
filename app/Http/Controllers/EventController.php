<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Http\Controllers\array_filmes;
use App\Models\Movie;


class EventController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {

            $movies = Movie::where([ 
                ['title', 'like', '%'.$search.'%']
                ])->get();

        } else {

            $movies = Movie::all();

        }

        return view('welcome',['movie'=>$movies, 'search' => $search]);
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
