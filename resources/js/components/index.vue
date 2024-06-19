<template>
    <div>
        <router-link :to="{ name: 'fruit.index'}"> fruit</router-link>
        <router-link v-if="!accessToken" :to="{ name: 'user.login'}"> | login</router-link>
        <router-link v-if="!accessToken" :to="{ name: 'user.registration'}"> | registration</router-link>
        <router-link v-if="accessToken" :to="{ name: 'user.personal', params: { id: this.id }}"> | personal</router-link>
        <router-link v-if="accessToken" :to="{ name: 'user.logout'}"> | Logout </router-link>
        <router-view :key="$route.fullPath"></router-view>
    </div>

</template>

<script>
export default {
    name: "index",

    data() {
        return {
            accessToken: null,
            id: null
        }
    },

    mounted() {
        this.getData()

    },

    updated() {
        this.getData()
    },

    methods: {
        getData() {
            this.accessToken = localStorage.getItem('access_token')
            this.id = localStorage.getItem('id')
        },
    },
}
</script>

<style scoped>

</style>
