<?php
namespace  App\Services;

use App\Entities\TweetEntity;
use App\repositories\TweetRepository;

class TweetService
{
    private $tweetRep ;
    public function __construct(TweetRepository $tweetRep)
    {
        $this->tweetRep = $tweetRep;
    }
    public function create(TweetEntity $tweetEntity)
    {
        if($tweetEntity->getImage() !=null)
        {
            $imageName = time().'.'.$tweetEntity->getImage()->getClientOriginalExtension();
            $destinationPath = 'upload/images';
            $imagePath = $destinationPath. "/".  $imageName;
            $tweetEntity->getImage()->move(public_path($destinationPath), $imageName);
            $tweetEntity->setImage($imagePath);
        }
        return $this->tweetRep->store($tweetEntity);
    }
}
