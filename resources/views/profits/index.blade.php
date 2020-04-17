@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <form action="{{route('profits.index')}}" method="get">
        @csrf
        <select name="tar">
            <option value="0">All</option>
            @foreach ($categories as $category)
                @if ($request->get('tar') == $category->id)
                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif

            @endforeach

        </select>
        <input type="submit" value="Показать выбранные">
    </form>
</div>


<div class="container">
    <div class="row">


        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>Сумма дохода</th>
                    <th>Источник дохода</th>
                    <th>Категория</th>
                    <th>Добавил</th>
                    <th>Подробнее</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                    </thead>
                    <tbody>
                    @foreach($profits as $profit)


                        <tr>
                            <td>
                                {{$profit->sum}} UAH
                            </td>
                            <td>{{$profit->source}}</td>
                            <td>{{$profit->category->name}}</td>
                            <td>{{$profit->user->name}}</td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="More">
                                    <a class="btn btn-primary btn-xs" data-title="Edit"
                                       href="{{route('profits.show', ['profit' => $profit->id])}}">
                                        Подробнеее
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a class="btn btn-primary btn-xs" data-title="Edit"
                                       href="{{route('profits.edit', ['profit' => $profit->id])}}">
                                        Редактировать
                                    </a>
                                </p>
                            </td>
                            <td>
                                <form method="post" action="{{route('profits.destroy', ['profit' => $profit->id])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-xs" data-title="Delete">X</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-around">
    <h5><a href="{{route('profits.create')}}">Добавить новый доход</a></h5>
    <h5><a href="{{route('returnhome')}}">Домой</a></h5>
</div>
@endsection
