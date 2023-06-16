
@extends('layouts.app')

@section('content')
    <h1>Редагування автомобіля</h1>

    @if ($auto->id)
        <form action="{{ route('autos.update', ['auto' => $auto->id]) }}" method="POST">
            @else
                <form action="{{ route('autos.store') }}" method="POST">
                    @endif
                    @csrf
                    @method($auto->id ? 'PUT' : 'POST')

                    <div>
                        <label for="name">Назва</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $auto->name) }}" required>
                    </div>
                    <div>
                        <label for="body_type">Тип тіла:</label>
                        <input type="text" id="body_type" name="body_type" required>
                        @error('body_type')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="brand">Бренд</label>
                        <select name="brand" id="brand" required>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id === $auto->brand_id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="country">Країна</label>
                        <select name="country" id="country" required>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id === $auto->country_id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="guaranty">Гарантія:</label>
                        <input type="text" id="guaranty" name="guaranty" required>
                        @error('guaranty')
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

                    <div>
                        <label for="price">Ціна</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $auto->price) }}" required>
                    </div>

                    @if (!$auto->id)
                        <input type="hidden" name="salon_id" value="{{ $salonId }}">
                    @endif

                    <button type="submit">Зберегти</button>
                </form>
        @endsection
