@extends('layouts.app')
@section('content')
<div class="container">
    <div id="app">
        <input type="text"  v-model="keywords" id="search" placeholder="Пошук...." />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel-footer" v-if="res.length" >
                    <h1>Результат:</h1>
                    <p v-if="res.length > 0">
                        <router-link  :to="{ name: 'Post_link', params: { id:result.id }}"  v-for="result in res" tag="li">@{{result.title}} 
                            <button  id="someFunction" v-on:click="someFunction">Показати коментар</button>
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection