<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white">
   

    <div class="flex items-center justify-center min-h-[40px]">
        <div class="w-full max-w-md">
            <h3 class="text-xl text-center pt-16 font-semibold ">Edit Post</h3>
            <form action="/edit-post/{{$post->id}}" method="POST" class="pt-2 space-y-4">
                @csrf
                @method('PUT')
                <input class="w-full text-gray-800 p-2 border border-gray-300 rounded" type="text" name="title" value="{{$post->title}}" />
                <textarea class="w-full text-gray-800 p-2 border border-gray-300 rounded" name="body" placeholder="Blog body">{{$post->body}}</textarea>
                <button class="bg-blue-400 px-4 py-2 rounded w-full text-white font-semibold cursor-pointer">Submit change</button>
            </form>
        </div>
    </div>
</body>

</html>