<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <form action="/chusqers/like/{{$chusqer->id}}" method="post" class="align-left">
        {{csrf_field()}}
        @auth()
            @if($chusqer->like->contains(Auth::user()))
                {{method_field('DELETE')}}
                <button>
                    <img src="https://cdn0.iconfinder.com/data/icons/thin-voting-awards/57/thin-234_broken_heart_favorite_dislike-512.png"  width="30" height="30" />
                </button>
            @else
                <button>
                    <img src="https://cdn0.iconfinder.com/data/icons/basic-lines/38/hearth-line-512.png"  width="30" height="30"/>
                </button>
            @endif
        @endauth
        @guest()
            <button>
                <img src="https://cdn0.iconfinder.com/data/icons/basic-lines/38/hearth-line-512.png" width="30" height="30"/>
            </button>
        @endguest
        @if($chusqer->like->count() > 0)
            <a href="/chusqers/like/{{$chusqer->id}}">
                {{$chusqer->like->count()}}
            </a>
        @endif
    </form>
    <p class="chusqer-hashtags align-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>

    @if(Auth::user() && Auth::user()->amI())
    <div class="card-section">
        @can('update', $chusqer)
            <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
        @endcan
        @can('delete', $chusqer)
        <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="button alert">Borra</button>

        </form>
        @endcan
    </div>
    @endif
</div>