@extends('main')
@section('allcars')
    <div><a href ="{{route('main.createCar')}}" class="btn btn-primary">Добавить</a></div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Марка</th>
                    <th scope="col">Модель</th>
                    <th scope="col">Номер машины</th>
                    <th scope="col">Номер клиента</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{$car['id']}}</td>
                <td>{{$car['brand']}}</td>
                <td>{{$car['model']}}</td>
                <td>{{$car['car_number']}}</td>
                <td>{{$car['clients_id']}}</td>
                <td>{{$car['status_flag']}}</td>
                <td><a class="btn btn-warning" href="/cars/{{$car['id']}}/edit">Редактрировать</a></td>
                <td> <form action="/{{$car['id']}}/delete" method="post">
                        @csrf
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
@endsection
