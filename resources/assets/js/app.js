require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import {HTTP} from './http-common'
Vue.use( VueRouter );
require('./bootstrap');
	const Pos =  { template: '<h2>{{$route.params.id}}</h2>'}
	const NotFound = { template: '<h2>Страница не найдена</h2>' }
	const routes = [
		{ path: '/', component: app },
		{ path: 'index/post/show/:id', 
			redirect: to => {
				if (to.params.id > 10) {
					return '/404'
				} else {
					return '/post/show/:id'
				}
			}
		},
		{ path: '/post/show/:id', component: Pos, name:'Post_link' },
		{ path: '/404', component:NotFound },
	];
	const router = new VueRouter({
		mode: 'history',
		routes: routes,
	});
	const app = new Vue({
		el: '#app', 
		 router: router,
		data() {
			return {
				keywords: null,
				results: [],
			};
		},
		created() {
			HTTP.get('search').then(response => {
				this.results = response.data
			}).catch(e => {
				this.errors.push(e)
			})
		},
		computed: {
			res() {
				return this.keywords ? this.results.filter(result => result.title.includes(this.keywords)) : [];
			}
		},
		methods: {
			highlight(text) {
				return text.replace(new RegExp(this.keywords, 'gi'), '<span class="highlighted">$&</span>');
			},
			someFunction: function (event) {
				location.reload();
			}
		}
	})
