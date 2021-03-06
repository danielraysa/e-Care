
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
 
    data: {
        messages: [],
        all_users: [],
        activeFriend: null
    },

    created() {
        this.fetchUsers();
        // this.fetchMessagesPrivate();

        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    },
    watch:{
        /* files:{
            deep:true,
            handler(){
                let success=this.files[0].success;
                if(success){
                    this.fetchMessages();
                }
            }
        }, */
        /* activeFriend(val){
            this.fetchMessagesPrivate();
        }, */
    },
    methods: {
        fetchUsers() {
            axios.get('/get-users').then(response => {
                // console.log(response);
                this.all_users = response.data;
                if(this.all_users.length > 0){
                    this.activeFriend = this.all_users[0].id;
                }
                this.fetchMessagesPrivate();
            });
        },
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
        fetchMessagesPrivate() {
            /* if(!this.activeFriend){
                return alert('Please select friend');
            } */
            // this.activeFriend = 2;
            axios.get('/messages/'+this.activeFriend).then(response => {
                this.messages = response.data;
                console.log(response.data);
            });
        },
        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {

            });
        },
        /* changeUser(){
            // this.activeFriend = id;
            alert(this.activeFriend);
        } */
    }
});

