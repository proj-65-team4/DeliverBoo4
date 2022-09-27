<template>
  <div>
    <div class="container py-2">
      <h2>Checkout</h2>

      <form @submit.prevent="send" method="get">
        <div class="form-floating mb-3">
          <input
            type="text"
            name="customer_name"
            id="customer_name"
            class="form-control"
            required
            placeholder="Inserisci nome"
            v-model="form.name"
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
            v-model="form.surname"
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
            v-model="form.email"
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
            v-model="form.telephone"
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
            v-model="form.address"
          />
          <label for="delivery_address">Inserisci indirizzo di consegna</label>
        </div>

        <div id="dropin-container"></div>
        <button type="submit" class="button button--small button--green">
          Purchase
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

/* braintree.dropin.create({
  authorization: 'sandbox_rzbhrwvw_jvtyvgv4fdj4br5y',
  selector: '#dropin-container'
}, function (err, instance) {
  
    
    instance.requestPaymentMethod(function (err, payload) {
       

    });
}); */
export default {
  data() {
    return {
      form: {
        name: "",
        surname: "",
        email: "",
        address: "",
        telephone: "",
      },
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
      axios.get("api/order", this.form,{
        headers: {'Content-Type': 'application/json'}
      }).then((resp) => {
        console.log();
      })
      .catch(error=>{
          console.log(error);
      });
    },
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
</style>
