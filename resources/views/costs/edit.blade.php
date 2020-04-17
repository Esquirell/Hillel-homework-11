
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h2>Редактировать расход</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
                <form id="contact-form" class="form" action="{{route('costs.update', ['cost' => $cost->id])}}"
                      method="post" role="form">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-label" for="name">Сумма</label>
                        <input type="text" class="form-control" id="name" name="sum" value="{{$cost->sum}}"
                               tabindex="1" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Источник</label>
                        <input type="text" class="form-control" id="source" name="source" value="{{$cost->source}}"
                               tabindex="2" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="tar">Источник</label>
                        <select class="form-control" name="tar" id="tar">
                            @foreach ($categories as $category)
                                @if ($cost->category_id == $category->id)
                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Комментарий</label>
                        <textarea rows="5" cols="50" name="comment" class="form-control" id="message"
                                  placeholder="Message..." tabindex="4" required>{{$cost->comment}}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-start-order">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
