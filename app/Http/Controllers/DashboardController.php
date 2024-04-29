<?php

namespace App\Http\Controllers;

use App\Models\AutoResponse;
use App\Models\AutoRole;
use App\Models\Blacklist;
use App\Models\Moderator;
use App\Models\ModMessageChannel;
use App\Models\PickupLine;
use App\Models\Quote;
use App\Models\ServerSetting;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function general($server)
    {
        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function fun($server)
    {
        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function miniGame($server)
    {
        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function moderation($server)
    {
        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }

    //ajax auto save
    public function save(Request $request)
    {
        $data = (object) $request->all();

        /**
         * 
         * General
         *   
         */

        /* Welcome Message */
        if ($data->toSave === "wMsgForm") {
            $wcmMsg = WelcomeMessage::where('dc_guild_id', $data->guildId)->first();

            if ($wcmMsg !== null) {
                if ($data->wMsg === null)
                    return response()->json(["error" => "Message cannot be null."]);
                if ($data->wMsgChannel === null)
                    return response()->json(["error" => "Channel cannot be null."]);

                $wcmMsg->update([
                    'channel_id' => $data->wMsgChannel,
                    'message' => $data->wMsg,
                    // 'bg_image' => $data->wMsgImg
                ]);
            } else {
                if ($data->wMsg === null)
                    return response()->json(["error" => "Message cannot be null."]);
                if ($data->wMsgChannel === null)
                    return response()->json(["error" => "Channel cannot be null."]);

                WelcomeMessage::create([
                    'dc_guild_id' => $data->guildId,
                    'channel_id' => $data->wMsgChannel,
                    'message' => $data->wMsg,
                    // 'bg_image' => $data->wMsgImg
                ]);
            }

            return response()->json(["success" => "Successfully updated the Welcome Message settings."]);
        }

        /* Autoroles */
        if ($data->toSave === "autoRolesForm") {
            $autoroles = AutoRole::where('dc_guild_id', $data->guildId)->get();

            foreach ($autoroles as $autorole)
                $autorole->delete();

            if (empty($data->autoRoles))
                return response()->json(["success" => "Successfully updated the Autoroles settings."]);

            foreach ($data->autoRoles as $autorole) {
                AutoRole::create([
                    'dc_guild_id' => $data->guildId,
                    'role_id' => $autorole
                ]);
            }

            return response()->json(["success" => "Successfully updated the Autoroles settings."]);
        }

        /* Autoresponses */
        if ($data->toSave === "autoRespsForm") {
            $autoresponses = AutoResponse::where('dc_guild_id', $data->guildId)->get();

            foreach ($autoresponses as $autoresponse)
                $autoresponse->delete();

            if (empty($data->autoResponses))
                return response()->json(["success" => "Successfully updated the Autoresponses settings."]);

            $autoresponses_toAdd = explode("\r\n", $data->autoResponses);

            foreach ($autoresponses_toAdd as $autoresponse) {
                trim($autoresponse);
                $autoresponse = explode("->", $autoresponse);

                AutoResponse::create([
                    'dc_guild_id' => $data->guildId,
                    'respond_to' => $autoresponse[0],
                    'respond_with' => $autoresponse[1]
                ]);
            }

            return response()->json(["success" => "Successfully updated the Autoresponses settings."]);
        }

        /* Server Settings */
        if ($data->toSave === "serverSettsForm") {
            $serversettings = ServerSetting::where('dc_guild_id', $data->guildId)->first();

            if ($serversettings !== null) {
                $serversettings->update([
                    //If value from $data->key is empty (false), then use existing value, otherwise set column value to 1 (true)
                    'auto_responses_enabled' => empty($data->auto_responses_enabled) ? $serversettings->auto_responses_enabled : 1,
                    'quotes_enabled' => empty($data->quotes_enabled) ? $serversettings->quotes_enabled : 1,
                    'pickups_enabled' => empty($data->pickups_enabled) ? $serversettings->pickups_enabled : 1,
                    'welcome_messages_enabled' => empty($data->welcome_messages_enabled) ? $serversettings->welcome_messages_enabled : 1,
                    'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled) ? $serversettings->mod_message_channels_enabled : 1,
                    'blacklist_enabled' => empty($data->blacklist_enabled) ? $serversettings->blacklist_enabled : 1,
                    'auto_roles_enabled' => empty($data->auto_roles_enabled) ? $serversettings->auto_roles_enabled : 1
                ]);
            } else {
                // This should realistically never be null, because a default ServerSetting model is created upon saving a guild (but do keep this for safety reasons)
                ServerSetting::create([
                    'dc_guild_id' => $data->guildId,
                    'auto_responses_enabled' => empty($data->auto_responses_enabled),
                    'quotes_enabled' => empty($data->quotes_enabled),
                    'pickups_enabled' => empty($data->pickups_enabled),
                    'welcome_messages_enabled' => empty($data->welcome_messages_enabled),
                    'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled),
                    'blacklist_enabled' => empty($data->blacklist_enabled),
                    'auto_roles_enabled' => empty($data->auto_roles_enabled)
                ]);
            }

            return response()->json(["success" => "Successfully updated Server Settings."]);
        }

        /**
         * 
         * Moderation
         *   
         */

         /* Mod Message Channels */
        if ($data->toSave === "modMsgChsForm") {
            $modMsgChs = ModMessageChannel::where('dc_guild_id', $data->guildId)->first();

            if ($modMsgChs !== null) {
                $modMsgChs->update([
                    'ban' => $data->banMsgCh,
                    'kick' => $data->kickMsgCh,
                    'timeout' => $data->toMsgCh,
                    'blacklist' => $data->blklMsgCh
                ]);
            } else {
                ModMessageChannel::create([
                    'dc_guild_id' => $data->guildId,
                    'ban' => $data->banMsgCh,
                    'kick' => $data->kickMsgCh,
                    'timeout' => $data->toMsgCh,
                    'blacklist' => $data->blklMsgCh
                ]);
            }

            return response()->json(["success" => "Successfully updated Mod Message Channel settings."]);
        }

        /* Moderators */
        if ($data->toSave === "moderatorsForm") {
            $moderators = Moderator::where('dc_guild_id', $data->guildId)->get();

            foreach ($moderators as $moderator)
                $moderator->delete();

            if (empty($data->moderators))
                return response()->json(["success" => "Successfully updated Moderators settings."]);

            foreach ($data->moderators as $moderator) {
                Moderator::create([
                    'dc_guild_id' => $data->guildId,
                    'user_id' => $moderator
                ]);
            }

            return response()->json(["success" => "Successfully updated the Moderators settings."]);
        }

        /* Blacklist */
        if ($data->toSave === "blacklistForm") {
            $blacklist = Blacklist::where('dc_guild_id', $data->guildId)->get();

            foreach ($blacklist as $word)
                $word->delete();

            if (empty($data->blacklist))
                return response()->json(["success" => "Successfully updated the Blacklist settings."]);

            $words_toAdd = explode(", ", $data->blacklist);

            foreach ($words_toAdd as $word) {
                trim($word);

                Blacklist::create([
                    'dc_guild_id' => $data->guildId,
                    'word' => $word
                ]);
            }

            return response()->json(["success" => "Successfully updated the Blacklist settings."]);
        }

        /**
         * 
         * Fun
         *   
         */

         /* Pickup Lines */
        if ($data->toSave === "pickupsForm") {
            $pickups = PickupLine::where('dc_guild_id', $data->guildId)->get();

            foreach ($pickups as $pickup)
                $pickup->delete();

            if (empty($data->pickups))
                return response()->json(["success" => "Successfully updated the Pickup Lines settings."]);

            $pickups_toAdd = explode("\r\n", $data->pickups);

            foreach ($pickups_toAdd as $pickup) {
                trim($pickup);

                PickupLine::create([
                    'dc_guild_id' => $data->guildId,
                    'line' => $pickup
                ]);
            }

            return response()->json(["success" => "Successfully updated the Pickup Lines settings."]);
        }

        /* Quotes */
        if ($data->toSave === "quotesForm") {
            $quotes = Quote::where('dc_guild_id', $data->guildId)->get();

            foreach ($quotes as $quote)
                $quote->delete();

            if (empty($data->quotes))
                return response()->json(["success" => "Successfully updated the Quotes settings."]);

            $quotes_toAdd = explode("\r\n", $data->quotes);

            foreach ($quotes_toAdd as $quote) {
                trim($quote);

                Quote::create([
                    'dc_guild_id' => $data->guildId,
                    'content' => $quote
                ]);
            }

            return response()->json(["success" => "Successfully updated the Quotes settings."]);
        }
    }
}
