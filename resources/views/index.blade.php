@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-around">
        <h2>
            <a href="{{route('profits.index')}}">Посмотреть доходы</a>
        </h2>

        <h2>
            <a href="{{route('costs.index')}}">Посмотреть расходы</a>
        </h2>
    </div>


@endsection
