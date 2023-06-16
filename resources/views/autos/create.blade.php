@extends('layouts.app')

@section('content')
    <h1>Додати автомобіль</h1>
    <form action="{{ route('autos.store') }}" method="POST">
    @csrf

        <div>
            <label for="name">Назви:</label>
            <input type="text" id="name" name="name" required>
            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="brand">Бренд:</label>
            <select id="brand" name="brand_id" required>
                <option value="">Выберите бренд</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="series">Серія:</label>
            <input type="text" id="series" name="series" required>
            @error('series')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="country">Країна:</label>
            <select id="country" name="country_id" required>
                <option value="">Оберіть країну</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('country_id')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="body_type">Тип тіла (SUV,Sedan,Hatchback):</label>
            <input type="text" id="body_type" name="body_type" required>
            @error('body_type')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="price">Ціна:</label>
            <input type="number" id="price" name="price" required>
            @error('price')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="guaranty">Гарантія:</label>
            <input type="text" id="guaranty" name="guaranty" required>
            @error('guaranty')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="client_id">Клієнт:</label>
            <select id="client_id" name="client_id">
                <option value="">Не обрано</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                @endforeach
            </select>
            @error('client_id')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="salon_id">Салон</label>
            <select name="salon_id" id="salon_id" class="form-control">
                @foreach($salons as $salon)
                    <option value="{{ $salon->id }}">{{ $salon->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit">Зберегти</button>
    </form>
@endsection
