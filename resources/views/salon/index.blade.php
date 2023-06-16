<!-- salon.index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Головна сторінка</h1>
    <a href="{{ route('autos.index') }}">Список автомобілів</a>
    <a href="{{ route('clients.index') }}">Список прийнятих замовлень</a>
@endsection
