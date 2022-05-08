@extends('layouts.app')
@section('content')
    <div style="text-align: center;" class="text-uppercase fw-bolder fs-3">Добавление нового фильма</div>
    <form action="{{ route('film.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Описание</label>
            <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Год выпуска</label>
            <input type="text" class="form-control" id="year" name="year">
        </div>
        <div class="mb-3">
            <label for="category">Возрастное ограничение</label>
            <select class="form-control" id="age" name="age">
                <option value="0+">0+</option>
                <option value="6+">6+</option>
                <option value="12+">12+</option>
                <option value="16+">16+</option>
                <option value="18+">18+</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Режиссер</label>
            <input type="text" class="form-control" id="producer" name="producer">
        </div>
        <div class="mb-3">
            <label for="genres">Жанры фильма</label>
            <select class="form-control" id="genres" name="genres[]" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
