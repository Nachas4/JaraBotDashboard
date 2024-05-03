<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateQuoteRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = $data->forceDelete;

        $quotes = Quote::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($quotes as $quote)
            $forceDelete ? $quote->forceDelete() : $quote->delete();

        if (empty($data->quotes))
            return response()->json(["success" => "Successfully updated the Quotes settings."]);

        $quotes_toAdd = explode("\r\n", $data->quotes);

        foreach ($quotes_toAdd as $quote) {
            trim($quote);

            Quote::create([
                'dc_guild_id' => $data->dc_guild_id,
                'content' => $quote
            ]);
        }

        return response()->json(["success" => "Successfully updated the Quotes settings."]);
    }
}
