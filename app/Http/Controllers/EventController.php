<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Http\Controllers\array_filmes;
use App\Models\Movie;
use App\Models\User;

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

    public function dashboard() {

        $users = User::all();

        

        $movies = Movie::all();

        return view('dashboard', ['user'=>$users, 'movie'=>$movies]);
    }

}

// if($user->type_user == "admin") {
//     return  view('dashboard', ['user'=>$users, 'movie'=>$movies]);
// }


// return view('404');
