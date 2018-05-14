@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
  Accediendo a propiedades del usuario a través del Player
</h2>

@stop
@section('content')
 <h3>
  Last login: {{ $user->last_login}}
 </h3>
 <h3>
  Email: {{ $user->email }}
 </h3>
@stop