<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateWelcomeMessageRequest;
use App\Models\WelcomeMessage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class WelcomeMessageController extends Controller
{

    /**
     * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateWelcomeMessageRequest $request)
    {
        // return response()->json($_FILES['bg_image']);
        $data = (object) $request->all();

        $placeholder = 'WM_placeholder.png';
        $filename = $placeholder;
        if (!empty($_FILES['bg_image'])) {
            $validator = Validator::make($request->all(), [
                'bg_image' => [
                    'sometimes',
                    'required',
                    File::image()
                        ->min('1kb')
                        ->max('10mb')
                        ->dimensions(Rule::dimensions()->maxWidth(1920)->maxHeight(1080))
                ]
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => ["sizeError" => ["Image must be between 1KB and 10MB, with a max size of 1920x1080."]]], 422);
            }

            $bg_image = $_FILES['bg_image']['tmp_name'];
            $ext = '.jpg';
            $filename = 'WM_image_' . $data->dc_guild_id . $ext;

            Storage::delete('public/wm_images/' . $filename);

            Storage::putFileAs('public/wm_images', new \Illuminate\Http\File($bg_image), $filename);
        }

        $wcmMsg = WelcomeMessage::where('dc_guild_id', $data->dc_guild_id)->first();

        if ($wcmMsg !== null) {
            $wcmMsg->update([
                'channel_id' => $data->channel_id ?? '0',
                'message' => $data->message ?? '',
                'bg_image' => $wcmMsg->bg_image !== $placeholder ? $wcmMsg->bg_image : $filename
            ]);
        } else {
            WelcomeMessage::create([
                'dc_guild_id' => $data->dc_guild_id,
                'channel_id' => $data->channel_id ?? '0',
                'message' => $data->message ?? '',
                'bg_image' => $filename
            ]);
        }

        return response()->json(["success" => "Successfully updated the Welcome Message settings."]);
    }
}
