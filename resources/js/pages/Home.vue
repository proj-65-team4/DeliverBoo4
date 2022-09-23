<template>
    <div class="bg-category">
   

            <h1 class="py-5">Le categorie che amate</h1>
 
           
  
        

            <carousel class="" :paginationSize=20 :perPage=3 paginationColor="#272727" paginationActiveColor="#dc623d" paginationPosition="bottom" >
          
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
</style>