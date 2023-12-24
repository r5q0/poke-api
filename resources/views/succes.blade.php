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
        <h1 class="text-3xl font-bold mb-6">PokeAPI - Payment Success</h1>

        <div class="bg-white text-gray-900 p-4 rounded-lg mb-6">
            <h2 class="text-xl font-semibold mb-2">Your API Key</h2>
            
            <div class="bg-gray-200 p-3 rounded">
                <code>{{$key}}</code>
            </div>
            <p class="mt-4 text-sm text-gray-600">Please save the API key. We won't email it.</p>
        </div>

        <div class="text-center">
            <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Return to Documentation
            </a>
        </div>
    </div>

</body>

</html>
