<template>
    <div>
        <h1>Lista Categorie:</h1>
        <ul>
            <carousel class="" :paginationEnabled="false">
          
            <slide v-for=" category in categories" :key="category.id">
                <router-link :to="{name:'restaurants.index', params:{id: category.id}}"> {{ category.name }}</router-link>
            </slide>
        </carousel>
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