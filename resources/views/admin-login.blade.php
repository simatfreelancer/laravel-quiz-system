<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
   <h2 class="text-2xl text-center text-gray-800 mb-6">Admin Login </h2>
    @error('user')
    <div class="text-red-500">{{$message}}</div>     
   @enderror 
   <form action="/admin-login" method="post" class="space-y-4">
   @csrf
    <div>
        <label for="" class="text-gray-600 mb-1">Admin Name</label>
    <input type="text" name="name" placeholder="Enter Your Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
   @error('name')
    <div class="text-red-500">{{$message}}</div>     
   @enderror
</div>
     <div>
        <label for="">Password</label>
    <input type="password" name="password" placeholder="Enter Your Password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none"/>
    @error('password')
      <div class="text-red-500">{{$message}}</div>  
    @enderror
</div>
    <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Submit</button>
   </form>
    </div>
</body>
</html>