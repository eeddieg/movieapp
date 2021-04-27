import { Component, Vue } from "vue-property-decorator";
import { API_KEY } from "./api_key";
import store from "../store";

@Component
export default class ApiCalls extends Vue {
  private static baseApiUrl = "https://api.themoviedb.org/3/";
  public imageConfig = {
    baseImgUrl: "",
    imageConf: []
  };

  constructor() {
    super();
    store.dispatch("configImageUrl").then(res => {
      this.imageConfig.baseImgUrl = res.baseImgUrl;
      this.imageConfig.imageConf = res.imageConf;
    });
  }

  static ACTIONS = {
    ACCOUNT: ApiCalls.baseApiUrl + "account?api_key=" + API_KEY,
    CONFIG: ApiCalls.baseApiUrl + "configuration?api_key=" + API_KEY,
    CREATE_SESSION:
      ApiCalls.baseApiUrl + "authentication/session/new?api_key=" + API_KEY,
    DELETE_SESSION:
      ApiCalls.baseApiUrl + "authentication/session?api_key=" + API_KEY,
    DISCOVER:
      ApiCalls.baseApiUrl +
      "discover/movie?api_key=" +
      API_KEY +
      "&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1",
    GENRE: ApiCalls.baseApiUrl + "genre/movie/list?api_key=" + API_KEY,
    GUEST_SESSION:
      ApiCalls.baseApiUrl +
      "authentication/guest_session/new?api_key=" +
      API_KEY,
    MOVIE: ApiCalls.baseApiUrl + "movie/550?api_key=" + API_KEY,
    REQUEST_TOKEN:
      ApiCalls.baseApiUrl + "authentication/token/new?api_key=" + API_KEY,
    TRENDING: ApiCalls.baseApiUrl + "trending/all/week?api_key=" + API_KEY,
    VALIDATE:
      ApiCalls.baseApiUrl + "authentication/token/new?api_key=" + API_KEY,
    VALIDATE_WITH_LOGIN:
      ApiCalls.baseApiUrl +
      "authentication/token/validate_with_login?api_key=" +
      API_KEY
  };

  static QUERIES = {
    SEARCH_MOVIE: ApiCalls.baseApiUrl + "search/movie?api_key=" + API_KEY
  };

  public getImageConf() {
    return this.imageConfig;
  }
}
