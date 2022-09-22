<template>
    <div>
        <h1>Lista Ristoranti:</h1>
        <ul>
            <li v-for=" restaurant in restaurants" :key="restaurant.id">
            <span>{{ restaurant.restaurant_name }}</span>
                <!-- <router-link :to="{name:'restaurant.index', params:{id: category.id}}"> {{ category.name }}</router-link> -->
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                restaurants: [],
            }
        },
        methods: {

            fetchData() {
                axios.get("/api/restaurants/"+ this.$route.params.id)
                .then((resp)=> {
                    this.restaurants = resp.data
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