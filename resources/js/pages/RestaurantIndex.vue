<template>
    <div>
        <div class="container">
            <h2>Categorie</h2>
            <TheCarousel :categorie="categories"></TheCarousel>
        </div>
        <div class="container">
            <h1>Lista Ristoranti:</h1>

            <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant"></RestaurantCard>
        
        </div>
    </div>
</template>

<script>
import axios from 'axios';

import TheCarousel from "../components/TheCarousel";
import RestaurantCard from '../components/RestaurantCard.vue';


    export default {
        components:{ TheCarousel, RestaurantCard },
        data() {
            return {
                restaurants: [],
                categories:[]
            }
        },
        methods: {
        media(x){
                document.getElementById("jumbotron").style.height=""
                if(x.matches){
                    console.log((window.matchMedia('(max-width: 460px)')).matches)
                    document.getElementById("jumbotron").style.minHeight="250px"
                }else{
                    document.getElementById("jumbotron").style.minHeight="350px"
                }
        },
        fetchData() {
            axios.get("/api/restaurants/"+ this.$route.params.id)
            .then((resp)=> {
                this.restaurants = resp.data.restaurants;
                this.categories = resp.data.categories;
            })
        }
        },
        mounted() {
        this.fetchData();
        let x = window.matchMedia("(max-width:460px)");
        this.media(x); // Call listener function at run time
        x.addListener(this.media); // Attach listener function on state changes
    }
    }
</script>

<style lang="scss">
    
</style>
