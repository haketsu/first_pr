@extends('main')
@section('create')
        <div>
            <form action="{{route('main.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name_surname">ФИО</label>
                    <input type="text"  name="name_surname" class="form-control" id="name_surname"  placeholder="Введите имя" required>
                </div>
                <div class="form-group">
                    <label for="sex">Пол</label>
                    <td><input type="radio" name="sex" value="m" required/> Мужчина</td>
                    <tr>
                        <td><input type="radio" name="sex" value="w" required/> Женщина</td>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="phone_num">Телефон</label>
                    <input type="tel" name="phone_num" class="form-control" id="phone_num"  placeholder="Формат +7-xxx-xxx-xx-xx" required>
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address"  placeholder="Введите адрес" required>
                </div>
                <div class="form-group">
                        <label for="brand">Марка</label>
                    <?php
                        $brandArray = array("AUDI", "BENTLEY", "BMW", "CHEVROLET", "INFINITI", "PORSCHE", "TOYOTA");
                    ?>

                        <select type="text" name="brand" class="form-control" id="brand">
                        <option>Выберите марку</option>
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
                    <input type="text" name="model" class="form-control" id="model"  placeholder="Введите модель" >
                </div>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" name="color" class="form-control" id="color"  placeholder="Введите цвет" >
                </div>
                <div class="form-group">
                    <label for="car_number">Номер</label>
                    <input type="text" name="car_number" class="form-control" id="car_number"  placeholder="Введите номер" >
                </div>
                <div class="form-group">
                    <label for="status_flag">Статус</label>
                    <td><input type="radio" name="status_flag" value="1" /> На парковке</td>
                    <tr>
                        <td><input type="radio" name="status_flag" value="0" /> Не на парковке</td>
                    </tr>
                </div>
                <button type="submit" class="btn btn-primary" formmethod="post">Добавить</button>
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
