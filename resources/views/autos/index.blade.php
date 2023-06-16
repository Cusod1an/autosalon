@extends('layouts.app')

@section('content')
    <h1>Список</h1>
    <div/>
    <div>
        @if ($salon)
            <a href="{{ route('autos.create') }}">Додати автомобіль</a>
        @endif
    </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>Назва</th>
            <th>Бренд</th>
            <th>Країна</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($autos as $auto)
            <tr>
                <td>{{ $auto->name }}</td>
                <td>{{ $auto->brand->name }}</td>
                <td>{{ $auto->country->name }}</td>
                <td>
                    <a href="{{ route('autos.show', $auto) }}">Деталі</a>
                    <form action="{{ route('autos.destroy', ['auto' => $auto]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Вы впевнені?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
