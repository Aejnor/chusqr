<div class="cell">
    <div class="card">

        {{--<div class="card-header">--}}
            {{--{{$user->slug}}--}}
        {{--</div>--}}

        <img class="card-image" src="{{$user->avatar}}" width="200" height="200">

        <div class="card-section">
            <h4 class="card-divider"><a href="/{{$user->slug}}">{{$user->name}}</a></h4>
        </div>

    </div>
</div>

