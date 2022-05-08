@extends('layouts.app')
@section('content')
    <div style="text-align: center;" class="text-uppercase fw-bolder fs-3">Фильмы</div>
    <div class="container border mt-3 rounded" id="filters">

        <form class="row row-cols-md-auto g-3 align-items-center pb-3" method="GET" action="{{ route('film.index') }}">
            <div class="col-md-6 d-flex">
                <select class="form-select mt-3 mr-3" id="inlineFormSelectPref" name="genre">
                    <option selected disabled>Выберите жанр...</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 d-flex">
                <select class="form-select mt-3 mr-3" id="inlineFormSelectPref" name="year">
                    <option selected disabled>Выберите год выпуска...</option>
                    @for($year = date('Y'); $year > 1959; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="container-fluid d-flex">
                <div class="mt-3">
                    <label for="inlineFormSelectPref" class="form-label">Сортировать по...</label>
                </div>
                <div class="mt-3">
                    <select class="form-select" id="inlineFormSelectPref" name="sort">
                        <option value="Rating">Рейтингу</option>
                        <option value="YearDesc">По году выпуска (сначала самые новые)</option>
                        <option value="YearAsc">По году выпуска (сначала самые старые)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Найти</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Год выпуска</th>
            <th scope="col">Режиссер</th>
            <th scope="col">Возрастное ограничение</th>
            <th scope="col">Рейтинг</th>
        </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                <th scope="row"><a href="{{ route('film.show', $film->id) }}">{{ $film->name }}</a></th>
                <td>{{ $film->description }}</td>
                <td>{{ $film->year }}</td>
                <td>{{ $film->producer }}</td>
                <td>{{ $film->age }}</td>
                <td>{{ $film->rating }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if ($films->count() == 0)
        <div class="center">
            <span>Похоже, интересующего Вас фильма нету...</span>
            <br>
            <a href="{{ route('film.create') }}">Добавить новый фильм</a>
        </div>
    @endif

    <div class="mt-3">{{ $films->withQueryString()->links() }}</div>
@endsection
