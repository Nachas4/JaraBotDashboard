<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateAutoRoleRequest;
use App\Models\AutoRole;

class AutoRoleController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateAutoRoleRequest $request)
    {
        $data = (object) $request->all();
        $forceDelete = $data->forceDelete;

        $autoroles = AutoRole::where('dc_guild_id', $data->dc_guild_id)->get();

        foreach ($autoroles as $autorole)
            $forceDelete ? $autorole->forceDelete() : $autorole->delete();

        if (empty($data->autoRoles))
            return response()->json(["success" => "Successfully updated the Autoroles settings."]);

        foreach ($data->autoRoles as $autorole) {
            AutoRole::create([
                'dc_guild_id' => $data->dc_guild_id,
                'role_id' => $autorole
            ]);
        }

        return response()->json(["success" => "Successfully updated the Autoroles settings."]);
    }
}
