<template>
    <div>
        <div class="container">
            <!-- PROVA CARRELLO IN PAGINA! -->
            <!-- <div v-if="cart.length === 0">Il tuo carrello è vuoto</div>
            <div class="row flex-column" v-else>
                <div
                    class="col-3 card my-2"
                    v-for="item in cart"
                    :key="item.id + item.name"
                >
                    <img :src="item.image" alt="" style="width: 250px" />
                    <span>Prodotto aggiunto: {{ item.name }}</span>
                    <span>Quantità: {{ item.quantity }}</span>
                    <span> Prezzo: {{ (item.price * item.quantity).toFixed(2) }}</span>
                </div>
            </div> -->
            <!-- :key="restaurant_data.id" -->
            <div class="row py-4 my-4 text-capitalize" v-for="restaurant_data in restaurant" :key="restaurant_data.id">
                <div class="col-3">
                    <img
                        :src="'/storage/' + restaurant_data.image"
                        alt=""
                        class="w-100 rounded card-img"
                        v-if="restaurant_data.image"
                    />
                    <img v-else src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png" alt="" class="card-img rounded"/>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="fw-bold">
                                {{ restaurant_data.restaurant_name }}
                            </h1>
                        </div>
                            <div class="col">
                                <span v-for="category in categories">
                                    <div class="d-inline me-3 fw-bold">
                                        <router-link :to="{ path: '/restaurants/' + category.id }"> {{ category.name }} </router-link>
                                    </div>
                                </span>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <i class="fa-solid fa-location-dot icon-color"></i>
                                    <h6 class="my-3 d-inline icon-color ">{{ restaurant_data.address }}, {{ restaurant_data.city }}</h6>
                                </div>
                                <div>
                                    <i class="fa-solid fa-truck icon-color"></i>
                                    <h6 class="my-3 d-inline icon-color ">Consegna tra 20 - 35 min</h6>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample" v-if="!products.length == 0">
                <div
                    class="accordion-item"
                    v-for="course in courses"
                    :key="course.id"
                >
                    <!-- HEADER ACCORDION --> 
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            :data-bs-target="'#flush-collapseOne-' + course.id"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            @click="changeID(course.id)">

                            <span class="fw-bold text-capitalize">{{
                                course.name
                            }}</span>
                        </button>
                    </h2>

                    <!-- BODY ACCORDION --> 
                    <div
                        :id="'flush-collapseOne-' + course.id"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">

                        <div class="accordion-body">
                            <div class="row mt-4 mb-5">
                                <div
                                    class="col-12 my-col col-md-4 col-lg-4"
                                    v-for="(product) in filteredProducts"
                                    :key="product.id">

                                    <!-- Card prodotto -->
                                    <button type="button" class="btn my-btn modal-btn">
                                        <div class="product-card">
                                            <img :src="product.image ? product.image : '/img/food-placeholder.jpeg' " alt="" />
                                            <div class="under-image">
                                                <div class="title-price">
                                                    <h5>{{ product.name }}</h5>
                                                    <span>{{ product.description }}</span>
                                                    <h5>
                                                        € {{ product.price }}
                                                    </h5>
                                                </div>
                                                <!-- Buttons per aumentare/diminuire quantità -->
                                                <div class="row row-cols-3 justify-content-evenly my-2">
                                                    <button @click="removeCart(product)" class="btn btn-primary">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    
                                                    <!-- <div v-for="item in cart" :key="item.id" class="">
                                                        <div class="col text-center">{{ item.quantity}}</div>
                                                    </div> -->

                                                    <button @click="addCart(product)" class="btn btn-primary">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </button>

                                    <!-- @click="openModal(product)" -->
                                    <!-- Modal -->
                                    <div v-if="open" class="my-modal" :id="'myModal' + modalProduct.id" >
                                            <div class="my-modal-content">
                                                <!-- Close button -->
                                                <button type="button" class="btn-close" @click="open = false"></button>
                                                
                                                <!-- Modal-body -->
                                                <div class="">
                                                    <img :src="modalProduct.image" alt="" class="w-50 rounded"/>
                                                    <h4 class="fw-bold m-0 py-4">{{ modalProduct.name }}</h4>
                                                    <h5>{{ modalProduct.description }}</h5>
                                                    <h5>€ {{ modalProduct.price }}</h5>
                                                    
                                                    <!-- DATI Carrello -->
                                                    <div class="border-bottom border-dark py-2">
                                                        
                                                        <div v-for="item in cart" :key="item.id" class="row row-cols-3">
                                                        <div class="col">{{ item.name }}</div>
                                                        <div class="col text-center">{{ item.quantity }}</div>
                                                        <div class="col text-center">€ {{
                                                            (
                                                                item.quantity * parseFloat(item.price)
                                                            ).toFixed(2)
                                                        }}</div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- Modal-footer -->
                                                <div class="">
                                                    <button type="button" class="btn btn-primary">Aggiungi</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="text-center mb-5">
                <i class="fa-solid fa-face-grin-beam-sweat fa-xl"></i>
                <h5 class="d-inline">Ops! Ancora non ci sono prodotti inseriti, riprova tra qualche giorno!</h5>
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
            restaurant: [],
            categories: [],
            total: 0,
            id: null,
            open: false,
            modalProduct: [],
        };
    },
    computed: {
        fetchData() {
            axios
                .get("/api/" + this.$route.params.restaurant_slug + "/products")
                .then((resp) => {
                    this.products = resp.data.products;
                    this.courses = resp.data.courses;
                    this.restaurant = resp.data.restaurant;
                    this.categories = resp.data.categories;
                });
        },
        filteredProducts() {
            return this.products.filter((el) => {
                return el.product_course_id == this.id ? el : "";
            });
        },
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
        removeCart(product) {
            console.log(product);
            const item = this.cart.find(
                (product) => product.id === product.id
            );
            if (item !== undefined && item.quantity !== 0) {
                item.quantity--;
                this.count--
                if (item.quantity === 0) {
                    const eliminaIndice = this.cart.findIndex(
                        (product) => product.id === product.id
                    );
                    this.cart.splice(eliminaIndice, 1);
                    console.log(product);
                }
            }
        },
        addCart(prodotto) {
            const item = this.cart.find(
                (product) => product.id === prodotto.id
            );

            if (item === undefined) {
                if (
                    this.cart.find(
                        (product) => product.user_id == prodotto.user_id
                    ) ||
                    localStorage.cart === undefined ||
                    JSON.parse(localStorage.cart).length === 0
                ) {
                    this.cart.push({
                        ...prodotto,
                        quantity: 1,
                    });
                } else {
                    alert("Aggiunta non valida");
                }
            } else item.quantity++;
        },
        changeID(id) {
            this.id = id;
        },
        openModal(prod) {
            this.open = true
            this.modalProduct = prod
        }
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

    a {
        text-decoration: none;
        color: black;
        padding: 0.5rem 0;
        transition: all 0.15s ease-out;
        &:hover {
            color: rgb(40, 191, 214);
        }
    }
.icon-color {
    color: rgb(40, 191, 214);
}
.modal-btn {
    border: none;
    &:hover {
        border: none;
    }
}
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

    &:hover {
        box-shadow: rgba(0, 0, 0, 0.4) 0px 5px 15px;
    }
}

