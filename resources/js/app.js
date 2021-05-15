require("./bootstrap");
import Vue from "vue";
import store from "./store";

Vue.config.productionTip = false;

Vue.component("trending-movies", require("./views/TrendingMovies.vue").default);
Vue.component("discover-movies", require("./views/DiscoverMovies.vue").default);
Vue.component("size-bar", require("./components/SizeBar.vue").default);
Vue.component("size-bar-inside", require("./components/SizeBarInside.vue").default);

const app = new Vue({
    el: "#app"
});
