@extends('layouts.app')
@section('content')
    <div style="text-align: center;" class="text-uppercase fw-bolder fs-4">{{ $film->name }}</div>
    <table class="table mt-3">
        <tbody>
        <tr>
            <th scope="row">Описание</th>
            <td>{{ $film->description }}</td>
        </tr>
        <tr>
            <th scope="row">Жанр</th>
            <td>
                @foreach($genres as $genre)
                    {{ $genre }}
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="row">Год выпуска</th>
            <td>{{ $film->year }}</td>
        </tr>
        <tr>
            <th scope="row">Режиссер</th>
            <td>{{ $film->producer}}</td>
        </tr>
        <tr>
            <th scope="row">Возрастное ограничение</th>
            <td>{{ $film->age }}</td>
        </tr>
        <tr>
            <th scope="row">Рейтинг</th>
            <td>{{ $film->rating }}</td>
        </tr>
        </tbody>
    </table>

    <div style="text-align: center;" class="text-uppercase fw-bolder fs-5">Пользовательские отзывы
        ({{ $reviews->count() }})
    </div>
    @if ($reviews->count() != 0)
        <table class="table mt-3">
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <th scope="row">Пользователь {{ $review->user_id }}</th>
                    <td>{{ $review->review }}</td>
                    <td>{{ $review->mark }} из 10</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @guest
        <div style="text-align: center;">Чтобы оставить отзыв необходимо авторизоваться!</div>
    @else
        <div style="text-align: center;" class="text-uppercase fw-bolder fs-5 mt-5">Оставьте свой отзыв!</div>
        <form action="{{ route('review.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Ваш отзыв</label>
                <textarea type="text" class="form-control" id="review" name="review"></textarea>
            </div>
            <div class="mb-3">
                <label for="mark" class="form-label">Оценка</label>
                <input type="text" class="form-control" id="mark" name="mark">
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="film_id" value="{{ $film->id }}">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    @endguest

@endsection
