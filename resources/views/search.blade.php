@extends('layouts.app')
@section('content')

    <div class="container" id="app">
        <div class="col-md-12">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Пошук коментарів</div>
                    <div class="panel-body">
                        <div class="row">
                            <search url="{{ route('search.searchPost') }}" label="Пошук" placeholder="Введіть назву заголовку..." v-on:search="searchPost"></search>
                        </div>
                        <hr>
                        <div v-if="keyword">
                            <p>Результати пошуку для "@{{ keyword }}"</p>
                        </div>
                        <div class="tabel-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Заголовок</th>
                                        <th>Коментар</th>
                                        <th>Детальніше</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="post in posts.data">
                                        <td>@{{ post.id }}</td>
                                        <td v-if="getUser.length > 0"><p :key="post.id" v-html="highlight(post.title)"></p></td>
                                        <td>@{{ post.body }}</td>
                                        <td @click="orderRedirect(post)" style="cursor: pointer"><a>Показати більше</a></td>
                                    </tr> 
                                </tbody>
                            </table>
                            <ul class="pagination">
                                <li v-if="posts.prev_page_url"><a @click.prevent="getPost(posts.prev_page_url)" href="#">Попередня </a></li>
                                <li v-if="posts.next_page_url"><a @click.prevent="getPost(posts.next_page_url)" href="#">Наступна</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

@endsection
