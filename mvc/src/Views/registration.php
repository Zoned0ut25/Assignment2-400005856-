<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="h-full ww-full grid lg:grid-cols-2">
        <div class="flex flex-col justify-center items-center md:border-r h-full">
            <img src="img/logo.svg" alt="" class="min-w-[100px] aspect-square object-contain">
            <h1 class="text-xl lg:text-3xl font-[500]">Research Management System</h1>
        </div>
        <div class="flex justify-center items-center bg-teal-500 p-6">

            <form method="post" action="/registration" class="max-w-md w-full border bg-white rounded-md flex flex-col gap-y-2 p-4">
                <h1 class="text-xl font-[500]">Create new user</h1>
                <p class="text-sm text-slate-500 italic">Create a new user account.</p>
                <div class="flex flex-col gap-y-2">
                    <label class="text-lg font-medium" for="username">Username</label>
                    <input 
                    type="text" 
                    name="username" 
                    class="border rounded p-2 text-sm"
                    value="<?php if(isset($_POST["username"])): echo $_POST["username"]; endif; ?>"
                    />
                    <span class="text-red-500"><?php if(isset($errors['username'])){ echo $errors['username'];} ?></span>
                </div>
                
                <div class="flex flex-col gap-y-2">
                    <label class="text-lg font-medium" for="email">Email</label>
                    <input 
                    type="text" 
                    name="email" 
                    class="border rounded p-2 text-sm"
                    value="<?php if(isset($_POST["email"])): echo $_POST["email"]; endif; ?>"
                    />
                    <span class="text-red-500"><?php if(isset($errors['email'])){ echo $errors['email'];} ?></span>
                </div>
                
                <div class="flex flex-col gap-y-2">
                    <label class="text-lg font-medium" for="password">Password</label>
                    <input 
                    type="password" 
                    name="password" 
                    class="border rounded p-2 text-sm"
                    value="<?php if(isset($_POST["password"])): echo $_POST["password"]; endif; ?>"
                    />
                    <span class="text-red-500"><?php if(isset($errors['password'])){ echo $errors['password'];} ?></span>
                </div>
                
                <div class="flex flex-col gap-y-2">
                    <label class="text-lg font-medium" for="role">Role</label>
                    <select name="role" class="border rounded p-2 text-sm">
                        <option value="Research Group Manager">Research Group Manager</option>
                        <option value="Research Study Manager">Research Study Manager</option>
                        <option value="Researcher">Researcher</option>
                    </select>
                </div>
                
                <div class="flex gap-x-2">
                    <button name="create" class="text-sm bg-slate-950 rounded px-6 py-2 text-white font-[500]" type="submit">Create</button>
                    <a class="rounded px-6 py-2 border border-slate-950 text-slate-950" href="./">Cancel</a>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>
