<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

// request("../../../resources/js/store/index.ts");

class ApiController extends Controller
{

    private const BASE_API_URL = 'https://api.themoviedb.org/3/';

    public function __construct()
    {
        $filePath = "js/mixins/api_key.ts";
        $key = $this->retrieveApiKeyFromFile($filePath);
        $GLOBALS["API_KEY"] = $key;

        $this->getConfigFromApi($key);
    }

    private function retrieveApiKeyFromFile(string $filePath) {
        $context = file_get_contents(resource_path($filePath));
        return (explode('"', $context, -1))[1];
    }

     public function getConfigFromApi(string $key)
    {
        $url = self::BASE_API_URL . "configuration?api_key=" .  $key;

        $GLOBALS["API_CONFIG"] = $config = Http::get($url)->json();
        $GLOBALS["imagePath"] = ($config['images']['secure_base_url'] . $config['images']["poster_sizes"][3]);
    }

    public function fetchTrendingMovies()
    {
        $url = $this->constrUrl("TRENDING");
        $res = Http::get($url)->json();

        return $res;
    }

    public function fetchDiscoverMovies()
    {
        $url = $this->constrUrl("DISCOVER");
        $res = Http::get($url)->json();

        return $res;
    }

    public function constrUrl($str)
    {
        $key = Cache::get('apiKey');
        $reqStr = '';
        switch($str){
            case "ACCOUNT":
                $reqStr = self::BASE_API_URL . "account?api_key=" . $key;
                break;
            case "CONFIG":
                $reqStr = self::BASE_API_URL . "configuration?api_key=" . $key;
                break;
            case "CREATE_SESSION":
                $reqStr = self::BASE_API_URL . "authentication/session/new?api_key=" . $key;
                break;
            case "DELETE_SESSION":
                $reqStr = self::BASE_API_URL . "authentication/session?api_key=" . $key;
                break;
            case "DISCOVER":
                $reqStr = self::BASE_API_URL . "discover/movie?api_key=" . $key .
                "&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1";;
                break;
            case "GENRE":
                $reqStr = self::BASE_API_URL . "genre/movie/list?api_key=" . $key;
                break;
            case "GUEST_SESSION":
                $reqStr = self::BASE_API_URL . "authentication/guest_session/new?api_key=" . $key;
                break;
            case "MOVIE":
                $reqStr = self::BASE_API_URL . "movie/550?api_key=" . $key;
                break;
            case "reqStrUEST_TOKEN":
                $reqStr = self::BASE_API_URL . "authentication/token/new?api_key=" . $key;
                break;
            case "TRENDING":
                $reqStr = self::BASE_API_URL . "trending/all/week?api_key=" . $key;
                break;
            case "VALIDATE":
                $reqStr = self::BASE_API_URL . "authentication/token/new?api_key=" . $key;
                break;
            case "VALIDATE_WITH_LOGIN":
                $reqStr = self::BASE_API_URL . "authentication/token/validate_with_login?api_key=" . $key;
                break;
            default:
                ddd('Invalid call string to API');
        }
        return $reqStr;
    }

}
