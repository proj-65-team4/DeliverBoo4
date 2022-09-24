<template>
    <div>
        <div class="container">
            <h2>Lista prodotti</h2>
            <button @click="checkout()" class="btn btn-primary">
                Procedi al pagamento
            </button>
            <div v-if="cart.length === 0">Il tuo carrello è vuoto</div>
            <div v-else>contenuto carrello {{cart}}
                <div class="bg-secondary">Il totale da pagare è {{total}}€</div>
            </div>


            <div class="row">
                <div
                    class="col-12 border p-4"
                    v-for="(product, index) in products"
                    :key="product.id"
                >
                    {{ product.name }} {{product.price}}
                    <div class="d-flex my-4 g-4">
                        <button @click="removeCart(index)">remove -</button>

                        <div>qnt. {{ product.quantity }}</div>
                        <button @click="addCart(index)">add +</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            products: [],
            cart: [],
            total : 0,

        };
    },
    computed:{
fetchData() {
            axios
                .get("/api/" + this.$route.params.restaurant_id + "/products")
                .then((resp) => {
                    console.log(resp);
                    this.products = resp.data;
                });
        },
    },
    methods: {
        
 

        removeCart(index) {
            const item = this.cart.find(product => product.id === this.products[index].id);
            if(item !== undefined && item.quantity!==0 ){
            item.quantity--;
            if(item.quantity === 0) 
            {
                const eliminaIndice = this.cart.findIndex(product => product.id === this.products[index].id);
                this.cart.splice(eliminaIndice , 1);
            }
        }
        },
        addCart(index) {
            const item = this.cart.find(product => product.id === this.products[index].id);
            if(item === undefined)
            this.cart.push(
                {
                ...this.products[index],
                quantity : 1,
                }
                );
            else 
            item.quantity++;
        },


        // checkout() {
        //     this.cart = [];
        //     this.total = 0 ;
        //     this.products.forEach((element) => {
        //         if (element.quantity > 0) {
        //             console.log(element.name, element.quantity , element.price);
        //             this.cart.push({
        //                 name: element.name,
        //                 quantity: element.quantity,
        //             });
        //             this.total += element.price * element.quantity;
        //             this.total = Math.round(this.total);
        //         }
        //     });
        // },
    },
    mounted() {
        this.fetchData();
    },
};
</script>

<style lang="scss" scoped></style>
