<template>
    <div>
        <div class="restaurant-bg">

            <div class="custom-padding">
                <TheCarousel class="d-none d-md-block" :categorie="categories"></TheCarousel>
            </div>
            
            <div class="d-block d-md-none d-responsive">
            <carousel
                class=""
                :paginationSize="10"
                :perPage="2"
                paginationColor="#272727"
                paginationActiveColor="#dc623d"
                paginationPosition="bottom"
            >
                <slide v-for="category in categories" :key="category.id">
                    <router-link
                                    :to="{
                                        name: 'restaurants.index',
                                        params: { id: category.id },
                                    }"
                                    >
                    <div class="category-item">
                        <div class="overlay">
                            <div class="content">
                                <h2>{{ category.name }}</h2>
                              
                            </div>
                        </div>
                        <img :src="category.image" alt="" />

                    </div>
                </router-link>
                </slide>
            </carousel>
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

    .custom-padding {
        padding-top: 80px;
    }
    .restaurant-bg {
        background-color: #FFCA3A;
    }
    .restaurant-jumbo {
        height: 20vh;
        width: 100%;
        object-fit: contain;
        object-position: center;
    }


    .row {
    max-width: 100%;
}


.d-responsive {
.category-item {
    position: relative;
}
img {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    object-position: center;
    background-position: center;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
}
h2 {
    font-weight: bolder;
}

.content {
    padding: 1.4rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-around;
    color: #fff;
}

p {
    flex-grow: 1;
}

}


</style>
