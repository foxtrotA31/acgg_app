<x-layout>
<div class="flex overflow-hidden bg-white pt-16">
{{-- sidebar --}}
    <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
        <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
            <div class="userSide-bar  flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="userSide-bar  flex-1 px-3 bg-white divide-y space-y-1">
            <div class="text-center mb-5">
                <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/second_user.webp" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
                <a href="" class="inline-flex mt-4 items-center">
                    <h5 class="userSide-bar  text-xl font-bold">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3 text-green-600 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" /></svg>
                </a>
            </div>
            <ul class="space-y-2 py-3">
                <li>
                    <a href="{{route('dashboard')}}" class="userSide-cont text-base  font-normal rounded-lg flex items-center p-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank" class="userSide-cont  text-base  font-normal rounded-lg  flex items-center p-2 group ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Irrigation Schedule</span>
                    </a>
                </li>
                    <li>
                    <a href="{{route('my_plants.index')}}" target="_blank" class="userSide-cont  text-base font-normal rounded-lg flex items-center p-2 group ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="3" width="8" height="14" rx="4" />  <rect x="12" y="7" width="8" height="10" rx="3" />  <line x1="8" y1="21" x2="8" y2="13" />  <line x1="16" y1="21" x2="16" y2="14" /></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">My Plants</span>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </aside>
    {{-- sidebar --}}

    <div class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <div class="pt-6 px-4">
            <main>
                {{$slot}}
            </main>
            <div>
            <p class="text-center text-sm text-gray-500 my-10"> © Copyright 2024-year. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
</x-layout>