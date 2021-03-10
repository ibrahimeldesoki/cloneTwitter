<?php

namespace App\Http\Controllers;

use App\Services\TweetService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $tweetService;

    public function __construct(TweetService $tweetService, UserService $userService)
    {
        $this->tweetService = $tweetService;
        $this->userService = $userService;

        // $this->middleware('auth');
    }

    public function index()
    {
        $followingTweets = $this->userService->followingTweets(Auth::user()->id);

        return $this->tweetService->timeline($followingTweets);
    }
}
