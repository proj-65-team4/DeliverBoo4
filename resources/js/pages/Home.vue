<template>
    <div class="bg-category">
   

            <h1 class="py-5">Le categorie che amate</h1>
 
           
  
        

            <carousel class="" :paginationSize=15 :perPage=3 paginationColor="#333" paginationActiveColor="#dc623d" >
          
            <slide v-for=" category in categories" :key="category.id">
                <TheCategory :category="category"/>
            </slide>
        </carousel>
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
.bg-category {
background: #FFCA3A;
text-align: center;
padding-bottom: 3rem;

h1 {
    font-weight: bolder;
    font-size: 4.5rem;
    max-width: 15ch;
    text-align: center;
    color: #131212;
    margin: 0 auto;
}
}
</style>