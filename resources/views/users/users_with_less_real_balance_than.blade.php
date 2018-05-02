@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
  Usuarios con saldo real inferior a un valor
</h2>

@stop
@section('content')
  <form action="usersWithLessRealBalanceThan" method="get">
    {{ csrf_field() }}
    Saldo real:
    <input type="text" name="realBalance">
    <input type="submit" name="submitButton" value="Obtener usuarios">
  </form>
@stop