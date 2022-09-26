<template>
    <div>
        <div class="container">
            <h2 class="mt-5">Lista prodotti</h2>
            <div v-if="cart.length === 0">Il tuo carrello è vuoto</div>
            <div class="row" v-else>
                contenuto carrello
                <div
                    class="col-3 border"
                    v-for="item in cart"
                    :key="item.id + item.name"
                >
                    <img :src="item.image" alt="" style="width: 250px" />
                    <h1>{{ item.name }}</h1>
                    <h1>{{ item.quantity }}</h1>
                    <h2>{{ (item.price * item.quantity).toFixed(2) }}</h2>
                </div>
            </div>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item" v-for="course in courses" :key="course.id">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            {{course.name}}
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Placeholder content for this accordion, which is
                            intended to demonstrate the
                            <code>.accordion-flush</code> class. This is the
                            first item's accordion body.
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div
                    class="col-sm-12 col-md-4"
                    v-for="(product, index) in products"
                    :key="product.id"
                >
                    <div class="product-card">
                        <img :src="product.image" alt="" />

                        <div class="under-image">
                            <div class="title-price">
                                <h5>{{ product.name }}</h5>
                                <h5>€ {{ product.price }}</h5>
                            </div>

                            <h6 class="ps-3">{{ product.description }}</h6>

                            <div class="cart-btn">
                                <div>
                                    <span>Aggiungi al carrello</span>
                                    <i class="fa-solid fa-hand-point-right"></i>
                                </div>
                                <div>quantità</div>
                                <div class="d-flex flex-column">
                                    <button @click="addCart(index)" class="btn">
                                        <i class="fa-solid fa-chevron-up"></i>
                                    </button>
                                    <button
                                        @click="removeCart(index)"
                                        class="btn"
                                    >
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
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
            courses: [],
            cart: [],
            total: 0,
            /* selectedCategory: null */
        };
    },
    computed: {
        fetchData() {
            axios
                .get("/api/" + this.$route.params.restaurant_id + "/products")
                .then((resp) => {
                    console.log(resp.data);
                    this.products = resp.data.products;
                    this.courses = resp.data.courses;
                });
        },
        /* filteredProducts(){
            return this.products.filter((product)=>{
                return product.product_course.filter((category)=>{
                    return category.id === this.selectedCategory;
                }).length > 0;
            })
        } */
    },
    watch: {
        cart: {
            handler(product) {
                localStorage.cart = JSON.stringify(product);
            },
            deep: true,
        },
    },
    methods: {
        /* selectedCat(id){
            this.selectedCategory = id;
        }, */
        removeCart(index) {
            const item = this.cart.find(
                (product) => product.id === this.products[index].id
            );
            if (item !== undefined && item.quantity !== 0) {
                item.quantity--;
                if (item.quantity === 0) {
                    const eliminaIndice = this.cart.findIndex(
                        (product) => product.id === this.products[index].id
                    );
                    this.cart.splice(eliminaIndice, 1);
                }
            }
        },
        addCart(index) {
            const item = this.cart.find(
                (product) => product.id === this.products[index].id
            );
            if (item === undefined)
                this.cart.push({
                    ...this.products[index],
                    quantity: 1,
                });
            else item.quantity++;
        },
    },
    mounted() {
        if (localStorage.cart) {
            this.cart = JSON.parse(localStorage.cart);
        }
        this.fetchData();
    },
};
</script>

<style lang="scss" scoped>
/* .category {
    width: 100%;
    height: 30px;
    border: 1px solid rgb(27, 27, 27);
    font-weight: 700;
    font-size: 20px;
    text-align: center;
    margin-bottom: 1rem;
    cursor: pointer;
} */
.cart-btn {
    background-color: #3dd9bc;
    width: 100%;
    font-weight: 700;
    display: flex;
    position: absolute;
    bottom: 0;
    align-items: center;
    justify-content: space-between;
    padding: 0 0.5rem;
    margin-top: 1rem;
    color: #fff;
    & i {
        color: #fff;
    }
}
.product-card {
    width: 100%;
    display: flex;
    margin-bottom: 2rem;
    flex-direction: row;
    border-radius: 5px;
    box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);
}

.product-card img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    object-position: center;
    flex-shrink: 0;
}

.product-card h6 {
    display: none;
}

.title-price {
    padding: 12px 12px 0px 12px;
}

.under-image {
    position: relative;
    width: 100%;
}

@media only screen and (max-width: 460px) {
    .product-card {
        width: 100%;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
    }
    .product-card img {
        width: 100%;
        height: 210px;
    }

    .product-card h6 {
        display: inline-block;
    }

    .under-image {
        position: relative;
        height: 180px;
    }

    .title-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 12px 0px 12px;
    }
}
</style>
