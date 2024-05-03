<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateWelcomeMessageRequest;
use App\Models\WelcomeMessage;

class WelcomeMessageController extends Controller
{
    /**
     * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateWelcomeMessageRequest $request)
    {
        $data = (object) $request->all();

        $wcmMsg = WelcomeMessage::where('dc_guild_id', $data->dc_guild_id)->first();

        if ($wcmMsg !== null) {
            if ($data->message === null)
                return response()->json(["error" => "Message cannot be null."]);
            if ($data->channel_id === null)
                return response()->json(["error" => "Channel cannot be null."]);

            $wcmMsg->update([
                'channel_id' => $data->channel_id,
                'message' => $data->message,
                // 'bg_image' => $data->wMsgImg
            ]);
        } else {
            if ($data->message === null)
                return response()->json(["error" => "Message cannot be null."]);
            if ($data->channel_id === null)
                return response()->json(["error" => "Channel cannot be null."]);

            WelcomeMessage::create([
                'dc_guild_id' => $data->dc_guild_id,
                'channel_id' => $data->channel_id,
                'message' => $data->message,
                // 'bg_image' => $data->wMsgImg
            ]);
        }

        return response()->json(["success" => "Successfully updated the Welcome Message settings."]);
    }
}
