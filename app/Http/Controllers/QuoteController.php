<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends BaseController
{
    public function getAll(Request $request){

        $request->limit ? $request->limit : 10;
        $quotes = Quote::paginate($request->limit);

        return $this->sendResponse($quotes);
    }

    public function getRandomQuote(Request $request){

        $authorName = $request->author;
        $quoteIds = Quote::whereHas('character',function ($query) use($authorName){
            $query->where('name',$authorName);
        })->pluck('id')->toArray();
        $key = array_rand($quoteIds);
        $quote = Quote::find($quoteIds[$key]);

        return $this->sendResponse($quote);
    }
}
