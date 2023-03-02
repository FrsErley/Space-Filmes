<div>

    <div style="position:relative;" class="mr-4">
        <form style="display: flex" class="form-inline mt-2 mt-md-0" action="/" method="GET">
            <input wire:model.debounce.500ms="search" style="border-radius: 25px" class="form-control" type="text" placeholder="Pesquise seu filme.." id="search" name="search" aria-label="Search">
        </form>
    </div>

    @if (strlen($search) >= 2)
    <div id="search-bar" style= "border-radius:8px; display:block">

        @if ($searchResults->count() > 0)

                <ul class="lista-filmes" style="list-style-type:none; border-radius: 8px">
                    @foreach ($searchResults as $result)
                        <li class="border-bottom p-3" style="width: 250px">
                            <a style="text-decoration:none; color: white" href="/movie/{{$result['id']}}">  
                                @if ($result['poster_path'])
                                    <img style="width: 40px; margin-right: 8px" src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster">
                                @else
                                <img style="width: 40px; margin-right: 8px" src="https://via.placeholder.com/50x70" alt="poster">
                                @endif
                                <span> {{$result['title']}} </span>
                                
                            </a>
                        </li>
                    @endforeach
                </ul>
            
        @else
            <div id="movies-no" class="p-3" style="color: white; width: 250px" >Não encontramos {{ $search }}</div>
        @endif
    </div>
    @endif
</div>
