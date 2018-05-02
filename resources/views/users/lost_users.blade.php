@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
  Usuarios que no juegan hace tiempo (cantidad de días)
</h2>

@stop
@section('content')
  <form action="resultLostUsers" method="get">
    {{ csrf_field() }}
    Cantidad de días:
    <input type="text" name="days">
    <input type="submit" name="submitButton" value="Obtener usuarios perdidos">
  </form>
@stop