<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new ApiController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trendingMovies = $this->ctrl->fetchTrendingMovies();

        // Store to DB
        new MovieController($trendingMovies);

        // return view('welcome', [
        //     'trendingMovies' => $trendingMovies,
        //     'imagePath' => $GLOBALS['imagePath']
        // ]);

        return view("welcome")
            ->with("trendingMovies", $trendingMovies)
            ->with("imagePath", $GLOBALS["imagePath"]);
    }

}
