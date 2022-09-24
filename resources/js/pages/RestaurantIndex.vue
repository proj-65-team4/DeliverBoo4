<template>
    <div>
        <div class="container">
            <h2>Categorie</h2>
            <TheCarousel :categorie="categories"></TheCarousel>
        </div>
        <div class="container">
            <h1>Lista Ristoranti:</h1>
            <template v-if="!loaded">
                <div class="row py-2">
                    <div class="col">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </template>
            <RestaurantCard
                v-else
                v-for="restaurant in fetchCat"
                :key="restaurant.id"
                :restaurant="restaurant"
            ></RestaurantCard>
        </div>
    </div>
</template>

<script>
import axios from "axios";

import TheCarousel from "../components/TheCarousel";
import RestaurantCard from "../components/RestaurantCard.vue";

export default {
    components: { TheCarousel, RestaurantCard },
    data() {
        return {
            restaurants: [],
            categories: [],
            currentCat: null,
            loaded: false,
            data: null,
        };
    },
    methods: {
        media(x) {
            document.getElementById("jumbotron").style.height = "";
            if (x.matches) {
                console.log(window.matchMedia("(max-width: 460px)").matches);
                document.getElementById("jumbotron").style.minHeight = "250px";
            } else {
                document.getElementById("jumbotron").style.minHeight = "350px";
            }
        },
        
    },
    computed: {
        fetchCat() {
            if(this.currentCat!=this.$route.params.id){
                this.loaded= false
                this.currentCat = parseInt(this.$route.params.id);
                axios
                .get("/api/restaurants/" +this.currentCat)
                .then((resp) => {
                    this.restaurants = resp.data.restaurants;
                    this.categories = resp.data.categories;
                });
                setTimeout(() => {
                    this.loaded = true
                }, 2000);
                
                    }
                return this.restaurants;
        },
    },
    mounted() {
        this.fetchCat();
        let x = window.matchMedia("(max-width:460px)");
        this.media(x); // Call listener function at run time
        x.addListener(this.media); // Attach listener function on state changes
    },
};
</script>

<style lang="scss"></style>
