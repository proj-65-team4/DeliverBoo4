<template>
    <div class="bg-category">
        <h1 class="py-5">Le categorie che amate</h1>

        <TheCarousel
            class="d-none d-md-block"
            :categorie="categories"
        ></TheCarousel>
        <div class="d-block d-md-none">
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
        <span href="#" data-bs-toggle="tooltip" data-bs-placement="top" :title="cat.name">{{ cat.name }}</span>
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
                console.log(window.matchMedia("(max-width: 468px)").matches);
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

        let x = window.matchMedia("(max-width:468px)");
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

@media only screen and (max-width: 468px) {
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
    background-position: center;
}

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
</style>
