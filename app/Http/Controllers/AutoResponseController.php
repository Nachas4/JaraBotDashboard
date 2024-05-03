<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateAutoResponseRequest;
use App\Models\AutoResponse;

class AutoResponseController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateAutoResponseRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = boolval($data->forceDelete);

        $autoresponses = AutoResponse::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($autoresponses as $autoresponse)
            $forceDelete ? $autoresponse->forceDelete() : $autoresponse->delete();

        if (empty($data->autoResponses))
            return response()->json(["success" => "Successfully updated the Autoresponses settings."]);

        $autoresponses_toAdd = explode("\r\n", $data->autoResponses);

        foreach ($autoresponses_toAdd as $autoresponse) {
            trim($autoresponse);
            $autoresponse = explode("->", $autoresponse);

            if (empty($autoresponse[1])) continue;

            if (strlen($autoresponse[0]) > 255 || strlen($autoresponse[1]) > 255)
                return response()->json(['error' => 'Length cannot be more than 255 characters.'], 500);

            AutoResponse::create([
                'dc_guild_id' => $data->dc_guild_id,
                'respond_to' => $autoresponse[0],
                'respond_with' => $autoresponse[1]
            ]);
        }

        return response()->json(["success" => "Successfully updated the Autoresponses settings."]);
    }
}
