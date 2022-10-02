<template>
  <div>
    <div class="container my-cont">
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
          <button type="button" class="btn login" @click="goBack()">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="fw-bold">Tutti i ristoranti</span>
          </button>
      <div
        class="row py-4 my-4 text-capitalize"
        v-for="restaurant_data in restaurant"
        :key="restaurant_data.id"
      >
        <div class="col-sm-12 col-md-3">
          <img
            :src="'/storage/' + restaurant_data.image"
            alt=""
            class="w-100 rounded card-img"
            v-if="restaurant_data.image"
          />
          <img
            v-else
            src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png"
            alt=""
            class="card-img rounded"
          />
        </div>
        <div class="col">
          <div class="row">
            <div class="col-12 rest-name">
              <h1 class="fw-bold">
                {{ restaurant_data.restaurant_name }}
              </h1>
            </div>
            <div class="col-sm-12 col-md-6 cat-name">
              <span v-for="category in categories" :key="category.id">
                <div class="d-inline me-3 fw-bold">
                  <router-link :to="{ path: '/restaurants/' + category.id }">
                    {{ category.name }}
                  </router-link>
                </div>
              </span>
            </div>
            <div class="col-sm-12 col-md-6 rest-address">
              <div class="mb-2">
                <i class="fa-solid fa-location-dot icon-color"></i>
                <h6 class="my-3 d-inline icon-color">
                  {{ restaurant_data.address }}, {{ restaurant_data.city }}
                </h6>
              </div>
              <div>
                <i class="fa-solid fa-truck icon-color"></i>
                <h6 class="my-3 d-inline icon-color">
                  Consegna tra 20 - 35 min
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- banner added product -->

      <div v-if="addedProduct" class="d-flex added-product">
        <i class="fa-regular fa-circle-check fs-1 text-white"></i>
        <span class="text-white fs-2 text-center mt-2">Prodotto aggiunto</span>
      </div>

      <!-- banner removed product -->
      <div v-if="removedProduct" class="d-flex removed-product">
        <i class="fa-solid fa-ban fs-1 text-white"></i>
        <span class="text-white fs-2 text-center mt-2">Prodotto eliminato</span>
      </div>

      <!-- loaded products -->
      <template v-if="!loaded">
        <div class="row py-2">
          <div class="col text-center">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
      </template>
      <template v-else>
        <div
          class="accordion accordion-flush"
          id="accordionFlushExample"
          v-if="!products.length == 0"
        >
          <div
            class="accordion-item"
            v-for="course in courses"
            :key="course.id"
          >
            <!-- HEADER ACCORDION -->
            <h2 class="accordion-header" id="flush-headingOne">
              <button
                class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                :data-bs-target="'#flush-collapseOne-' + course.id"
                aria-expanded="true"
                aria-controls="flush-collapseOne"
                @click="changeID(course.id)"
              >
                <span class="fw-bold text-capitalize">{{ course.name }}</span>
              </button>
            </h2>

            <!-- BODY ACCORDION -->
            <div
              :id="'flush-collapseOne-' + course.id"
              class="accordion-collapse collapse show"
              aria-labelledby="flush-headingOne"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <div class="row mt-4 mb-5">
                  <div
                    class="col-12 my-col col-md-4 col-lg-4"
                    v-for="product in filteredProducts(course.id)"
                    :key="product.id">
                    <!-- Card prodotto -->
                    <div class="product-card">
                      <img :src="product.image ? product.image : '/img/food-placeholder.jpeg'" alt="" />
                      <div class="under-image">
                        <div class="title-price">
                          <h5>{{ product.name }}</h5>

                          <h5 id="price">€ {{ product.price }}</h5>
                          
                          <!-- Icone Categoria Prodotto -->
                          <div class="">
                            <span v-for="cat in product.product_categories" :key="cat.id"  href="#" data-bs-toggle="tooltip" data-bs-placement="top" :title="cat.name" data-bs-delay="0" class="category-icon">
                              <img :src=" cat.icon" alt="">
                            </span>
                          </div>

                        </div>
                        <!-- Disponibilità -->
                        <div class="disp">
                          <div v-if="product.available === 1">
                              <i class="fa-solid fa-circle-check text-success"></i>
                              <span class="text-muted">Disponibile</span>
                            </div>
                            <div v-else>
                              <i class="fa-solid fa-circle-xmark text-danger"></i>
                              <span class="text-muted">Non disponibile</span>
                            </div>
                        </div>
                            
                        <!-- Buttons per aumentare/diminuire quantità -->
                        <div class="cart-btn">
                          <button @click="removeCart(product)" class="">
                            <i class="fa-solid fa-minus"></i>
                          </button>

                          <div class="d-flex flex-column quantity">
                            <div
                              v-for="item in cart"
                              :key="item.id"
                              class="m-0 p-0"
                            >
                              <div v-if="product.id == item.id">
                                <div class="m-0 p-0 number">
                                  <span class="fs-4">{{ item.quantity }}</span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <button @click="addCart(product)" class="">
                            <i class="fa-solid fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Fine Card -->
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-else class="text-center mb-5">
          <i class="fa-solid fa-face-grin-beam-sweat fa-xl"></i>
          <h5 class="d-inline">
            Ops! Ancora non ci sono prodotti inseriti, riprova tra qualche
            giorno!
          </h5>
        </div>
      </template>

      <!-- The Modal -->
      <div id="myModal" class="myModal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>
            Hai già dei prodotti nel carrello di un altro ristorante, se vuoi
            ordinare svuota il carrello
          </p>
          <button @click="emptyCart()" class="btn btn-danger">
            Svuota carrello <i class="fa-solid fa-trash"></i>
          </button>
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
      productCategory: [],
      total: 0,
      loaded: false,
      addedProduct: false,
      removedProduct: false,
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
          this.productCategory = resp.data.productCategory;
          setTimeout(() => {
            this.loaded = true;
          }, 2000);
          console.log(resp.data);
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
    filteredProducts(id) {
      console.log(id);

      return this.products.filter((el) => {
        return el.product_course_id == id ? el : "";
      });
    },
    removeCart(prodotto) {
      console.log(prodotto);
      const item = this.cart.find((product) => product.id === prodotto.id);
      console.log(item);
      if (item !== undefined && item.quantity !== 0) {
        item.quantity--;
        this.count--;
        this.removedProduct = true;
        setTimeout(() => {
          this.removedProduct = false;
        }, 1000);
        if (item.quantity === 0) {
          const eliminaIndice = this.cart.findIndex(
            (product) => product.id === prodotto.id
          );
          this.cart.splice(eliminaIndice, 1);
        }
      }
    },

    addCart(prodotto) {
      const item = this.cart.find((product) => product.id === prodotto.id);

      if (item === undefined) {
        if (
          this.cart.find((product) => product.user_id == prodotto.user_id) ||
          localStorage.cart === undefined ||
          JSON.parse(localStorage.cart).length === 0
        ) {
          this.addedProduct = true;
          setTimeout(() => {
            this.addedProduct = false;
          }, 1000);
          this.cart.push({
            ...prodotto,
            quantity: 1,
          });
        } else {
          const modalAlert = document.getElementById("myModal");
          modalAlert.style.display = "block";
          const span = document.getElementsByClassName("close")[0];
          span.addEventListener("click", function () {
            modalAlert.style.display = "none";
          });
        }
      } else{
          item.quantity++;
           this.addedProduct = true;
          setTimeout(() => {
            this.addedProduct = false;
          }, 1000);
          } 
          
    },
    changeID(id) {
      this.id = id;
    },
    openModal(prod) {
      this.open = true;
      this.modalProduct = prod;
    },

    emptyCart() {
      window.localStorage.clear();
      const modalAlert = document.getElementById("myModal");
      modalAlert.style.display = "none";
      location.reload();
    },
    goBack() {
      this.$router.go(-1);
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
  .disp{
    padding-left: 0.8rem;
  }
.my-cont {
  padding: 80px 0;
}

.login {
  border-radius: 4px;
  border: none;
  color: #fff;
  text-align: center;
  padding: 0.7rem 0.9rem;
  margin-right: 1rem;
  background: #3da5d9;
  font-weight: bold;
  font-size: 18px;
  &:hover{
      background: #3db7d9;
      color: #fff;
  }

  & i {
      font-size: 1rem;
  }
}
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
  height: 70px;
  font-weight: 700;
  display: flex;
  justify-content: space-around;
  position: absolute;
  bottom: 0;
  align-items: center;
  color: #fff;
  & i {
    color: #fff;
    font-size: 24px;
  }

  & button {
    background-color: #3dd9bc;
    border: unset;
    flex-shrink: 0;
  }

  & .quantity {
    width: 20px;
    /* border: 1px solid #fff; */
    text-align: center;
  }
}

