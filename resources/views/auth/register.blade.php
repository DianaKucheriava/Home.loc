@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Реєстрація</div>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ім'я:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ваш E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Підтвердити пароль:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть країну:</label>
                            <div class="col-md-6">
                                <select name="id_country" id="id_country" class="form-control" style="width:350px">
                                    <option value="">--- Оберіть країну ---</option>
                                        @foreach ($country as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть область:</label>
                            <div class="col-md-6">
                                <select name="id_region"  id="id_region" class="form-control" style="width:350px"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть місто:</label>
                            <div class="col-md-6">
                               <select name="id_city" id="id_city" class="form-control" style="width:350px"></select>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('select[name="id_country"]').on('change', function() {
                                    var id_country = $(this).val();
                                    if(id_country) {
                                        $.ajax({
                                            url: '/register/ajax/'+id_country,
                                            type: "GET",
                                            dataType: "json",
                                            success:function(data) {
                                                $('select[name="id_region"]').empty();
                                                $.each(data, function(key, value) {
                                                    $('select[name="id_region"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('select[name="id_region"]').empty();
                                    }
                                });
                            });
                             $(document).ready(function() {
                                $('select[name="id_region"]').on('change', function() {
                                    var id_region = $(this).val();
                                    if(id_region) {
                                        $.ajax({
                                            url: '/register/'+id_region,
                                            type: "GET",
                                            dataType: "json",
                                            success:function(data) {
                                                $('select[name="id_city"]').empty();
                                                $.each(data, function(key, value) {
                                                    $('select[name="id_city"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('select[name="id_city"]').empty();
                                    }
                                });
                            });
                        </script>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Зареєструватись
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection