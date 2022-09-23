<template>
    <div>
        <div class="container">
            <h2>Lista prodotti</h2>
            <div class="row">
                <div
                    class="col-12 border p-4"
                    v-for="(product, index) in products"
                    :key="product.id"
                >
                    {{ product.name }}
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
        };
    },
    methods: {
        fetchData() {
            axios
                .get("/api/" + this.$route.params.restaurant_id + "/products")
                .then((resp) => {
                    console.log(resp);
                    this.products = resp.data;
                });
        },
        removeCart(index) {
            if (this.products[index].quantity !== 0)
                this.products[index].quantity--;
        },
        addCart(index) {
            this.products[index].quantity++;
        },
    },
    mounted() {
        this.fetchData();
    },
};
</script>

<style lang="scss" scoped></style>
