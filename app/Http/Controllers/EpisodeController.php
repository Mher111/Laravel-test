<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends BaseController
{
    public function getAll(Request $request){

        $request->limit ? $request->limit : 10;
        $episodes = Episode::paginate($request->limit);

        return $this->sendResponse($episodes);
    }

    public function getSingleEpisode($episode_id){

        $episode = Episode::find($episode_id);

        return $this->sendResponse($episode);
    }
}
