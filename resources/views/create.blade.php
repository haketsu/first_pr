@extends('main')
@section('create')
        <div>
            <form action="{{route('main.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name_surname">ФИО</label>
                    <input type="text" minlength="3" name="name_surname" class="form-control" id="name_surname"  placeholder="Введите имя" required>
                </div>
                <div class="form-group">
                    <label for="sex">Пол</label>
                    <input type="text" name="sex" class="form-control" id="sex"placeholder="Введите пол" required>
                </div>
                <div class="form-group">
                    <label for="phone_num">Телефон</label>
                    <input type="tel" name="phone_num" class="form-control" id="phone_num"  placeholder="Формат +7-xxx-xxx-xx-xx" required>
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address"  placeholder="Введите адрес">
                </div>
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
                <button type="submit" class="btn btn-primary" formmethod="post">Добавить</button>
            </form>
        </div>
@endsection
