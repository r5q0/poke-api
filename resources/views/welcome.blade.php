<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://assets.pokemon.com/static2/_ui/img/favicon.ico" type="image/x-icon">
    <title>Poke | API</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="max-w-lg p-6 rounded-lg shadow-lg bg-gray-800">
        <h1 class="text-3xl font-bold mb-6">Pokemon API Documentation</h1>

        <div class="flex flex-col justify-center items-center w-full my-8">
            <a href="payment" class="mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                Purchase API key
            </a>
        </div>
        

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">1. Get Pokemon Data</h2>
            <p class="text-gray-400">
                Get a list of Pokemon based on specified criteria such as name, habitat, is_legendary, type, generation, egg_group, and color.
            </p>
 <code class="text-blue-500">
    /api/API-KEY/pokemons<span class="text-pink-500">?name=Pikachu&</span>
    <span class="text-yellow-500">type1=Electric&</span>
    <span class="text-purple-500">habitat=Forest&</span>
    <span class="text-green-500">is_legendary=0&</span>
    <span class="text-orange-500">generation=1&</span>
    <span class="text-red-500">color=Yellow</span>
</code>

                    </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">2. Get Berry Data</h2>
            <p class="text-gray-400">
                Get information about berries, including name, power, and group.
            </p>
            <code class="text-green-500">/api/API-KEY/berrys?type=fire&power=60</code>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">3. Get Stats Data</h2>
            <p class="text-gray-400">
                Get statistical information about Pokemon, specifying the name.
            </p>
            <code class="text-green-500">/api/API-KEY/stats?name=Pikachu</code>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Example Request</h2>
            <pre class="bg-gray-700 p-4 rounded-lg overflow-x-auto"><code class="text-green-500">GET api/API-KEY/pokemons?name=Pikachu&type1=Electric&habitat=Forest&is_legendary=0&generation=1&egg=Field&color=Yellow</code></pre>

            <h2 class="text-xl font-semibold mb-2">Example Response</h2>
            <pre class="bg-gray-700 p-4 rounded-lg overflow-x-auto"><code class="text-green-500">
[
    {
        "id": 25,
        "name": "Pikachu",
        "type1": "electric",
        "type2": "",
        "jname": "Pikachuピカチュウ",
        "generation": 1,
        "is_legendary": 0,
        "image": "iVBORw0KGgoAAAANSUhEUgAAAGAAAABgBAMAAAAQtmoLAAAAKlBMVEUAAAAAAAApKSlBQUpiMQhzc4OcUgDFIBjelADmWkH2vSD25lL/9qT////Vai+KAAAAAXRSTlMAQObYZgAAAdlJREFUWMPtlsFqwkAQhjclhB6ztRRReqiHXnoSbz0piLX2JcwliD6A0JsgEuoDlNJTQKzsnkJpSDN9A3PpG3U2ST12J4dCKftjNML/MTObndkwZmRkZPTX5Vb0Wxe/DrQq5nRSHehWBK4PQKtFAWpiU9wctTodygI0SsCZQqfTJgK+P3ZmgAClfltsJ9k+Qf8bKQACQZZlgHptqwC+lhh+ZNleAVz5HRjrAEwGUi4Tr/wX61JaSMzm8wrygo9BD5wjENVKYI3hNDnZbRiqlHJfAHrAuVQmeH9eqooJwB3AABN5egyL+rVF3MrldDtJ5/OwDKADbkSuHJAVgJf7kE1FTmg2lCNKheoOCa7froU2OSo5owLSHeG33s+aJQCuTfKzJhQBsNjRlpEAJHZSrY4tKBNkHeNSqk3XZXUKYEFSApH18D1BfgYAmwZ7CKJhsOsRgHUB7CAMgj5lGM9AIfgJ6wtGA2Ko45UK7lPmUjPGmRThlQr3zCMAM/BxhXz1MLhPAKyiBwCkEH2PkJIlCn+apiKklGDlPQBCYoSQdKBMxUG0o6hx8O9oh53VEAHnqndIj42x/kotpjWYrGgB7Djp5c6R8GgR+Gn5G0cVXwl41bcUIyMjo/+qLw92FGczGN4XAAAAAElFTkSuQmCC",
        "abilities": "[\"Static\", \"Lightningrod\"]",
        "color": "yellow",
        "habitat": "forest",
        "classification": "Mouse Pokémon",
    },
]
            </code></pre>
        </div>
    </div>

</body>

</html>
