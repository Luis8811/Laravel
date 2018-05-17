@extends('layouts.master')

@section('header')
<h2>
   @if (isset($breed)){{ $breed->name }}@endif Listado de jugadores (v1) con saldo igual o superior a {{ $realBalance }}
</h2>

@stop
@section('content')
   <div>
  @foreach ($players as $player)
    <div class="player">
      <a href="#">
        <strong>{{ $player->username }}</strong> - Nacimiemto:{{ $player->birthdate}} - Saldo real:{{ $player->real_balance }}  - Saldo con fichas: {{ $player->fake_balance }} - Email:
        {{ $player->user->email }} - Último login: 
        {{ $player->user->last_login }}       
      </a>

    </div>
  @endforeach
 {{ $players ->appends($_GET)->links()}}  <!-- Para el paginado -->

 </div>

@stop