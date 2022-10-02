<template>
  <div class="position-relative">
    <template  v-if="order_processing">
      <div class="order_processing">
        <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center align-items-center">
          <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <span>Stiamo processando l'ordine</span>
        </div>
      </div>
    </template>
    <div class="container py-5">
      <h2 class="mb-5 text-uppercase text-decoration-underline">Checkout</h2>
      <div class="p-2 border mb-3 rounded">
        <h4><strong> Riepilogo ordine</strong></h4>
        <div class="py-4 d-block">
          <div class="row py-2 border-1 border-bottom">
            <div class="col text-center"><strong>Nome</strong></div>
            <div class="col text-center">
              <strong>Descrizione</strong>
            </div>
            <div class="col text-center">
              <strong>Quantità</strong>
            </div>
            <div class="col text-center">
              <strong>Subtotal</strong>
            </div>
          </div>
          <div class="row py-2" v-for="item in cart" :key="item.id">
            <div class="col text-center">{{ item.name }}</div>
            <div class="col text-center">
              {{ item.description }}
            </div>
            <div
              class="
                col
                text-center
                d-flex
                gap-3
                justify-content-center
                align-items-center
              "
            >
              <button class="btn btn-danger" @click="removeCart(item)">
                -
              </button>
              {{ item.quantity }}
              <button class="btn btn-success" @click="addCart(item)">+</button>
            </div>
            <div class="col text-center">
              {{ (item.quantity * parseFloat(item.price)).toFixed(2) }}
              €
            </div>
          </div>
          <div class="text-center fw-bold">Prezzo totale {{ total }} €</div>
        </div>
      </div>
      <div class="p-2 border mb-3 rounded">
        <h4 class="py-4"><strong> Completa i dati</strong></h4>
        <form id="my-form" @submit.prevent="send">
          <div class="form-floating mb-3">
            <input
              type="text"
              name="customer_name"
              id="customer_name"
              class="form-control"
              required
              placeholder="Inserisci nome"
              v-model="customer_name"
            />
            <label for="customer_name">Inserisci nome</label>
          </div>
          <input
            type="hidden"
            name="my-nonce-input"
            id="my-nonce-input"
            v-model="payload"
          />
          <div class="form-floating mb-3">
            <input
              type="text"
              name="customer_surname"
              id="customer_surname"
              class="form-control"
              required
              placeholder="Inserisci cognome"
              v-model="customer_surname"
            />
            <label for="customer_surname">Inserisci cognome</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="email"
              name="customer_email"
              id="customer_email"
              class="form-control"
              required
              placeholder="Inserisci email"
              v-model="customer_email"
            />
            <label for="customer_email">Inserisci email</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="text"
              name="customer_telephone"
              id="customer_telephone"
              class="form-control"
              required
              placeholder="Inserisci numero telefono"
              v-model="customer_telephone"
            />
            <label for="customer_telephone"
              >Inserisci contatto telefonico</label
            >
          </div>
          <div class="form-floating mb-3">
            <input
              type="text"
              name="delivery_address"
              id="delivery_address"
              class="form-control"
              required
              placeholder="Inserisci indirizzo consegna"
              v-model="delivery_address"
            />
            <label for="delivery_address"
              >Inserisci indirizzo di consegna</label
            >
          </div>

          <div id="dropin-container"></div>
          <button id="sub" class="button button--small button--green">
            <!-- <router-link :to="{ name: 'ThankYou' }"> Purchase </router-link> -->
            --> Conferma
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

const call = false;

export default {
  data() {
    return {
      customer_name: "",
      customer_surname: "",
      customer_email: "",
      delivery_address: "",
      customer_telephone: "",
      payload: "",
      cart: [],
      bool: false,
      call: false,
      totalPrice: 0,
      order_processing: false,
    };
  },
  computed: {
    total() {
      this.totalPrice = 0;
      this.cart.forEach((item) => {
        this.totalPrice += item.quantity * item.price;
      });
      return this.totalPrice.toFixed(2);
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
    changeCall() {
      this.call = true;
    },
    removeCart(prodotto) {
      console.log(prodotto);
      const item = this.cart.find((product) => product.id === prodotto.id);
      console.log(item);
      if (item !== undefined && item.quantity !== 0) {
        item.quantity--;
        this.count--;
        setTimeout(() => {
          this.removedProduct = false;
        }, 1500);
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
      } else item.quantity++;
    },
    send() {
      setTimeout(() => {
        this.order_processing = false;
        const payload = document.querySelector("#my-nonce-input");
        if (payload) {
          this.order_processing = true;
          Axios.post("/api/ordina", {
            customer_name: this.customer_name,
            customer_surname: this.customer_surname,
            customer_email: this.customer_email,
            delivery_address: this.delivery_address,
            customer_telephone: this.customer_telephone,
            cart: this.cart,
          }).then((resp) => {
            localStorage.clear();
            this.$router.push({ name: "ThankYou" });
          });
        }
      }, 2000);
    },
    carts() {
      /* setInterval(() => {
                console.log(JSON.parse(localStorage.cart).length)
            }, 2000); */
      if (localStorage.cart != undefined && localStorage.cart.length > 0) {
        this.bool = true;
      } else {
        this.bool = false;
      }
      /*  this.length = JSON.parse(localStorage.cart).length; */
      /* console.log(this.cart.length);
            console.log("push"); */
      this.cart = JSON.parse(localStorage.getItem("cart"));
    },
  },
  mounted() {
    this.carts();
    const button = document.getElementById("sub");
    braintree.dropin.create(
      {
        authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
        selector: "#dropin-container",
      },
      function (err, instance) {
        var form = document.querySelector("#my-form");
        var hiddenNonceInput = document.querySelector("#my-nonce-input");

        form.addEventListener("submit", function (event) {
          event.preventDefault();

          instance.requestPaymentMethod(function (err, payload) {
            if (err) {
              hiddenNonceInput.value = false;
              return;
            }
            hiddenNonceInput.value = payload.nonce;
          });
        });
      }
    );

    this.total();
  },
};
</script>

<style lang="scss" scoped>
.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  display: inline-block;
}

.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}

.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.button--green:hover {
  background-color: #8bdda8;
  color: white;
}
ul {
  li {
    flex-grow: 1;
    text-align: center;
  }
}

.order_processing {
  position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    z-index: 9999;
    background-color: white;
    opacity: 80%;

}
</style>
