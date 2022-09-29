<template>
    <div class="bg-category">
        <h1 class="py-5">Le categorie che amate</h1>

        <TheCarousel
            class="d-none d-md-block"
            :categorie="categories"
        ></TheCarousel>
        <div class="d-block d-md-none container-fluid">
            <div class="row">
                <div
                    class="col-3"
                    v-for="category in categories"
                    :key="category.id"
                >
                    <router-link
                        :to="{
                            name: 'restaurants.index',
                            params: { id: category.id },
                        }"
                    >
                        <div class="bg-white px-2 py-1">fa-solid fa-spaghetti-monster-flying
                            <i :class="{'fa-solid fa-pizza-slice' : category.name === 'Pizza'}"></i>
                            <span class="ms-2">{{category.name}}</span>
                        </div>

                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import TheCarousel from "../components/TheCarousel.vue";

export default {
    data() {
        return {
            categories: [],
        };
    },
    methods: {
        media(x) {
            document.getElementById("jumbotron").style.height = "";
            if (x.matches) {
                console.log(window.matchMedia("(max-width: 460px)").matches);
                document.getElementById("jumbotron").style.minHeight = "250px";
            } else {
                document.getElementById("jumbotron").style.minHeight = "700px";
            }
        },
        fetchData() {
            axios.get("api/categories").then((resp) => {
                this.categories = resp.data;
            });
        },
    },
    mounted() {
        this.fetchData();

        let x = window.matchMedia("(max-width:460px)");
        this.media(x); // Call listener function at run time
        x.addListener(this.media); // Attach listener function on state changes
    },
    components: { TheCarousel },
};
</script>

<style lang="scss" scoped>
.bg-category {
    background: #ffca3a;
    padding-bottom: 3rem;

    h1 {
        font-weight: bolder;
        font-size: 4.5rem;
        text-align: center;
        max-width: 15ch;
        text-align: center;
        color: rgb(30, 29, 29);
        margin: 0 auto;
    }
}

@media only screen and (max-width: 460px) {
    .bg-category h1 {
        font-size: 2.7rem;
    }
}

.row {
    max-width: 100%;
}

img {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    object-position: center;
    background-position:  center;
}

a {
    text-decoration: none;
    color: #000;
    transition: color 0.3s ease;

    &:hover {
        color: rgb(5, 35, 60);
        transition: color 0.3s ease;
        
    }
}


</style>
