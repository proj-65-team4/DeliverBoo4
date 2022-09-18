import Vue from "vue";
import App from "./App.vue";
import VueRouter from "vue-router";
import { routes } from "./routes"
import "bootstrap";
import 'bootstrap/dist/css/bootstrap.min.css';

Vue.use(VueRouter);


new Vue({
  el: "#app",
  render: h => h(App),
  
  router: new VueRouter({
    routes,
    mode: "history"
  })
  

})