.number {
  font-size: 18px;
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
  width: 200px;
  height: 200px;
  object-fit: cover;
  object-position: center;
  flex-shrink: 0;
}

.title-price {
  padding: 12px 12px 0px 12px;
}

.under-image {
  width: 100%;
  position: relative;
}

/* .under-image h5 {
    flex-shrink: 0;
} */

.added-product {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #00a676;
  padding: 2rem;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: 1px solid transparent;
  border-radius: 20px;
  z-index: 1;
  transition: all .4s ease-in;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.removed-product {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #EE6C4D;
  padding: 2rem;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: 1px solid transparent;
  border-radius: 20px;
  z-index: 1;
  transition: all .4s ease-in;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
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

  .under-image {
    height: 165px;
  }

  .cart-btn {
    height: 60px;
  }
}
// CATEGORY ICON -----------
.icon-tooltip{
  position: relative;
  .tooltip {
    width: 100%;
    position: absolute;
    height: 10px;
    top: -10px;
    left: 0;
    display: none;
  }
  &:hover .tooltip {
    display: block;
  }
}

.category-icon {
  display: inline-block;
  width: 25px;
  height: 25px;
  & img {
    max-width: 100%;
    max-height: 100%;
  }
}

@media only screen and (max-width: 768px) {
  .product-card {
    width: 80%;
    margin: 0 calc((476px - 360px) / 2);
    margin-bottom: 2rem;
  }

  .cat-name{
    margin-bottom: 0.8rem;
    margin-left: 0.8rem;
  }

  .rest-name{
    margin-left: .8rem;
  }

  .rest-address{
    margin-left: .8rem;
  }

  .card-img{
    margin-left: 0.7rem;
    margin-bottom: 1rem;
  }
}

@media only screen and (max-width: 468px) {
  .product-card {
    width: 90%;
    margin: 0 auto;
    margin-bottom: 2rem;
    display: flex;
    flex-direction: column;
  }
  .product-card img {
    width: 100%;
    height: 210px;
  }

  .under-image {
    position: relative;
    height: 150px;
  }

  .title-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 12px 0px 12px;
    & h5 {
      margin-bottom: 0;
    }
  }

  #price {
    flex-shrink: 0;
  }
}

.myModal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
  text-align: center;

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 400px;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
}
</style>
