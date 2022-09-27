<template>
    <div>
        <div class="container">
            <ul>
                <li v-for="order in orders" :key="order.id">{{ order.customer_name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import Axios from 'axios'
export default {
    data(){
        return{
            orders:[]
        }
    },
    computed:{
        getOrder(){
            Axios.get("/api/thanks")
            .then(resp=>{
                this.orders = resp.data;
            })
            return this.orders;
        }
    },
    mounted(){
        this.getOrder();
    }
}
</script>

<style lang="scss" scoped>

</style>