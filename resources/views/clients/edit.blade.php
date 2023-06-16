@extends('layouts.app')

@section('content')
    <h1>Редагувати кліента</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="full_name">Ім'я:</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $client->full_name) }}" required>
        </div>
        <div>
            <label for="address">Адреса:</label>
            <input type="text" name="address" id="address" value="{{ old('address', $client->address) }}" required>
        </div>
        <div>
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" required>
        </div>
        <div class="form-group">
            <label for="salon_id">Салон</label>
            <select name="salon_id" id="salon_id" class="form-control">
                @foreach($salons as $salon)
                    <option value="{{ $salon->id }}">{{ $salon->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Оновити</button>
    </form>
@endsection
