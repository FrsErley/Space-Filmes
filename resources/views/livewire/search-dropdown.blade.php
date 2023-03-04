<div x-data="{ isOpen: true}" @click.away="isOpen = false">

    <div>
        <form class="form-inline " action="/" method="GET">
            <input 
                wire:model.debounce.500ms="search" style="border-radius: 25px" class="form-control" type="text" placeholder="Pesquise seu filme.." id="search" name="search" aria-label="Search"
                @focus=" isOpen = true "
                @keydown=" isOpen = true "
                @keydown.escape.window="isOpen = false"
                @keydown.shift.tab="isOpen = false"
            >
        </form>
    </div>

    @if (strlen($search) >= 2)
    

        @if ($searchResults->count() > 0)

        <div id="search-bar" style= "border-radius:8px; position:absolute"
        x-show="isOpen">

                <ul class="lista-filmes" style="list-style-type:none; border-radius: 8px">
                    @foreach ($searchResults as $result)
                        
                            <a style="text-decoration:none; color: white;" href="/movie/{{$result['id']}}">  
                                <li class=" search-click" style=" display:flex; width:260px; padding:12px; border-bottom: 1px solid; border-color:rgba(240, 248, 255, 0.218)">
                                {{-- Alterar tamanho baseado no tamanho do titulo do filme --}}
                                @if ($result['poster_path'])
                                    <img style="width: 50px; margin-right: 8px" src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster">
                                @else
                                <img style="width: 50px; margin-right: 8px;" src="https://via.placeholder.com/50x70" alt="poster">
                                @endif
                                <span class="d-flex align-items-center"> {{$result['title']}} </span>
                                </li>
                            </a>
                        
                    @endforeach
                </ul>
            
        @else
            <div id="movies-no" class="p-3" style="color: white; width: 250px" >Não encontramos {{ $search }}</div>
        @endif
    </div>
    @endif
</div>
