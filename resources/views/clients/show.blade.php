@extends('layouts.app')

@section('content')
    <h1>Деталі Клієнта</h1>

    <p>
        <strong>Дія:</strong> {{ $client->full_name }}<br>
        <strong>Адреси:</strong> {{ $client->address }}<br>
        <strong>Телефони:</strong> {{ $client->phone }}
    </p>

    <h2>Автомобілі</h2>

    @if ($client->autos->count() > 0)
        <ul>
            @foreach ($client->autos as $auto)
                <li>
                    <strong>Ім'я:</strong> {{ $auto->name }}<br>
                    <strong>Країна:</strong> {{ $auto->country->name }}<br>
                    <strong>Бренд:</strong> {{ $auto->brand->name }}<br>
                    <strong>Серія:</strong> {{ $auto->series }}<br>
                    <strong>Гарантія:</strong> {{ $auto->guaranty }}<br>
                    <strong>Ціна:</strong> {{ $auto->price }}<br>
                    <strong>Тип кузова:</strong> {{ $auto->body_type }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Немає машини</p>
    @endif

    @if ($client->autos->count() > 0)
        <form action="{{ route('clients.detachCar', ['client' => $client->id, 'auto' => $client->autos[0]->id]) }}" method="POST">
            @csrf
            <button type="submit">Прибрати машину</button>
        </form>
    @endif
@endsection
