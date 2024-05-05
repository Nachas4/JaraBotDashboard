<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateAutoResponseRequest;
use App\Models\AutoResponse;
use Illuminate\Support\Facades\Validator;

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
            $exploded = explode("->", $autoresponse);
            $exploded = ['respond_to' => $exploded[0], 'respond_with' => $exploded[1] ?? null];
            
            if (!str_contains($autoresponse, '->') || empty($exploded['respond_with'])) {
                return response()->json(['errors' => ["seperationError" => ["Autoresponses must have two parts seperated by '->'."]]], 422);
            }

            $validator = Validator::make($exploded, [
                'respond_to' => 'max:255',
                'respond_with' => 'max:255'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            AutoResponse::create([
                'dc_guild_id' => $data->dc_guild_id,
                'respond_to' => $exploded['respond_to'],
                'respond_with' => $exploded['respond_with']
            ]);
        }

        return response()->json(["success" => "Successfully updated the Autoresponses settings."]);
    }
}
