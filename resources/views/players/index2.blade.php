@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
   @if (isset($breed)){{ $breed->name }}@endif Estadísticas de los jugadores
</h2>

@stop
@section('content')
    <div class="player">
      Cantidad de jugadores registrados: {{ $count }}
    </div>
    <div class="real_fake">
      Máximo saldo real: {{ $max_real_balance }}
      Mínimo saldo real: {{ $min_real_balance }}
    </div>
    <div class="fake_balance">
    	Máximo saldo con fichas: {{ $max_fake_balance }}
    	Mínimo saldo con fichas: {{ $min_fake_balance }}
    </div>
    <div class="age_statistics">
        Edad de jugadores más jóvenes: {{ $min_age }}
    	Edad de jugadores más viejos: {{ $max_age }}
    	Promedio de edad de los jugadores: {{ $average_age }} 
    </div>
@stop