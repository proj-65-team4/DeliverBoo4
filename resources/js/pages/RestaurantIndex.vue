<template>
    <div>
        <div class="container">
            <h1>Lista Ristoranti:</h1>
        
            <ul>
                <li v-for=" restaurant in restaurants" :key="restaurant.id">
                <span>{{ restaurant.restaurant_name }}</span>
                    <!-- <router-link :to="{name:'restaurant.index', params:{id: category.id}}"> {{ category.name }}</router-link> -->
                </li>
            </ul>

            <template>
                <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant"
                ></RestaurantCard>
            </template>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import RestaurantCard from '../components/RestaurantCard.vue';

    export default {
    data() {
        return {
            restaurants: [],
        };
    },
    methods: {
        media(x) {
            document.getElementById("jumbotron").style.height = "";
            if (x.matches) {
                console.log((window.matchMedia("(max-width: 460px)")).matches);
                document.getElementById("jumbotron").style.minHeight = "250px";
            }
            else {
                document.getElementById("jumbotron").style.minHeight = "350px";
            }
        },
        fetchData() {
            console.log(Math.random(1, 10));
            axios.get("/api/restaurants/" + this.$route.params.id)
                .then((resp) => {
                this.restaurants = resp.data;
            });
        }
    },
    mounted() {
        this.fetchData();
        let x = window.matchMedia("(max-width:460px)");
        this.media(x); // Call listener function at run time
        x.addListener(this.media); // Attach listener function on state changes
    },
    components: { RestaurantCard }
}
</script>

<style lang="scss" >


</style>