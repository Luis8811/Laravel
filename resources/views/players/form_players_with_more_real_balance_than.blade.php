@extends('layouts.master')

@section('header')
<h2>
  Jugadores con saldo real igual o superior a un valor
</h2>

@stop
@section('content')
  <form action="playersWithMoreRealBalance" method="get">
    {{ csrf_field() }}
    Saldo real:
    <input type="text" name="realBalance">
    <input type="submit" name="submitButton" value="Obtener jugadores">
  </form>
@stop