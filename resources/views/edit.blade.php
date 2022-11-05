@extends('main')
@section('edit')
    <div>
        <form action="{{route('main.show', $client->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name_surname">ФИО</label>
                <input type="text" name="name_surname" class="form-control" id="name_surname"  placeholder="Введите имя" value="{{$client->name_surname}}">
            </div>
            <div class="form-group">
                <label for="sex">Пол</label>
                <input type="text" name="sex" class="form-control" id="sex" placeholder="Введите пол" value="{{$client->sex}}">
            </div>
            <div class="form-group">
                <label for="phone_num">Телефон</label>
                <input type="tel" name="phone_num" class="form-control" id="phone_num"  placeholder="Введите телефон" value="{{$client->phone_num}}">
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" name="address" class="form-control" id="address"  placeholder="Введите адрес" value="{{$client->address}}">
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
