<?php

namespace App\Http\Controllers;

use App\Entities\LikeTweetEntity;
use App\Entities\TweetEntity;
use App\Http\Requests\searchTweetRequest;
use App\Http\Requests\TweetRequest;
use App\Services\LikeTweetService;
use App\Services\TweetService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    private $tweetService;
    private $likeTweetService;
    private $userService;

    public function __construct(TweetService $tweetService, LikeTweetService $likeTweetService, UserService $userService)
    {
        $this->tweetService = $tweetService;
        $this->likeTweetService = $likeTweetService;
        $this->userService = $userService;
        // $this->middleware('auth');
    }

    public function create()
    {
        // return view('addTweet');
    }

    public function store(TweetRequest $tweetRequest)
    {
        $tweetEntity = new  TweetEntity();
        $tweetEntity->setUser($this->userService->find(Auth::user()->id));
        $tweetEntity->setContent($tweetRequest->content);
        $tweetEntity->setImage($tweetRequest->image);
        $this->tweetService->create($tweetEntity);
    }

    public function likeTweet($id)
    {
        $likeTweetEntity = new LikeTweetEntity();
        $likeTweetEntity->setTweet($this->tweetService->find($id));
        $likeTweetEntity->setUser($this->userService->find(Auth::user()->id));

        return $this->likeTweetService->create($likeTweetEntity);
    }

    public function searchTweet(searchTweetRequest $searchTweetRequest)
    {
        return $this->tweetService->search($searchTweetRequest->searchTweet);
    }
}
