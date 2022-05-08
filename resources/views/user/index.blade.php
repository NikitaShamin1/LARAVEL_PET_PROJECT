@extends('layouts.app')
@section('content')
    <div style="text-align: center;" class="text-uppercase fw-bolder fs-4">Информация о пользователе</div>
    <table class="table mt-3">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th scope="row">Имя</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        </tbody>
    </table>

    <div style="text-align: center;" class="text-uppercase fw-bolder fs-4">Отзывы</div>
    @if ($reviews->count() != 0)
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">Фильм</th>
                <th scope="col">Отзыв</th>
                <th scope="col">Оценка</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->film() }}</td>
                    <td>{{ $review->review }}</td>
                    <td>{{ $review->mark }} из 10</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <span>У вас еще нет отзывов...</span>
    @endif
@endsection
