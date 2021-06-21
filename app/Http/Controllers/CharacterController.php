<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends BaseController
{
    public function getAll(Request $request){

        $request->limit ? $request->limit : 10;
        $characters = Character::with(['quotes','episodes']);

        if ($request->name){
            $characters->where('name', 'like', '%' . $request->name . '%');
        }
        $data = $characters->paginate($request->limit);

        return $this->sendResponse($data);
    }

    public function getRandomCharacter(Request $request){

        $characterIds = Character::all()->pluck('id')->toArray();
        $key = array_rand($characterIds);
        $character = Character::find($characterIds[$key]);

        return $this->sendResponse($character);
    }
}
