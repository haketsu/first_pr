@extends('main')
@section('createcars')
        <div>
            <form action="{{route('main.storeCar')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="brand">Марка</label>
                    <input type="text" name="brand" class="form-control" id="brand"  placeholder="Введите марку">
                </div>
                <div class="form-group">
                    <label for="model">Модель</label>
                    <input type="text" name="model" class="form-control" id="model"  placeholder="Введите модель">
                </div>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" name="color" class="form-control" id="color"  placeholder="Введите цвет">
                </div>
                <div class="form-group">
                    <label for="car_number">Номер</label>
                    <input type="text" name="car_number" class="form-control" id="car_number"  placeholder="Введите номер">
                </div>
                <div class="form-group">
                    <label for="status_flag">Статус</label>
                    <input type="text" name="status_flag" class="form-control" id="status_flag"  placeholder="Введите статус">
                </div>
                <div class="mb-3">
                    <label for="clients_id">Клиенты</label>
                    <select class="form-select form-select mb-3" id="client" name="clients_id">
                        <option selected disabled>Выберите клиента</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->id }}.{{ $client->name_surname }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" formmethod="post">Добавить</button>
            </form>
        </div>
@endsection