@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Реєстрацію завершено</div>
          <div class="panel-body">  
            Ваша пошта підтверджена. Натисніть посилання <a href="{{url('/home')}}">щоб перейти на головну сторінку</a>
          </div>
        </div> 
      </div>
    </div>
</div>
@endsection
