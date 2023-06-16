@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('clients.create') }}">Додати кліента</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>Ім'я</th>
            <th>Адреса</th>
            <th>Телефон</th>
            <th>Автомобіль</th>
            <th>Дії</th>
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
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Ви впевнені?')">Видалити</button>
                    </form>
                    <a href="{{ route('clients.edit', $client) }}">Редагувати</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
