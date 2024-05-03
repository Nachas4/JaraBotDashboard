<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateServerSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return Auth::check() && DcGuild::find($_REQUEST['dc_guild_id'])->owner_id === Auth::user()->id;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dc_guild_id' => 'required|string|max:255',
            'auto_responses_enabled' => 'sometimes|required|in:on',
            'quotes_enabled' => 'sometimes|required|in:on',
            'pickups_enabled' => 'sometimes|required|in:on',
            'welcome_messages_enabled' => 'sometimes|required|in:on',
            'mod_message_channels_enabled' => 'sometimes|required|in:on',
            'blacklist_enabled' => 'sometimes|required|in:on',
            'auto_roles_enabled' => 'sometimes|required|in:on'
        ];
    }
}
