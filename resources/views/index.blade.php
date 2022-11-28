@extends('main')
@section('index')

    <div><a href ="{{route('main.create')}}" class="btn btn-primary">Добавить</a></div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Пол</th>
                <th scope="col">Адрес</th>
                <th scope="col">Марка</th>
                <th scope="col">Номер машины</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                <th>{{$client['id']}}</th>
                    <td>{{$client['name_surname']}}</td>
                    <td>{{$client['phone_num']}}</td>
                    <td>{{$client['sex']}}</td>
                    <td>{{$client['address']}}</td>
                    <td>{{$client['brand']}}</td>
                    <td>{{$client['car_number']}}</td>
                    <td><a class="btn btn-warning" href="/main/{{$client['id']}}/edit">Редактрировать</a></td>
                    <td> <form action="/main/{{$client['id']}}/delete" method="post">
                            @csrf
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
