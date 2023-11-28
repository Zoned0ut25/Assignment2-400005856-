<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="../scripts/script.js" defer></script>
</head>
<body>
    <div class="h-full relative">
        <div class="h-[70px] fixed w-full lg:pl-56 z-40">
            <div class="w-full h-full bg-white p-4 border-b flex items-center shadow-sm">
                <button id="menuBtn" class="lg:hidden border border-slate-950 rounded">
                    <?php include("hamburger-icon.php"); ?>
                </button>
                <div class="ml-auto relative inline-block group">
                    <button class="rounded-full p-3 aspect-square bg-gray-200">
                       <?php include("user-icon.php"); ?>
                    </button>
                   <div class="hidden group-hover:block absolute  z-10 min-w-[300px] right-0 pt-2">
                    <div class="bg-white border shadow-sm rounded-md w-full flex flex-col overflow-hidden">
                        <span class=" py-2 px-4 hover:bg-slate-200"><?php if(isset($_SESSION["session_user"])) : echo($_SESSION['session_user']['role'].": ".$_SESSION['session_user']['username']); endif; ?></span>
                        <span class=" py-2 px-4 hover:bg-slate-200"><?php if(isset($_SESSION["session_user"])) : echo("Email: ".$_SESSION['session_user']['email']); endif; ?></span>                                
                        <a class="block py-2 px-4 hover:bg-slate-200 border-t" href="/logout">Logout</a>
                    </div>
                        
                   </div>
                </div>
                
                
            </div>
        </div>
        <div id="sidebar" class="w-56 fixed inset-y-0 transition-all transform -translate-x-full lg:translate-x-0 z-50">
            <div class="h-full border-r bg-white flex flex-col">
                <div class="w-full flex h-[70px] flex-col items-center justify-center">
                    <img src="../img/logo.svg" alt="">
                </div>
                <div class="flex flex-col">
                    <a href="/dashboard" class="pl-4 font-[500] flex items-center bg-teal-200 text-teal-700">Studies
                    <div class="ml-auto border-2 py-7 border-teal-700 opacity-100"></div>
                    </a>
                    <?php if(isset($_SESSION["session_user"]) && $_SESSION["session_user"]["role"] === "Research Group Manager"){
                        echo('
                    <a href="/dashboard/research" class="pl-4 font-[500] flex items-center bg-slate-200">Researchers
                    <div class="ml-auto border-2 py-7 border-teal-700 opacity-0"></div>
                    </a>');}?>
                </div>
            </div>
        </div>
        <main class="lg:pl-56 pt-[70px] h-full ">
            <div class="flex flex-col relative h-full">
                <div class="flex items-center py-2 px-4 ">
                    <h2 class="text-2xl font-[500]">All Studies</h2>
                    <?php if(isset($_SESSION["session_user"]) && ($_SESSION["session_user"]["role"] === "Research Group Manager" || $_SESSION["session_user"]["role"] === "Research Study Manager")){
                    echo('<a href="/dashboard/create-study" class="ml-auto text-sm bg-slate-950 rounded px-6 py-3 text-white font-[500]">New Study</a>');
                    }
                    ?>
                </div>
                <div class="p-6 h-full">
                    
                </div>
                <div class="mx-auto py-2">
                    <h1 class="text-sm italic text-slate-500">Copyright &copy; Darron Brathwaite. All Rights Reserved.</h1>
                </div>
                <?php if(isset($_GET["delete"])) : echo('<div class="absolute top-0 left-0 right-0 bottom-0 bg-white/50 backdrop-blur-sm z-10 flex justify-center items-center h-full">
                    <div class="p-4 bg-white border rounded w-full max-w-sm flex flex-col gap-y-8">
                        <div>
                            <h2 class="text-lg font-[500]">Are you sure?</h2>
                            <p class="text-slate-500 italic text-sm">This action cannot be undone.</p>
                        </div>
                        <form action="/dashboard?delete="'.$_GET["delete"].'" method="post">
                        <a href="/dashboard" class="text-sm border rounded px-6 py-3 font-[500]">Cancel</a>    
                        <button type="submit" name="confirm" class="text-sm bg-slate-950 rounded px-6 py-3 text-white font-[500]">Confirm</button>
                        </form>
                    </div>
                </div>'); endif; ?>
                
            </div>
                
        </main>
    </div>
</body>
</html>
