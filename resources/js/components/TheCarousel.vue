
<template>
    <div>
        <carousel style="padding-bottom: 2.5rem;" class="" :paginationSize=20 :perPage=3 paginationColor="#272727" paginationActiveColor="#dc623d" paginationPosition="bottom" >
        
            <slide v-for=" category in categorie" :key="category.id">
                <TheCategory  :category="category"/>
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
                categoria: 0,
            }
        },
        methods:{

            categorySelected(n){
                debugger
                console.log(n)
                this.$emit("currentCategory", n)
        }
            }
    }

    
</script>

<style lang="scss" scoped>

</style>