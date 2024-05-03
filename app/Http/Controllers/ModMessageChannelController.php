<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateModMessageChannelRequest;
use App\Models\ModMessageChannel;

class ModMessageChannelController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateModMessageChannelRequest $request)
    {
        $data = (object) $request->all();

        $modsMsgChs = ModMessageChannel::where('dc_guild_id', $data->dc_guild_id)->first();

        if ($modsMsgChs !== null) {
            $modsMsgChs->update([
                'ban' => $data->ban,
                'kick' => $data->kick,
                'timeout' => $data->timeout,
                'blacklist' => $data->blacklist
            ]);
        } else {
            ModMessageChannel::create([
                'dc_guild_id' => $data->dc_guild_id,
                'ban' => $data->ban,
                'kick' => $data->kick,
                'timeout' => $data->timeout,
                'blacklist' => $data->blacklist
            ]);
        }

        return response()->json(["success" => "Successfully updated Mod Message Channel settings."]);
    }
}
