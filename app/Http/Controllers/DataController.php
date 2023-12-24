<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line

class DataController extends Controller
{

    public static function auth($api)
    {
        $data = DB::table('apikeys')->where('key', $api)->first();
        if ($data && $data->key == $api) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function pokemons(Request $request, $api)
    {
        if (self::auth($api) == true) {
            $query = DB::table('pokemons');

            if ($request->has('name')) {
                $query->where('name', $request->input('name'));
            }

            if ($request->has('habitat')) {
                $query->where('habitat', $request->input('habitat'));
            }

            if ($request->has('is_legendary')) {
                $query->where('is_legendary', $request->input('is_legendary'));
            }

            if ($request->has('type')) {
                $query->where('type', $request->input('type'));
            }

            if ($request->has('generation')) {
                $query->where('generation', $request->input('generation'));
            }

            if ($request->has('egg_group')) {
                $query->where('egg_group', $request->input('egg_group'));
            }

            if ($request->has('color')) {
                $query->where('color', $request->input('color'));
            }

            $data = $query->get();
            $data = response()->json($data);
            return $data;
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public static function berrys(Request $request, $api)
    {
        if (self::auth($api) == true) {
            $query = DB::table('berrys');

            if ($request->has('name')) {
                $query->where('name', $request->input('name'));
            }

            if ($request->has('power')) {
                $query->where('power', $request->input('power'));
            }

            if ($request->has('group')) {
                $query->where('group', $request->input('group'));
            }

            $data = $query->get();
            $data = response()->json($data);
            return $data;
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public static function stats(Request $request, $api)
    {
        if (self::auth($api) == true) {
            $query = DB::table('stats');

            if ($request->has('name')) {
                $query->where('name', $request->input('name'));
            }

            $data = $query->get();
            $data = response()->json($data);
            return $data;
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
