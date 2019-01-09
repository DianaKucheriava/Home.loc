@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/{{$user->avatar}}" id="avatar">
            <h2>{{$user->name}} "Домашня сторінка" </h2>
            <div class="col-xs-8 alert alert-success">
                <form action="/settings" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                           <td><h4>Змінити фото</h4></td>
                        </tr>
                        <tr>
                           <td><input type="file" name="avatar">{{ csrf_field() }}</td><td><input type="submit" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-xs-8 alert alert-success">
                <h4>Змінити пароль</h4><br />
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                       <p style='padding:15px;' class='bg-danger'>{{ $error }}</p>
                    @endforeach
                    @endif
                    @if(Request::get('errorMessage') !== null)
                        <p style='padding:15px;' class='bg-danger'>{{ Request::get('errorMessage') }}</p>
                    @endif
                <form method="post" action="{{ route('settings.update_password') }}">
                    {{ csrf_field() }}
                    <div class="placeholder">Поточний пароль:</div>
                    <input placeholder='Поточний пароль' name="oldpass" id="oldpass"  class="form-control" type="password"><br>
                    <div class="placeholder">Новий пароль:</div>
                    <input placeholder='Новий пароль' name="password" id="password"  class="form-control" type="password"><br>
                    <div class="placeholder">Підтвердити пароль:</div>
                    <input id="password_confirmation" placeholder='Підтвердити пароль' name="password_confirmation"  class="form-control" type="password">
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Зберегти змінити">
                </form>
            </div>
            <div class="col-xs-8 alert alert-success">
                <h4>Змінити email</h4>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                       <p style='padding:15px;' class='bg-danger'>{{ $error }}</p>
                    @endforeach
                    @endif
                    @if(Request::get('error_Message') !== null)
                        <p style='padding:15px;' class='bg-danger'>{{ Request::get('error_Message') }}</p>
                    @endif
                <form method="post" action="{{ route('settings.update_email')}}">
                    {{ csrf_field() }}
                    <div class="placeholder">Поточний email:</div>
                    <input type="email" name="oldemail" id="oldemail" class="form-control" placeholder="Поточний email"><br>
                    <div class="placeholder">Новий email:</div>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Новий email"><br>
                    <div class="placeholder">Підтвердити emai:</div>
                    <input type="email" name="email_confirmation" id="email_confirmation" class="form-control" placeholder="Підтвердити email">
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Зберегти змінити">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
