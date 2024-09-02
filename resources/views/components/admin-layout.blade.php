<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet" />
</head>

<body>
    <header>
         <nav class="flex justify-between md:justify-around py-4 bg-cyan-950/80 backdrop-blur-md shadow-md w-full px-10 fixed top-0 left-0 right-0 z-10 md:px-3">
            
         </nav>
    </header>

    <main class="flex flex-col items-center justify-center mt-32">
        {{$slot}}
    </main>

    <footer class=" bg-cyan-950 pt-10 sm:mt-10 w-full">
        <!-- Copyright Bar -->
        <div class="pt-2">
            <div class="flex pb-5 px-3 m-auto pt-5 text-white text-sm flex-col md:flex-row max-w-6xl">
                <div class="mt-2">© Copyright 2024-year. All Rights Reserved.</div>
            </div>
        </div>
    </footer>
 
</body>
</html>
