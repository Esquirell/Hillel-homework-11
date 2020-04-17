@extends('layouts.app')
@section('content')
<h3>Сумма - {{$profit->sum}} UAH</h3>
<h3>Источник дохода - {{$profit->source}}</h3>
<h3>Комментарий - {{$profit->comment}}</h3>
<h3>Категория - {{$profit->category->name}}</h3>
<h3>Пользователь - {{$profit->user->name}}</h3>
<h4><a href="{{route('profits.index')}}">Назад</a></h4>
@endsection
