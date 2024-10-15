<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Message
        <form action="{{route('message.store')}}" method="POST">
            @csrf
            <input type="text" name="content">
            <button>
                submit 
            </button>
        </form>
    </h1>
    
</body>
</html>