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

        media(x){
                document.getElementById("jumbotron").style.height=""
                if(x.matches){
                    console.log((window.matchMedia('(max-width: 460px)')).matches)
                    document.getElementById("jumbotron").style.height="250px"
                }else{
                    document.getElementById("jumbotron").style.height="600px"
                }
        },
        fetchData() {
             
               
            axios.get("api/categories")
                .then((resp) => {
                this.categories = resp.data;
            });
        }
    },
    mounted() {
        this.fetchData();

        let x = window.matchMedia("(max-width:460px)")
this.media(x) // Call listener function at run time
x.addListener(this.media) // Attach listener function on state changes
    },
    components: { TheCategory }
}

</script>

</style>