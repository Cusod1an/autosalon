@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $auto->name }}</h1>
        <p><strong>Бренд:</strong> {{ $auto->brand->name }}</p>
        <p><strong>Країна:</strong> {{ $auto->country->name }}</p>
        <p><strong>Серія:</strong> {{ $auto->series }}</p>
        <p><strong>Гарантія:</strong> {{ $auto->guaranty }}</p>
        <p><strong>Ціна:</strong> {{ $auto->price }}</p>
        <p><strong>Тип кузова:</strong> {{ $auto->body_type }}</p>
    </div>

    <div>
        <a href="{{ route('autos.edit', ['auto' => $auto->id]) }}">Редагування</a>
    </div>
@endsection
