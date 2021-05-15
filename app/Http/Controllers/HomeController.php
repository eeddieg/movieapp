<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Cache;

// request ("../../../resources/js/store/index.ts");

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //ApiController::getConfigFromApi();

        // $trendingMovies = ApiController::fetchTrendingMovies();
        // $imagePath = ApiController::$secureBaseUrl . ApiController::$logoSizes[4];

        $ctrl = new ApiController();
        $discoverMovies = $ctrl->fetchDiscoverMovies();

        new MovieController($discoverMovies);


        // return view('home', [
        //     'movies' => $discoverMovies,
        //     'imagePath' => Cache::get('imagePath')
        // ]);

        return view('home')
            ->with('discoverMovies', $discoverMovies)
            ->with('imagePath', $GLOBALS["imagePath"])
            ->with('imageSizes', $GLOBALS["API_CONFIG"]["images"]);

    }

}
