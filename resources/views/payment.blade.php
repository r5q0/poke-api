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

    <div class="max-w-md p-6 rounded-lg shadow-lg bg-gray-800">
        <h1 class="text-3xl font-bold mb-6">PokeAPI Purchase</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Complete Your Purchase</h2>
            <p class="text-gray-400 mb-6">
                Click the button below to pay 1.20 EUR.
            </p>
            <div class="flex justify-center items-center mb-6">
                <img src="images/applepay.svg" alt="Apple Pay" class="w-1/6 h-auto m-2">
                <img src="images/visa.svg" alt="Credit Card" class="w-1/6 h-auto m-2">
                <img src="images/ideal.svg" alt="Visa" class="w-1/6 h-auto m-2">
                <img src="images/mastercard.svg" alt="Mastercard" class="w-1/6 h-auto m-2">
            </div>
            <!-- Stripe payment --> 
            <form action="/api/stripe/payment" method="POST" class="mb-4">
                @csrf
                <button type="submit" class="disabled:opacity-50 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buy for 1.20 EUR</button>
            </form>
            
            <a href="/" class="block w-full text-center mt-4">
                <button class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</button>
            </a>
        </div>

    </div>

</body>

</html>
