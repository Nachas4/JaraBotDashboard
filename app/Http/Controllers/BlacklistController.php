<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateBlacklistRequest;
use App\Models\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateBlacklistRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = $data->forceDelete;

        $blacklist = Blacklist::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($blacklist as $word)
            $forceDelete ? $word->forceDelete() : $word->delete();

        if (empty($data->blacklist))
            return response()->json(["success" => "Successfully updated the Blacklist settings."]);

        $words_toAdd = explode(", ", $data->blacklist);

        foreach ($words_toAdd as $word) {
            $word = trim($word);
            $word = str_replace(',', '', $word);

            Blacklist::create([
                'dc_guild_id' => $data->dc_guild_id,
                'word' => $word
            ]);

        }

        return response()->json(["success" => "Successfully updated the Blacklist settings."]);
    }
}
