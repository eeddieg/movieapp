require("./bootstrap");
import Vue from "vue";
import store from "./store";

Vue.config.productionTip = false;

Vue.component("trending-movies", require("./views/TrendingMovies.vue").default);

const app = new Vue({
    el: "#app"
});
