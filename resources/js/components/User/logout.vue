<template>

</template>

<script>

import apiAxios from "../../XXX.js";

export default {
    name: "logout",

    mounted() {
        this.LogoutUser()
    },

    methods: {
        LogoutUser() {
            apiAxios.post('/api/auth/logout')
                .then(response => {
                    localStorage.removeItem('access_token')
                    localStorage.removeItem('id')
                    this.$router.push({ name: 'user.login'})
                })
                .catch(error=>{
                    console.log(error.response)
                });
        }
    }
}
</script>


<style scoped>

</style>
