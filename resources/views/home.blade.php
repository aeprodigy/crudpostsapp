<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-gray-900 ">
    @auth
    <div class="flex justify-evenly items-center pt-2">
        <h3 class="text-2xl font-bold text-white italic">CRUD Blog</h3>
        <p class="font-thin text-white">You can check and manage your blog posts</p>
        <form action="/logout" method="post">
            @csrf
            <button class="bg-blue-400 px-4 py-2 rounded text-white font-semibold">Log Out</button>
        </form>
    </div>


    <div class="flex items-center justify-center min-h-[40px] text-white">
        <div class="w-full max-w-md">
            <h3 class="text-xl text-center pt-2 font-semibold">Create a new post</h3>
            <form action="/create-post" method="POST" class="pt-2 space-y-4">
                @csrf
                <input class="w-full text-gray-800 p-2 border border-gray-300 rounded" type="text" name="title" placeholder="Title" />
                <textarea class="w-full text-gray-800 p-2 border border-gray-300 rounded" name="body" placeholder="Blog body"></textarea>
                <button class="bg-blue-400 px-4 py-2 rounded w-full text-white font-semibold cursor-pointer">Post</button>
            </form>
        </div>
    </div>

    <div class="text-white">
        <h2 class="text-xl  font-semibold text-center pt-4 text-white">Posts Feed</h2>
        @foreach($posts as $post)
        <div class="flex justify-center items-center ">
            <div class="w-[500px] ">
                <div class=" py-4 px-5 h-[95px] ">
                    <h2 class="font-bold bg-pink-400 px-2 text-xl">{{$post['title']}}</h2>
                    <p class="italic font-extralight px-2 py-2 bg-pink-300">{{$post['body']}}</p>
                    <div class="flex justify-evenly">
                        <button class="bg-orange-400 w-full"><a href="/edit-post/{{$post->id}}">Edit</a></button>
                        <form class="w-full bg-red-300 text-center" action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class=" ">Delete</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class=" flex justify-center items-center h-screen">

        <div class="">
            <h2 class="text-white text-xl text-center pt-4 pb-4">Register</h2>
            <div class=" flex items-center justify-center min-h-[40px]">
                <div class="w-full max-w-md">
                    <form action="/register" method="POST" class="pt-2 space-y-4">
                        @csrf
                        <input name="name" type="text" placeholder="name" class="w-full text-gray-800 p-2 border border-gray-300 rounded" />
                        <input name="email" type="text" placeholder="email" class="w-full text-gray-800 p-2 border border-gray-300 rounded" />
                        <input name="password" type="password" placeholder="password" class="w-full text-gray-800 p-2 border border-gray-300 rounded" />
                        <button class="bg-blue-400 px-4 py-2 rounded w-full text-white font-semibold cursor-pointe">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="pl-4 ">
            <h2 class="text-white text-xl text-center pt-4 pb-4">Login</h2>
            <div class="flex items-center justify-center min-h-[40px]">
                <div class="w-full max-w-md">
                    <form action="/login" method="POST" class="pt-2 space-y-4">
                        @csrf
                        <input class="w-full text-gray-800 p-2 border border-gray-300 rounded" name="loginname" type="text" placeholder="name" />
                        <input class="w-full text-gray-800 p-2 border border-gray-300 rounded" name="loginpassword" type="password" placeholder="password" />
                        <button class="bg-blue-400 px-4 py-2 rounded w-full text-white font-semibold cursor-pointer">Log in</button>
                    </form>
                </div>
            </div>

            @endauth


</body>

</html>