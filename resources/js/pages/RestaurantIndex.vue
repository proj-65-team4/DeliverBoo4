<template>
    <div>
        <div class="container">
            <h2>Categorie</h2>
            <TheCarousel :categorie="categories"></TheCarousel>
        </div>
        <div class="container">
            <h1>Lista Ristoranti:</h1>
        <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_id': restaurant.user_id}}">{{ restaurant.restaurant_name }}</router-link>
            </li>
        </ul>
            </div>
    </div>
</template>

<script>
import axios from 'axios';

import TheCarousel from "../components/TheCarousel";


    export default {
        components:{TheCarousel},
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
                
               
                console.log(Math.random(1,10));
                axios.get("/api/restaurants/"+ this.$route.params.id)
                .then((resp)=> {
                    this.restaurants = resp.data.restaurants;
                    this.categories = resp.data.categories;
                })
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

<style lang="scss"></style>
