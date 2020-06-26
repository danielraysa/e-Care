<template>
<div>   
    <a v-for="user in all_users" :key="user.id" href="#" class="list-group-item" v-on:click="activeFriend = user.id">
        {{ user.name }}
    </a>
    <!-- <v-list>
        <v-list-tile
            v-for="friend in all_users"
            :color="(friend.id==activeFriend)?'green':''"
            :key="friend.id"
            @click="activeFriend=friend.id"
        >
            <v-list-tile-action>
                <v-icon :color="green">account_circle</v-icon>
            </v-list-tile-action>

            <v-list-tile-content>
                <v-list-tile-title>{{friend.name}}</v-list-tile-title>
            </v-list-tile-content>

        </v-list-tile>
    </v-list> -->
</div>
</template>

<script>
    export default {
        props: ['all_users','activeFriend'],
        /* methods:{
            fetchUsers() {
                axios.get('/get-users').then(response => {
                    console.log(response);
                    this.all_users = response.data;
                    if(this.all_users.length > 0){
                        this.activeFriend = this.all_users[0].id;
                    }
                });
            },
        },
        created(){
            this.fetchUsers();
        } */
    };
</script>

<style lang="scss">
</style> 