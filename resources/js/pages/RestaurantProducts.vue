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
            <div class="row">
                <div class="col"></div>
            </div>

            <div class="row py-4" v-for="restaurant_data in restaurant" :key="restaurant_data.id">
                <div class="col-3">
                    <img
                        :src="'/storage/' + restaurant_data.image"
                        alt=""
                        class="w-100 rounded card-img"
                        v-if="restaurant_data.image"
                    />
                    <img
                        src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png"
                        alt=""
                        class="card-img rounded"
                        v-else
                    />
                </div>
                <div class="col">
<<<<<<< HEAD
                    <h1 class="fw-bold">
                        {{ restaurant_data.restaurant_name }}
                    </h1>
                    <span v-for="category in categories"
                        >{{ category.name }}
                    </span>
                    <h5>{{ restaurant_data.address }}</h5>
                    <h5>{{ restaurant_data.city }}</h5>
=======
                    <h1 class="fw-bold">{{restaurant_data.restaurant_name}}</h1>
                    <span v-for="category in categories" :key="category.id">{{ category.name }} </span>
                    <h5>{{restaurant_data.address}}</h5>
                    <h5>{{restaurant_data.city}}</h5>
>>>>>>> 52a8b3a8169e49965b6bfe7e22ba88c16933d1db
                </div>
                <div class="col-3">
                    <div>
                        <i class="fa-solid fa-truck"></i> Consegna tra 20 - 35
                        min
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div
                    class="accordion-item"
                    v-for="course in courses"
                    :key="course.id"
                >
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            :data-bs-target="'#flush-collapseOne-' + course.id"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            @click="changeID(course.id)"
                        >
                            <span class="fw-bold text-capitalize">{{
                                course.name
                            }}</span>
                        </button>
                    </h2>

                    <div
                        :id="'flush-collapseOne-' + course.id"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample"
                    >
                        <div class="accordion-body">
                            <div class="row mt-4 mb-5">
                                <div
                                    class="col-4"
                                    v-for="(product, index) in filteredProducts"
                                    :key="product.id"
                                >
                                    <!-- Card prodotto -->
                                    <button
                                        type="button"
                                        class="btn w-100"
                                        data-bs-toggle="modal"
                                        :data-bs-target="
                                            '#exampleModal-' + product.id
                                        "
                                    >
                                        <div class="product-card">
                                            <img :src="product.image" alt="" />
                                            <div class="under-image">
                                                <div class="title-price">
                                                    <h5>{{ product.name }}</h5>
                                                    <h5>
                                                        € {{ product.price }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </button>

                                    <!-- Modal -->
                                    <div
                                        class="modal fade"
                                        :id="'exampleModal-' + product.id"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        >
                                            <div class="modal-content">
                                                <!-- Close button -->
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>

                                                <!-- Modal-body -->
                                                <div class="modal-body">
                                                    <img
                                                        :src="product.image"
                                                        alt=""
                                                        class="w-100"
                                                    />
                                                    <h5>{{ product.name }}</h5>
                                                    <h5>
                                                        € {{ product.price }}
                                                    </h5>
                                                    <h5>
                                                        {{
                                                            product.description
                                                        }}
                                                    </h5>

                                                    <!-- Buttons per aumentare/diminuire quantità -->
                                                    <div
                                                        class="d-flex justify-content-evenly"
                                                    >
                                                        <button
                                                            @click="
                                                                addCart(product)
                                                            "
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fa-solid fa-plus"
                                                            ></i>
                                                        </button>
                                                        <div>quantità</div>
                                                        <button
                                                            @click="
                                                                removeCart(
                                                                    product
                                                                )
                                                            "
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fa-solid fa-minus"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                    <!-- 
                                                <!-- Carrello ?? -->
                                                    <div
                                                        class="border-bottom border-dark py-2"
                                                    >
                                                        <div
                                                            v-for="item in cart"
                                                            :key="item.id"
                                                            class="row row-cols-3"
                                                        >
                                                            <div class="col">
                                                                {{ item.name }}
                                                            </div>
                                                            <div
                                                                class="col text-center"
                                                            >
                                                                {{
                                                                    item.quantity
                                                                }}
                                                            </div>
                                                            <div
                                                                class="col text-center"
                                                            >
                                                                €
                                                                {{
                                                                    (
                                                                        item.quantity *
                                                                        parseFloat(
                                                                            item.price
                                                                        )
                                                                    ).toFixed(2)
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal-footer -->
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn"
                                                        data-bs-dismiss="modal"
                                                    >
                                                        Aggiungi
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            restaurant: [],
            categories: [],
            total: 0,
            id: null,
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

.under-image h5 {
    flex-shrink: 0;
}

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
