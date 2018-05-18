@extends('layouts.master')

@section('header')
<h2>
   Listado de jugadores (v1) con saldo inferior a {{ $realBalance }}
</h2>

@stop
@section('content')
   <div>
  @foreach ($players as $player)
    <div class="player">
      <a href="#">
        <strong>{{ $player->username }}</strong> - Nacimiemto:{{ $player->birthdate}} - Saldo real:{{ $player->real_balance }}  - Saldo con fichas: {{ $player->fake_balance }} - Email:
        {{ $player->user->email }}  - Último login: {{ $player->user->last_login }} - Juego de registro
        {{ $player->gameOfRegistration->name}}

      </a>

    </div>
  @endforeach
 {{ $players->appends($_GET)->links()}}  <!-- Para el paginado -->

 </div>

@stop