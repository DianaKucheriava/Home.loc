@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Домашня сторінка</h4></div>
                <div class="panel-body">
                    @if (session('status'))
                </div>
                @endif
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection