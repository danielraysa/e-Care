<template>
<div class="direct-chat-messages">
    <div v-for="message in messages" :key="message.id">
        <div class="direct-chat-msg" v-if="message.user_id != user.id">
            <div class="direct-chat-info clearfix">
            <span class="direct-chat-name float-left">{{ message.user.name }}</span>
            <span class="direct-chat-timestamp float-right">{{ message.created_at }}</span>
            </div>
            <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="Mess  age User Image">
            <div class="direct-chat-text">
            {{ message.message }}
            </div>
        </div>
        <div class="direct-chat-msg right" v-else>
            <div class="direct-chat-info clearfix">
            <span class="direct-chat-name float-right">{{ message.user.name }}</span>
            <span class="direct-chat-timestamp float-left">{{ message.created_at }}</span>
            </div>
            <img class="direct-chat-img" src="/dist/img/user3-128x128.jpg" alt="Message User Image">
            <div class="direct-chat-text">
            {{ message.message }}
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['user','messages']
    };
</script>

<style lang="scss">
</style> 