<x-layout>
    <section class="flex flex-wrap items-center -mx-3 font-sans px-4 w-full lg:max-w-screen-lg sm:max-w-screen-sm md:max-w-screen-md pb-20">
        <!-- Column-1 -->
        <div class="px-3 w-full lg:w-2/5">
            <div class="mx-auto mb-8 max-w-lg text-center lg:mx-0 lg:max-w-md lg:text-left">
                <h2 class="mb-4 font-bold text-left lg:text-5xl">
                    Your Personal Garden Assitant
                    <span class="text-5xl text-green-600 leading-relaxeds"> 
                        Aqua Care Green Guard 
                    </span> 
                    Monitor and Water with Ease!
                </h2>
            </div>

            <div class="text-center lg:text-left">
                <a class="block visible py-4 px-8 mb-4 text-xs font-semibold tracking-wide leading-none text-white bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded cursor-pointer sm:mr-3 sm:mb-0 sm:inline-block"> 
                    Root More 
                </a>
            </div>
        </div>

        <!-- Column-2 -->
        <div class="px-3 mb-12 w-full lg:mb-0 lg:w-3/5">
            <!-- Illustrations Container -->
            <div class="flex justify-center items-center">
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" >
            </div>
        </div>
    </section>

    <!-- Parallax Background -->
    <section class="flex flex-col w-full bg-cover bg-fixed bg-center items-center py-10"
        style="background-image: url('images/plant-bg.jpg');">
        <h1 class="text-white text-5xl font-semibold my-8"> How it Works </h1>

        <div class="mx-auto grid gap-6 md:w-4/5 md:grid-cols-3">
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="text-2xl font-semibold text-white">Step 1</h3>
                    <p class="text-white">Change background image and put some steps with images showing how this app works. Add more cards if necessary.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration" loading="lazy" width="600" height="300">
            </div>
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="text-2xl font-semibold text-white">Step 2</h3>
                    <p class="text-white">Change background image and put some steps with images showing how this app works. Add more cards if necessary.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration" loading="lazy" width="600" height="300">
            </div>
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="text-2xl font-semibold text-white">Step 3</h3>
                    <p class="text-white">Change background image and put some steps with images showing how this app works. Add more cards if necessary.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration" loading="lazy" width="600" height="300">
            </div>
        </div>
        
    </section>

    <!-- Content -->
    <section class="flex flex-wrap w-full lg:max-w-screen-lg sm:max-w-screen-sm md:max-w-screen-md py-10">
        <div class="text-center">
            <h1 class="text-5xl my-10 text-green-600 font-bold">ABOUT US</h1>
            <p>   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  </p>
        </div>
        <div class="mt-20">
            <h2 class="mb-20 text-3xl text-green-600 font-semibold">Meet The Team</h2>
            <div class="grid gap-12 items-center md:grid-cols-3 mx-auto px-6 md:px-12 xl:px-32">
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64" 
                        src="{{URL('images/mona.jpg')}}" alt="woman" loading="lazy" width="640" height="805">
                    <div>
                        <h4 class="text-2xl">Mona Faye Molina</h4>
                        <span class="block text-sm text-gray-500">System Developer/Hacker</span>
                    </div>
                </div>
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-48 md:h-64 lg:w-64 lg:h-80" 
                        src="{{URL('images/trisha.jpg')}}" alt="man" loading="lazy" width="1000" height="667">
                    <div>
                        <h4 class="text-2xl">Trisha Shen Casio</h4>
                        <span class="block text-sm text-gray-500">Project Manager/Hustler</span>
                    </div>
                </div>
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64" 
                        src="{{URL('images/renyel.jpg')}}" alt="woman" loading="lazy" width="1000" height="667">
                    <div>
                        <h4 class="text-2xl">Renyel Romanillos</h4>
                        <span class="block text-sm text-gray-500">UI/UX Designer/Hipster</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
