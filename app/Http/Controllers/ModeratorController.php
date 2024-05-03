<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateModeratorRequest;
use App\Models\Moderator;

class ModeratorController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateModeratorRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = $data->forceDelete;

        $moderators = Moderator::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($moderators as $moderator)
            $forceDelete ? $moderator->forceDelete() : $moderator->delete();

        if (empty($data->moderators))
            return response()->json(["success" => "Successfully updated Moderators settings."]);

        foreach ($data->moderators as $moderator) {
            Moderator::create([
                'dc_guild_id' => $data->dc_guild_id,
                'user_id' => $moderator
            ]);
        }

        return response()->json(["success" => "Successfully updated the Moderators settings."]);
    }
}
