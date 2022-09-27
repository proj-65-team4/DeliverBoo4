<template>
  <div>
    <div class="container py-2">
      <h2>Checkout</h2>

      <form @submit.prevent="send">
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
          <label for="customer_telephone">Inserisci contatto telefonico</label>
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
          <label for="delivery_address">Inserisci indirizzo di consegna</label>
        </div>

        <div id="dropin-container"></div>
        <button id="sub"  class="button button--small button--green" >
            <router-link :to="{name: 'ThankYou'}">
          Purchase
            </router-link>
           
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import Axios from 'axios';

export default {
  data() {
    return {
        customer_name: "",
        customer_surname: "",
        customer_email: "",
        delivery_address: "",
        customer_telephone: "",
        payments: null
    };
  },
  methods: {
    send() {
        
      /* let formData = new FormData();
      formData.append("customer_name", this.name);
      formData.append("customer_surname", this.surname);
      formData.append("customer_email", this.email);
      formData.append("delivery_address", this.address);
      formData.append("customer_telephone", this.telephone); */
      // formData.append(document.getElementById('credit-card-number'));
      // formData.append(document.getElementById('expiration'));
      debugger
      Axios.post("/api/ordina", {
            customer_name:this.customer_name,
            customer_surname: this.customer_surname,
            customer_email: this.customer_email,
            delivery_address: this.delivery_address,
            customer_telephone: this.customer_telephone,
            payload: this.payments
      })
      .then(resp =>{
          console.log(resp.data)
      });
    },
  },
};
const button = document.getElementById("sub");
const form = document.querySelector("form");

braintree.dropin.create({
    
  authorization: 'sandbox_rzbhrwvw_jvtyvgv4fdj4br5y',
  selector: '#dropin-container'
}, function (err, instance) {
 button.addEventListener('click', function () {
   instance.requestPaymentMethod(function (err, payload) {
      
    });
  })
});
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
</style>
