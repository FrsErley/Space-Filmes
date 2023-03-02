<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{

    public $search ='';

    public function render()
    {

        $searchResults = [];


        if (strlen($this->search) >= 2) {

            $searchResults = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMWFkODM5YmUyNjczYTc2ZTg0YmVkOGExZTljNjJlNCIsInN1YiI6IjYzY2ViZWMwMzM2ZTAxMDBiZWNjNGRmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.c6PoptWpYmHFJBJkBlx7tAM_xVePrJAVubEwYF07gm4')
        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];

        }


        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
