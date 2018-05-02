@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
   @if (isset($breed)){{ $breed->name }}@endif Resultados de usuarios perdidos hace {{ $days }} días o más
</h2>

@stop
@section('content')
  @foreach ($users as $user)
    <div class="player">
      <a href="#">
        Username : <strong>{{ $user->username }}</strong>
        Email: <strong>{{ $user->email }}</strong>
        Último login: <strong>{{ $user->last_login }}</strong>
        Juego de registro: <strong>{{ $user->name }}</strong>
      </a>
    </div>
  @endforeach
@stop