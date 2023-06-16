@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Ім'я</th>
            <th>Адреси</th>
            <th>Телефон</th>
            <th>Автомобіль</th>
            <th>Дія</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->full_name }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->phone }}</td>
                <td>
                    @if ($client->autos->isNotEmpty())
                        @foreach ($client->autos as $auto)
                            {{ $auto->name }}
                            <br>
                        @endforeach
                    @else
                        No Car
                    @endif
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">Деталі</a>
                    @if ($client->autos->isNotEmpty())
                        <form action="{{ route('autos.deleteWithClient', $client->autos->first()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Вы уверены, что хотите подтвердить заказ?')">Деталі</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('clients.allIndex') }}">Всі клієнти</a>
@endsection
