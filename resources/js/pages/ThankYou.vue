<template>
    <div>
        <div class="container my-cont">
            <!-- <ul>
                <li v-for="order in orders" :key="order.id">{{ order.customer_name }}</li>
            </ul> -->
            <h2 class="text-center">Grazie abbiamo ricevuto Il tuo ordine e verrà presto processato!</h2>
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
                console.log(this.orders);
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
.my-cont{
    padding: 400px 0;
}
</style>