// import Vue from "vue";
// import Vuex from "vuex";
// import axios from "axios";

// Vue.use(Vuex);

// var store = new Vuex.Store({
//     strict: true,
//     state: {},
//     getters: {},
//     mutations: {},
//     actions: {},
//     modules: {}
// });


/* var store = new Vuex.Store({
  strict: true,
  state: {
    STATUS: {
      SUCCESS: 200,
      UNAUTHORIZED: 7,
      NOT_FOUND: 34
    },
    user: {
      name: "",
      token: ""
    },
    config: [],
    imageConfig: {
      baseImgUrl: "",
      imageConf: []
    },
    account: {},
    genre: {},
    trending: {},
    discover: {}
  },
  getters: {
    isAuth: state => {
      if (state.user.token == "") {
        return false;
      }
      return true;
    },
    getConfig: state => {
      return state.config;
    },
    getAccount: state => {
      return state.account;
    },
    getStatus: state => {
      return state.STATUS;
    },
    getGenre: state => {
      return state.genre;
    },
    getTrendingMovies: state => {
      return state.trending;
    },
    getDiscover: state => {
      return state.discover;
    }
  },
  mutations: {
    SET_USER(state, payload: { username: string; token: string }) {
      state.user.name = payload.username;
      state.user.token = payload.token;
    },
    SET_ACCOUNT(state, payload: {}) {
      state.account = payload;
      console.log(state.account);
    },
    SET_CONFIG(state, payload) {
      state.config = payload;
    },
    SET_GENRE(state, payload: []) {
      state.genre = payload;
    },
    SET_TRENDING_MOVIES(state, payload) {
      state.trending = payload;
    },
    SET_DISCOVER_MOVIES(state, payload) {
      state.discover = payload;
    }
  },
  actions: {
    storeApiConfig({ commit }, payload) {
      commit("SET_CONFIG", payload);
      console.log("API config stored.");
    },
    async createGuestSession() {
      const STATUS = this.getters.getStatus;
      await axios
        .get(ApiCalls.ACTIONS.GUEST_SESSION)
        .then(res => {
          if ((res.status = STATUS.SUCCESS)) {
            if (res.data.success) {
              localStorage.setItem(
                "guest_session_id",
                res.data.guest_session_id
              );
              localStorage.setItem(
                "guest_session_expires_at",
                res.data.expires_at
              );
            }
          }
        })
        .catch(err => console.log(err));
    },
    async validateUser({ commit }, user) {
      const STATUS = this.getters.getStatus;
      await axios
        .get(ApiCalls.ACTIONS.REQUEST_TOKEN)
        .then(res => {
          if (res.status == STATUS.SUCCESS) {
            if (res.data.success) {
              localStorage.setItem(
                "temporary_request_token",
                res.data.request_token
              );
            }
          } else {
            console.log("error");
          }
        })
        .catch(err => console.log(err));

      const data = {
        username: user.username,
        password: user.password,
        request_token: localStorage.getItem("temporary_request_token")
      };

      await axios
        .post(ApiCalls.ACTIONS.VALIDATE_WITH_LOGIN, data)
        .then(res => {
          if (res.data.success) {
            localStorage.removeItem("temporary_request_token");
            localStorage.removeItem("guest_session_id");
            localStorage.removeItem("guest_session_expires_at");
            localStorage.setItem(
              "request_token",
              res.data.request_token
            );
            localStorage.setItem(
              "request_token_expires_at",
              res.data.expires_at
            );

            axios
              .post(ApiCalls.ACTIONS.CREATE_SESSION, {
                request_token: localStorage.getItem(
                  "request_token"
                )
              })
              .then(res => {
                localStorage.removeItem("request_token");
                localStorage.removeItem(
                  "request_token_expires_at"
                );
                localStorage.setItem(
                  "session_id",
                  res.data.session_id
                );
              })
              .catch(err => console.log(err));

            commit("SET_USER", res.data.request_token);
          } else {
            if (res.data.status_code == STATUS.UNAUTHORIZED) {
              //router.replace("/login");
            } else if (res.data.status_code == STATUS.NOT_FOUND) {
              //router.replace("/login");
            }
          }
        })
        .catch(err => console.log(err));
    },
    async fetchConfig({ commit }) {
      await axios
        .get(ApiCalls.ACTIONS.CONFIG)
        .then(res => commit("SET_CONFIG", res.data))
        .catch(err => console.log(err));
      return this.state.config!;
    },
    async fetchAccountInfo({ commit }) {
      const url =
        ApiCalls.ACTIONS.ACCOUNT +
        "&session_id=" +
        localStorage.getItem("session_id");

      axios
        .get(url)
        .then(res => commit("SET_ACCOUNT", res.data))
        .catch(err => console.log(err));
    },
    async queryGenre({ commit }) {
      await axios
        .get(ApiCalls.ACTIONS.GENRE)
        .then(res => commit("SET_GENRE", res.data))
        .catch(err => console.log(err));
    },
    async fetchTrending({ commit }) {
      await axios
        .get(ApiCalls.ACTIONS.TRENDING)
        .then(res => commit("SET_TRENDING_MOVIES", res.data)) //page 1 out of 10000
        .catch(err => console.log(err));
      return this.state.trending;
    },
    async discoverMovies({ commit }) {
      await axios
        .get(ApiCalls.ACTIONS.DISCOVER)
        .then(res => commit("SET_DISCOVER_MOVIES", res.data)) //page 1 out of 10000
        .catch(err => console.log(err));
      return this.state.discover;
    },
    configImageUrl() {
      const conf = this.getters.getConfig;
      const imageConf = [conf.change_keys, conf.images];
      const baseImgUrl =
        imageConf[1].base_url + imageConf[1].logo_sizes[4];
      return { imageConf, baseImgUrl };
    },
    async deleteSession() {
      localStorage.removeItem("guest_session_id");
      localStorage.removeItem("guest_session_expires_at");
      localStorage.removeItem("temporary_request_token");
      localStorage.removeItem("session_id");
    },
    async logout({ commit, dispatch }) {
      const url = ApiCalls.ACTIONS.DELETE_SESSION;
      0;
      await axios
        .post(url, {
          session_id: localStorage.getItem("session_id")
        })
        .then(() => console.log())
        .catch(err => console.log("DELETE_SESSION: " + err));

      dispatch("deleteSession");
      commit("SET_USER", { name: "", token: "" });

      //router.push("/");
    }
  },
  modules: {}
}); */

// export default store;
