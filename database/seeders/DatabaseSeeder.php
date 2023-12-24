<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $pokemons = array_map('str_getcsv', file('C:\Users\raqo\Desktop\bit\deepdive\new\poke-api\poke-api\database\seeders\data.csv'));
        $columns = array_shift($pokemons);

        foreach ($pokemons as $pokemon) {
            DB::table('stats')->insert([
                "name" => $pokemon[30],
                "bug" => $pokemon[1],
                "dark" => $pokemon[2],
                "dragon" => $pokemon[3],
                "electric" => $pokemon[4],
                "fairy" => $pokemon[5],
                "fight" => $pokemon[6],
                "fire" => $pokemon[7],
                "flying" => $pokemon[8],
                "ghost" => $pokemon[9],
                "grass" => $pokemon[10],
                "ground" => $pokemon[11],
                "ice" => $pokemon[12],
                "normal" => $pokemon[13],
                "posion" => $pokemon[14],
                "psychic" => $pokemon[15],
                "rock" => $pokemon[16],
                "steel" => $pokemon[17],
                "water" => $pokemon[18],
                "hp" => $pokemon[28],
                "attack" => $pokemon[19],
                "defense" => $pokemon[25],
                "speed" => $pokemon[35],
            ]);
        }
        $this->command->info("All stats added to database");


        $response = Http::get('https://pokeapi.co/api/v2/berry/?offset=0&limit=20000');
        $clean = $response->json();
        foreach ($clean['results'] as $berry) {
            $response = Http::get($berry['url']);
            $clean = $response->json();
            $name = $clean['name'];
            $power = $clean['natural_gift_power'];
            $type = $clean['natural_gift_type']['name'];
            $spicy = $clean['flavors'][0]['potency'];
            $dry = $clean['flavors'][1]['potency'];
            $sweet = $clean['flavors'][2]['potency'];
            $bitter = $clean['flavors'][3]['potency'];
            $sour = $clean['flavors'][4]['potency'];

            DB::table('berrys')->insert([
                "name" => $name,
                "spicy" => $spicy,
                "dry" => $dry,
                "sweet" => $sweet,
                "bitter" => $bitter,
                "sour" => $sour,
                "power" => $power,
                "type" => $type
            ]);
            $this->command->info("Berry $name added to database");
        }
        foreach ($pokemons as $pokemon) {
            $clean = str_replace("'", '"', $pokemon[0]);
            DB::table('pokemons')->insert([
                "name" => $pokemon[30],
                "type1" => $pokemon[36],
                "type2" => $pokemon[37],
                "jname" => $pokemon[29],
                "generation" => $pokemon[39],
                "is_legendary" => $pokemon[40],
                "abilities" => $clean,
                "classification" => $pokemon[24],
                "color" => $this->getColor($pokemon[30]),
                "image" => $this->getImage($pokemon[30]),
                "habitat" => $this->getHabitat($pokemon[30]),
                "egg" => $this->getEggGroup($pokemon[30])
            ]);
            $this->command->info("Pokemon $pokemon[30] added to database");
        }
    }

    function getImage($name)
    {
        $name = $this->cleanName($name);
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$name");
        $clean = $response->json();
        $image = $clean['sprites']['front_default'];
    
        // Use Guzzle HTTP client for more efficient image retrieval
        $client = new \GuzzleHttp\Client();
        $imageResponse = $client->get($image);
        $data = $imageResponse->getBody()->getContents();
        $base64 = base64_encode($data);
    
        return $base64;
    }
    

    function getColor($name)
    {
        $name = $this->cleanname($name);
        $response = Http::get("https://pokeapi.co/api/v2/pokemon-color");
        $clean = $response->json();
        foreach ($clean['results'] as $color) {
            $response = Http::get($color['url']);
            $clean = $response->json();
            $color = $clean['name'];
            foreach ($clean['pokemon_species'] as $pokemon) {
                if ($pokemon['name'] == $name) {
                    return $color;
                }
            }
        }
    }

    function cleanname($name)
    {
        $name = str_replace('♀', '-f', $name);
        $name = str_replace('♂', '-m', $name);
        $name = str_replace("'", "", $name);
        $name = str_replace(". ", "-", $name);
        $name = strtolower($name);
        return $name;
    }

    function getHabitat($name)
    {
        $name = $this->cleanName($name);
        $response = Http::get("https://pokeapi.co/api/v2/pokemon-species/$name");
        $clean = $response->json();
        return $clean['habitat']['name'];
    }

    function getEggGroup($name)
    {
        $name = $this->cleanName($name);
        $response = Http::get('https://pokeapi.co/api/v2/egg-group');
        $clean = $response->json();
        foreach ($clean['results'] as $egg) {
            $response = Http::get($egg['url']);
            $clean = $response->json();
            $spec = $clean['name'];
            foreach ($clean['pokemon_species'] as $pokemon) {
                if ($pokemon['name'] == $name) {
                    return $spec;
                }
            }
        }
    }
}
