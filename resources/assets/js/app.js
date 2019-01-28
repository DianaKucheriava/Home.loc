import Vue from 'vue'
import axios from 'axios'
import VueRouter from 'vue-router'

import Search from './components/Search.vue'

Vue.use( VueRouter );

require('./bootstrap');
window.Vue = require('Vue');
Vue.component('search', require('./components/Search.vue').default);

window.axios = require('axios');

const Pos =  { template: '<h2>{{$route.params.id}}</h2>'}
const NotFound = { template: '<h2>Страница не найдена</h2>' }
const routes = [
    { path: '/', component: app },
    { path: '/search', 
        redirect: to => {
            if (to.params.id > 10) {
                return '/404'
            } else {
                return '/post/show/:id'
            }
        }
    },
    { path: 'post/show/:id', 
        redirect: to => {
            if (to.params.id > 10) {
                return '/404'
            } else {
                return '/post/show/:id'
            }
        }
    },
    { path: '/post/show/:id', component: Pos, name:'Post_link', props: true },
    { path: '/404', component:NotFound },
];
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});
const app = new Vue({
    el: '#app',
    router: router,
    
    data: {
        keyword: '',
        url: '/search/searchPost', 
        posts: Array
    },
    mounted() {
        this.getUser(this.url);
    },
    methods: {
        getUser(url) {
            axios.get(url).then(response => {
                this.posts = response.data; 
            }).catch(error => {
                console.log(Object.assign({}, error));
            })
        },
        searchPost(keyword) { 
            this.keyword = keyword;
            const url = `${this.url}?keyword=${this.keyword}`;
            axios.get(url).then(response => {
                this.posts = response.data;
            }).catch(error => {
                console.log(Object.assign({}, error));
            })
        },
        orderRedirect: function(post) {
            this.$router.replace('/post/show/' + post.id);
            location.reload();
        },
        highlight(text) {
                return text.replace(new RegExp(this.keyword, 'gi'), '<span class="highlighted">$&</span>');
            },
    }
});
