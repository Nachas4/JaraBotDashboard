<?php

namespace App\Http\Requests;

use App\Models\DcGuild;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrUpdateAutoResponseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && DcGuild::find($_REQUEST['dc_guild_id'])->owner_id === Auth::user()->id;
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>  
     */
    public function rules()
    {
        return [
            //255*10 because max num of autoResponses is 10, +20 because '->' seperator is 20 chars in 10 autoResponses
            'dc_guild_id' => 'required|string|max:255',
            'autoResponses' => 'max:2570'
        ];
    }
}
