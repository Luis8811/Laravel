@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
   @if (isset($breed)){{ $breed->name }}@endif Listado de jugadores

  <a href="{{ url('cats/create') }}" class="btn btn-primary pull-right">
    Ordenar jugadores por saldo
  </a>
</h2>

@stop
@section('content')
  @foreach ($playersWithAtLeast10RealBalance as $player)
    <div class="player">
      <a href="#">
        <strong>{{ $player->username }}</strong> - Nacimiemto:{{ $player->birthdate}} - Saldo real:{{ $player->real_balance }}  - Saldo con fichas: {{ $player->fake_balance }}
      </a>
    </div>
  @endforeach
@stop