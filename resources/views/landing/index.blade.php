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
                <a
                    class="block visible py-4 px-8 mb-4 text-xs font-semibold tracking-wide leading-none text-white bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded cursor-pointer sm:mr-3 sm:mb-0 sm:inline-block">
                    Root More
                </a>
            </div>
        </div>

        <!-- Column-2 -->
        <div class="px-3 mb-12 w-full lg:mb-0 lg:w-3/5">
            <!-- Illustrations Container -->
            <div class="flex justify-center items-center">
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo">
            </div>
        </div>
    </section>

    <!-- Parallax Background -->
    <section class="flex flex-col w-full bg-cover bg-fixed bg-center items-center py-10"
        style="background-image: url('images/plant-bg.jpg');" id="features">
        <h1 class="white-txt  text-5xl font-semibold my-8"> Monitor Your Plants in Three Simple Steps </h1>

        <div class="mx-auto grid gap-6 md:w-4/5 md:grid-cols-3" id="howItWorks">
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="white-txt  text-2xl font-semibold">Enter Plant Information</h3>
                    <p class="white-txt ">Begin by naming your plant and selecting its category from our options. We’ve
                        made it easy—just pick the type you think best matches your plant, whether it’s a succulent,
                        herb, vegetable, or another category. This step helps our system tailor the monitoring to your
                        plant’s unique needs.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration"
                    loading="lazy" width="600" height="300">
            </div>
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="text-2xl font-semibold white-txt ">Connect to Sensor Devices</h3>
                    <p class="white-txt">Connect the sensors that will keep track of your plant’s moisture levels. To do
                        this, simply enter the Sensor ID or Model ID provided with your device. Our system will then
                        check to make sure the sensor is valid and available for use. Once verified, the sensor will be
                        ready to link with your plant, so you can monitor it in real-time.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration"
                    loading="lazy" width="600" height="300">
            </div>
            <div class="bg-gradient-to-tr from-cyan-600 to bg-green-600 rounded-3xl bg-opacity-30 px-8 py-5">
                <div class="mb-6 space-y-4">
                    <h3 class="text-2xl font-semibold  white-txt ">Start Moisture Monitoring</h3>
                    <p class="white-txt  ">With your sensor connected, monitoring begins immediately. The sensor tracks
                        your plant's soil moisture, and if it drops too low—meaning it’s time for water—our system will
                        automatically start watering. Once the soil reaches the optimal moisture level, the watering
                        will stop.</p>
                </div>
                <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" class="w-1/2 ml-auto" alt="illustration"
                    loading="lazy" width="600" height="300">
            </div>
        </div>

    </section>

    <!-- Content -->
    <section class="flex flex-wrap w-full lg:max-w-screen-lg sm:max-w-screen-sm md:max-w-screen-md py-10">
        <div class="text-center" id="aboutUs">
            <h1 class="green-txt  text-5xl my-10 font-bold">AquaCare Technovators</h1>
            <p class="green-txt text-justify"> We are a group of Bachelor of Science in Information Technology (BSIT)
                students in our final year, dedicated to blending
                technology with nature. We recognize the difficulties of keeping plants healthy, especially in today’s
                fast-paced world.
                That’s why we developed this system, which integrates both web and IoT components, as part of our final
                project.<br><br> Our aim
                is to provide small plant owners and enthusiasts with a smart, convenient way to monitor and water their
                plants
                remotely.

                Our goal is to simplify plant care, allowing you to enjoy the beauty of your greenery without the worry.
                Whether you're
                a beginner or a seasoned gardener, our platform is designed to give you peace of mind, knowing that your
                plants are
                well-cared for, even when you’re away.

                We hope our project not only helps your plants thrive but also fosters a more sustainable, tech-driven
                future for plant
                care.
            </p>
        </div>
        <div class="mt-20" id="meetUs">
            <h2 class="green-txt  mb-20 text-3xl font-semibold">Meet The Team</h2>
            <div class="grid gap-12 items-center md:grid-cols-3 mx-auto px-6 md:px-12 xl:px-32">
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64"
                        src="{{URL('images/mona.jpg')}}" alt="woman" loading="lazy" width="640" height="805">
                    <div>
                        <h4 class="green-txt  text-2xl">Mona Faye Molina</h4>
                        <span class="block text-sm text-gray-500">System Developer/Hacker</span>
                    </div>
                </div>
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-48 md:h-64 lg:w-64 lg:h-80"
                        src="{{URL('images/trisha.jpg')}}" alt="man" loading="lazy" width="1000" height="667">
                    <div>
                        <h4 class="green-txt  text-2xl">Trisha Shen Casio</h4>
                        <span class="block text-sm text-gray-500">Project Manager/Hustler</span>
                    </div>
                </div>
                <div class="space-y-4 text-center">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64"
                        src="{{URL('images/renyelgwapo.jpg')}}" alt="woman" loading="lazy" width="1000" height="667">
                    <div>
                        <h4 class="green-txt  text-2xl">Renyel Romanillos</h4>
                        <span class="block text-sm text-gray-500">UI/UX Designer/Hipster</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>