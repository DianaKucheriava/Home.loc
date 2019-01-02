@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{ $post->title }}</b></p>
                    <p>
                        {{ $post->body }}
                    </p>
                    <hr />
                    <h4>Показати коментарі</h4>
                    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                    <hr />
                    <h4>Додати коментар</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Додати коментар" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection