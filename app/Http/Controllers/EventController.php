<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    
    public function index() {

        $popularMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $upcoming = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];

        dump($popularMovie);

        $search = request('search');

        if($search) {

            $movies = Movie::where([ 
                ['title', 'like', '%'.$search.'%']
                ])->get();

        } else {

            $movies = Movie::all();

        }

        return view('welcome',[ 
            'search' => $search, 
            'popularMovie'=>$popularMovie,
            'upcoming'=>$upcoming]);
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

        $user = auth()->user();

        $users = User::all();

        $movies = Movie::all();

        if($user->user_type == 'administrador') {
            return view('dashboard', ['users'=>$users, 'movie'=>$movies, 'user'=>$user]);
        }

        return view('404');
    }

    public function edit($id) {

        $user = auth()->user();

        $users = User::findorFail($id);

        if($user->user_type == 'administrador') {
            return view('edit', ['user'=>$user, 'users'=>$users]);
        }

        return view('404');

    }

    public function update(Request $request) {

        User::findorFail($request->id)->update($request->all());

        return redirect('/dashboard')->with('msg', 'Usuário editado com sucesso!');
    }

}


