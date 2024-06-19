<template>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="fruit in fruits">
                <th scope="row">{{ fruit.id }}</th>
                <td>{{ fruit.name }}</td>
                <td>{{ fruit.price }}</td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import  apiAxios  from '../../XXX.js'

export default {
    name: "indexFruit",

    data() {
        return {
            fruits: null,
        }
    },

    mounted() {
        this.getFruits()
    },

    methods: {
        getFruits() {
            apiAxios.get('/api/auth/fruit')
                .then(response =>
                {
                    return this.fruits = response.data.data
                })
                .catch(error => {
                    return console.log(error)
                })
        },

    }
}
</script>

<style scoped>

</style>
