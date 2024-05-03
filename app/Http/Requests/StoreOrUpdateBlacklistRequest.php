<?php

namespace App\Http\Requests;

use App\Models\DcGuild;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrUpdateBlacklistRequest extends FormRequest
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
            //255*20 because max num of blacklist is 20, +40 because ', ' seperator is 40 chars in 20 blacklist entries
            'dc_guild_id' => 'required|string|max:255',
            'blacklist' => 'required|max:5140'
        ];
    }
}
