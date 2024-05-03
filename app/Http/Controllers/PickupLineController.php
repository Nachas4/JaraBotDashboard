<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdatePickupLineRequest;
use App\Models\PickupLine;

class PickupLineController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdatePickupLineRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = $data->forceDelete;

        $pickups = PickupLine::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($pickups as $pickup)
            $forceDelete ? $pickup->forceDelete() : $pickup->delete();

        if (empty($data->pickups))
            return response()->json(["success" => "Successfully updated the Pickup Lines settings."]);

        $pickups_toAdd = explode("\r\n", $data->pickups);

        foreach ($pickups_toAdd as $pickup) {
            trim($pickup);

            PickupLine::create([
                'dc_guild_id' => $data->dc_guild_id,
                'line' => $pickup
            ]);
        }

        return response()->json(["success" => "Successfully updated the Pickup Lines settings."]);
    }
}
