
<template>
    <div>
         <carousel class="" :paginationSize=20 :perPage=3 paginationColor="#272727" paginationActiveColor="#dc623d" paginationPosition="bottom" >
          
            <slide v-for=" category in categorie" :key="category.id">
                <TheCategory :category="category"/>
            </slide>
        </carousel>
    </div>
</template>

<script>
import TheCategory from '../components/TheCategory.vue';
    export default {
        name:"TheCarousel",
        components:{TheCategory},
        props:{
            categorie: Array
        },
        data(){
            return{
                
            }
        },
    }
    
</script>

<style lang="scss" scoped>

</style>