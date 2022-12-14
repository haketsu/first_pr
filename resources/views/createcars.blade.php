@extends('main')
@section('createcars')
        <div>

            <form action="{{route('main.storeCar')}}" method="post">
                @csrf
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
                    <input type="text" name="model" class="form-control" id="model"  placeholder="Введите модель" required>
                </div>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" name="color" class="form-control" id="color"  placeholder="Введите цвет" required>
                </div>
                <div class="form-group">
                    <label for="car_number">Номер</label>
                    <input type="text" name="car_number" class="form-control" id="car_number"  placeholder="Введите номер" required>
                </div>
                <div class="form-group">
                    <label for="status_flag">Статус</label>
                    <td><input type="radio" name="status_flag" value="1" required/> На парковке</td>
                    <tr>
                        <td><input type="radio" name="status_flag" value="0" required/> Не на парковке</td>
                    </tr>
                </div>
                <div class="mb-3">
                    <label for="clients_id">Клиенты</label>
                    <select class="form-select form-select mb-3" id="client" name="clients_id" required>
                        <option selected disabled>Выберите клиента</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->id }}.{{ $client->name_surname }}</option>
                        @endforeach
                    </select>
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
