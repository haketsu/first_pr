@extends('main')
@section('list')

<head>
    <title> Dependent Dropdown </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=stylesheet" href="{{asset('css/app.css')}}">@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<span>Клиенты: </span>
<select style="width: 200px" class="name_surname" id="name_surname">

    <option value="0" disabled="true" selected="true">Клиент</option>
    @foreach($clients as $client)
        <option value="{{$client->id}}">{{$client->name_surname}}</option>
    @endforeach

</select>

<span>Машины: </span>
<select style="width: 200px" class="brand" id="brand"></select>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.name_surname',function(){
            var clients_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findName')!!}',
                data:{'id':clients_id},
                success:function(data){
                    op+='<option value="0" selected disabled>Выберите авто</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].model+'</option>';
                    }

                    div.find('.brand').html(" ");
                    div.find('.brand').append(op);
                },
                error:function(){

                }
            });
        });
    });
</script>
@endsection
