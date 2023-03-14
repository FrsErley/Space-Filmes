<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\ApiMovies;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class EventController extends Controller
{
    
    public function index() {

        // criar codigo de BaseURL e token para evitar repetição de codigos.

        $popularMovie = Http::withToken(config('services.tmdb.api'))
        ->get(config('services.tmdb.baseURL').'movie/popular')
        ->json()['results'];

        $upcoming = Http::withToken(config('services.tmdb.api'))
        ->get(config('services.tmdb.baseURL').'movie/upcoming')
        ->json()['results'];

        $animation = Http::get(config('services.tmdb.baseURL').'discover/movie?api_key='.config('services.tmdb.api_key').'&with_genres=16')
        ->json()['results'];
        

        return view('welcome',[ 
            'genres'=>$this->genreMovies(),
            'popularMovie'=>$popularMovie,
            'upcoming'=>$upcoming,
            'animation'=>$animation]);
    }

    public function show($id) {

        $movie = Http::withToken(config('services.tmdb.api'))
        ->get(config('services.tmdb.baseURL').'movie/'. $id . '?append_to_response=credits,images,videos')
        ->json();

        $recommendations = Http::withToken(config('services.tmdb.api'))
        ->get(config('services.tmdb.baseURL'). 'movie/' . $id . '/recommendations')
        ->json()['results'];
        

        return view('show', [
            'movie' => $movie, 
            'recommendations' => $recommendations
        ]);
    }

    public function genreMovie($genreId) {
      
        $response = Http::withToken(config('services.tmdb.api'))
            ->get(config('services.tmdb.baseURL').'discover/movie?api_key='.config('services.tmdb.api_key'). '&with_genres='.$genreId);
    
        if (!$response->ok()) {
            abort(500, 'Erro na API');
        }
    
        $movies = $response->json()['results'];
    
        $selectedGenre = $this->genreMovies($genreId);
    
        return view('genre', [
            'genres'=>$this->genreMovies(),
            'movies' =>  $movies,
            'selectedGenre' => $selectedGenre
        ]);
    }


    private function genreMovies($genreId=null) {

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

        if(!$genreId) {
            return $genreMovies;
        }

        if (!isset($genreMovies[$genreId])) {
            abort(404, 'Gênero não encontrado');
        }

        return $genreMovies[$genreId];

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

        if($user->user_type == 'administrador') {
            return view('dashboard', ['users'=>$users, 'user'=>$user]);
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

    public function destroy($id) {

        User::findorFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Usuário deletado com sucesso!');

    }

}


