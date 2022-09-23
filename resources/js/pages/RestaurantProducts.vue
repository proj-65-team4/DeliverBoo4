<template>
    <div>
        <div class="container">
            <h2>Lista prodotti</h2>
            <div v-for="product in products" :key="product.id">{{product.name}}</div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return{
                products: [],
                cart : [],
            }
        },
        methods:{
            fetchData(){
                axios.get("/api/"+this.$route.params.restaurant_id+"/products")
                .then((resp) => {
                    console.log(resp);
                    this.products = resp.data;
                })
            }
        },
        mounted() {
            this.fetchData();
        }
    }
</script>

<style lang="scss" scoped>

</style>