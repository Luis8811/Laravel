@extends('layouts.master')

@section('header')
  @if (isset($breed))
    <a href="{{ url('/') }}">Ir a página principal</a>
  @endif
<h2>
   @if (isset($breed)){{ $breed->name }}@endif Resultados
</h2>

@stop
@section('content')
  @foreach ($users as $user)
    <div class="player">
      <a href="#">
        Username : <strong>{{ $user->username }}</strong>
        Email: <strong>{{ $user->email }}</strong>
        Saldo: <strong>{{ $user->real_balance }}</strong>
      </a>
    </div>
  @endforeach
@stop