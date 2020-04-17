@extends('layouts.app')
@section('content')
    <h3>Сумма - {{$cost->sum}} UAH</h3>
    <h3>Источник расхода - {{$cost->source}}</h3>
    <h3>Комментарий - {{$cost->comment}}</h3>
    <h3>Категория - {{$cost->category->name}}</h3>
    <h3>Пользователь - {{$cost->user->name}}</h3>
    <h4><a href="{{route('costs.index')}}">Назад</a></h4>
@endsection
