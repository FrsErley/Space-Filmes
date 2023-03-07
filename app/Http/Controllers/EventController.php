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

        $animation = Http::get('https://api.themoviedb.org/3/discover/movie?api_key=11ad839be2673a76e84bed8a1e9c62e4&with_genres=16')
        ->json()['results'];


        // $category = Http::get('https://api.themoviedb.org/3/discover/movie?api_key=11ad839be2673a76e84bed8a1e9c62e4&with_genres=' .$gender)
        // ->json()['results'];

        dump($animation);

        // dump($popularMovie);

        return view('welcome',[ 

            'popularMovie'=>$popularMovie,
            'upcoming'=>$upcoming,
            'animation'=>$animation]);
    }

    public function show($id) {

        $movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,images,videos')
        ->json();

        $recommendations = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '/recommendations')
        ->json()['results'];
        

        return view('show', [
            'movie' => $movie, 
            'recommendations' => $recommendations
        ]);
    }

    public function genreMovie($genreId) {
      
        $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
            ->get('https://api.themoviedb.org/3/discover/movie?api_key=11ad839be2673a76e84bed8a1e9c62e4&with_genres='.$genreId);
    
        if (!$response->ok()) {
            abort(500, 'Erro na API');
        }
    
        $movies = $response->json()['results'];
    
        $genreMovies = [
            '28' => 'Ação',
            '12' => 'Aventura',
            '16' => 'Animação',
            '35' => 'Comédia',
            '80' => 'Crime',
            '99' => 'Documentário',
            '18' => 'Drama',
            '10751' => 'Família',
            '14' => 'Fantasia',
            '36' => 'História',
            '27' => 'Terror',
            '10402' => 'Música',
            '9648' => 'Mistério',
            '10749' => 'Romance',
            '878' => 'Ficção científica',
            '10770' => 'Cinema TV',
            '53' => 'Thriller',
            '10752' => 'Guerra',
            '37' => 'Faroeste'
        ];
    
        if (!isset($genreMovies[$genreId])) {
            abort(404, 'Gênero não encontrado');
        }
    
        $selectedGenre = $genreMovies[$genreId];
    
        return view('genre', [
            'movies' =>  $movies,
            'selectedGenre' => $selectedGenre
        ]);
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