.product-card img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    object-position: center;
    flex-shrink: 0;
}


.title-price {
    padding: 12px 12px 0px 12px;
}

.under-image {
    width: 100%;
}

/* .under-image h5 {
    flex-shrink: 0;
} */

.accordion-button:focus {
    z-index: 3;
    border-color: #fff;
    outline: 0;
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    color: black;
    background-color: #fff;
    box-shadow: inset 0 calc(var(--bs-accordion-border-width) * -1) 0
        var(--bs-accordion-border-color);
}

.card-img {
    max-width: 100%;
    max-height: 150px;
    object-fit: cover;
}

.my-modal {
    position: fixed;
    z-index: 999;
    top: 10%;
    left: 45%;
    width: 600px;
    margin-left: -150px;
    background-color: white;
    padding: 1rem;
    border-radius: 30px;
    height: 600px;
}

.category-btn {
    color: #eee;
    padding: 15px 25px;
    text-decoration: none;
}

.my-btn:hover {
    color: var(--bs-btn-hover-color);
    background-color: var(--bs-btn-hover-bg);
    border-color: white;

}

@media only screen and (max-width: 1200px) {
    .product-card {
        width: 100%;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
    }

    .product-card img {
        width: 100%;
    }
}

@media only screen and (max-width: 768px) {
    .product-card{
        width: 80%;
        margin: 0 calc((476px - 360px) / 2);
    }
}

@media only screen and (max-width: 468px) {
    .product-card {
        width: 100%;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        margin-left: 0;
    }
    .product-card img {
        width: 100%;
        height: 210px;
    }

    .under-image {
        position: relative;
        height: 50px;
    }

    .title-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 12px 0px 12px;
    }
}
</style>