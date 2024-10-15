<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form with Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100 mx-auto  flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-80 mx-auto mt-10">
        {{-- @dd((url()->current())) --}}
        <form action={{route('message.store')}} method="POST" >
            @csrf
            <input type="hidden" value={{url()->current()}} name="url">
            <div class="mb-4">
                <label for="input-text" class="block text-gray-700 font-medium mb-2">Your Input</label>
                <input type="text" id="input-text" placeholder="Enter something" 
                name="content"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </div>
            
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:bg-blue-700 focus:outline-none transition duration-300">
                Submit
            </button>
        </form>
    </div>

</body>
</html>
