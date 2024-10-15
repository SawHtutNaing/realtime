<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mt-8 text-green-600">
            Message
        </h1>

        <div class="mt-6">
            <nav class="bg-white shadow-lg rounded-lg p-4">
                <ul class="flex justify-center space-x-4">
                    <li>
                        <a href="#" class="text-green-600 hover:text-green-800 font-semibold">Group Chat</a>
                    </li>
                    <li>
                        <a href="#" class="text-green-600 hover:text-green-800 font-semibold">Channel</a>
                    </li>
                    <li>
                        <a href="#" class="text-green-600 hover:text-green-800 font-semibold">Private Message</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            window.Echo.channel("messages")
            .listen("MessageSent", (e) => console.log('hell'));
        });
    </script>
</body>
</html>
