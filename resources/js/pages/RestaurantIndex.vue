<template>
    <div>
        <div class="restaurant-bg">
            <div class="container">
                <TheCarousel :categorie="categories"></TheCarousel>
            </div>
        </div>
        <div class="container my-5">
            <template v-for="category in categories">
                <div v-if="category.id == currentCat" class="text-center">
                    <h5 class="">I migliori ristoranti della categoria</h5>
                    <h3 class="fw-bold pb-3">{{ category.name }}</h3>
                </div>
            </template>
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

<style lang="scss">
    .restaurant-bg {
        background-color: #FFCA3A;
    }
    .restaurant-jumbo {
        height: 20vh;
        width: 100%;
        object-fit: contain;
        object-position: center;
    }

</style>
