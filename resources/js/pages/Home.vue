<template>
    <div>
        <h1>Lista Categorie:</h1>
        <ul>
            <carousel class="" :paginationSize=15 :perPage=4>
          
            <slide v-for=" category in categories" :key="category.id">
                <router-link :to="{name:'restaurants.index', params:{id: category.id}}"><TheCategory :category="category"/></router-link>
            </slide>
        </carousel>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
import TheCategory from '../components/TheCategory.vue';

    export default {
    data() {
        return {
            categories: [],
        };
    },
    methods: {
        fetchData() {
            console.log(this.$route.name);
            axios.get("api/categories")
                .then((resp) => {
                this.categories = resp.data;
            });
            console.log(this.categories);
        }
    },
    mounted() {
        this.fetchData();
    },
    components: { TheCategory }
}

</script>

<style lang="scss" scoped>

</style>