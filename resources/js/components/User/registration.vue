<template>
    <div>
        <form>
            <div class="mt-3 mb-3 form-group">
                <label for="exampleInputEmail1">Name</label>
                <input v-model="name" type="text" class="form-control"  placeholder="name">
            </div>
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input v-model="email" type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="mb-3 form-group">
                <label for="exampleInputPassword1">Password</label>
                <input v-model="password" type="password" class="form-control"  placeholder="Password">
            </div>
            <div class="mb-3 form-group">
                <label for="exampleInputPassword1">confirm password</label>
                <input v-model="password_confirmation" type="password" class="form-control"  placeholder="confirm password">
            </div>
            <button @click.prevent="storeUser" type="submit" class="btn btn-primary">Registration</button>
        </form>
    </div>
    <div v-if="error" class="text-bg-danger">{{this.error}} </div>
</template>

<script>
import axios from "axios";
import router from "../../router.js";
export default {
    name: "registration",

    data() {
        return {
            name: null,
            email:null,
            password: null,
            password_confirmation: null,
            error: null
        }
    },

    methods: {
        storeUser() {
            axios.post('/api/user', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                }
            )
                .then(response => {
                    localStorage.setItem('access_token', response.data.token)
                    localStorage.setItem('id', response.data.id)
                    this.$router.push({ name: 'user.personal', params: { id: response.data.id }})
                })
                .catch(error=>{
                    this.error = error.response.data.message
                });
        }
    },
}
</script>

<style scoped>

</style>
