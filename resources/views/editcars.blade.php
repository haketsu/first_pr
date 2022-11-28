@extends('main')
@section('editcars')
    <div>
        <form action="{{route('main.showCar', $car->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="brand">Марка</label>
                <?php
                $brandArray = array("AUDI", "BENTLEY", "BMW", "CHEVROLET", "INFINITI", "PORSCHE", "TOYOTA");
                ?>
                <select type="text" name="brand" class="form-control" id="brand" required>
                    <option value="{{$car->brand}}" selected>{{$car->brand}}</option>
                    <?php
                    foreach ($brandArray as $brand)
                    {
                        echo '<option '.$brand.' value="'.$brand.'">'.$brand.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Модель</label>
                <input type="text" name="model" class="form-control" id="model"  placeholder="Введите модель" value="{{$car->model}}" required>
            </div>
            <div class="form-group">
                <label for="color">Цвет</label>
                <input type="text" name="color" class="form-control" id="color"  placeholder="Введите цвет" value="{{$car->color}}" required>
            </div>
            <div class="form-group">
                <label for="car_number">Номер</label>
                <input type="text" name="car_number" class="form-control" id="car_number"  placeholder="Введите номер" value="{{$car->car_number}}" required>
            </div>
            <div class="form-group">
                <label for="status_flag">Статус</label>
                <td><input @if($car->status_flag==1) checked @endif type="radio" name="status_flag" value="1" required/> На парковке</td>
                <tr>
                    <td><input @if($car->status_flag==0) checked @endif type="radio" name="status_flag" value="0" required/> Не на парковке</td>
                </tr>
            </div>
            <div class="mb-3">
                <label for="clients_id">Клиенты</label>
                <select class="form-select form-select mb-3" id="client" name="clients_id" required>
                    <option disabled>Выберите клиента</option>
                    @foreach ($clients as $client)
                        <option @if($client->id=$car->clients_id) selected @endif value="{{ $client->id }}">{{ $client->id }}.{{ $client->name_surname }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
