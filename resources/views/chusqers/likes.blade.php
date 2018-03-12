@extends('layouts.app')

@section('content')
    @include('chusqers.chusqer')
    @foreach($users->chunk(3) as $row)
        <div class="row large-3">
            @foreach($row as $user)
                @include('users.partials.likes', ['user' => $user])
            @endforeach
        </div>
    @endforeach
@endsection