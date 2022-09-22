<template>
    <div>
        <h1>Lista Ristoranti:</h1>
        <ul>
            <li v-for=" category in categories" :key="category">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                categories: [],
            }
        },
        methods: {
            fetchData() {
                axios.get("api/categories")
                .then((resp)=> {
                    this.categories = resp.data
                })
                console.log(this.categories)
            }
        },
        mounted() {
            this.fetchData();
        }
    }

</script>

<style lang="scss" scoped>

</style>