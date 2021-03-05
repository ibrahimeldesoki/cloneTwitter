<?php

namespace App\Http\Controllers;

use App\Entities\LikeTweetEntity;
use App\Entities\TweetEntity;
use App\Http\Requests\likeTweetRequest;
use App\Http\Requests\TweetRequest;
use App\LikeTweet;
use App\Services\LikeTweetService;
use App\Services\TweetService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    private $tweetService;
    private $likeTweetService;
    private $userService;

    public function __construct(TweetService $tweetService, LikeTweetService $likeTweetService, UserService $userService)
    {
        // Change by ahmed
        $this->tweetService = $tweetService;
        $this->likeTweetService = $likeTweetService;
        $this->userService = $userService;
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('addTweet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $tweetRequest)
    {
        $tweetEntity = new  TweetEntity();
        $tweetEntity->setUserId(Auth::user()->id);
        $tweetEntity->setContent($tweetRequest->content);
        $tweetEntity->setImage($tweetRequest->image);
        $this->tweetService->create($tweetEntity);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function likeTweet(likeTweetRequest $likeTweetRequest)
    {
        $likeTweetEntity = new LikeTweetEntity();

        $likeTweetEntity->setTweetId($this->tweetService->find($likeTweetRequest->tweet_id));
        $likeTweetEntity->setUserId($this->userService->find($likeTweetRequest->user_id));

        return $this->likeTweetService->create($likeTweetEntity);
    }
}
