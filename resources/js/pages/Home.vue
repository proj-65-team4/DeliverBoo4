<template>
    <div class="bg-category">
   

            <h1 class="py-5">Le categorie che amate</h1>
 
           <TheCarousel :categorie="categories"></TheCarousel>

           
    </div>
</template>

<script>
import axios from 'axios';
import TheCarousel from '../components/TheCarousel.vue';

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
                    document.getElementById("jumbotron").style.minHeight="250px"
                }else{
                    document.getElementById("jumbotron").style.minHeight="700px"
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
    components: { TheCarousel }
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