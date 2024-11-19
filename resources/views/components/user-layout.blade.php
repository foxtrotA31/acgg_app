<x-layout>
<div class="flex overflow-hidden bg-white pt-16">
    <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
        <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
            <div class="userSide-bar  flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="userSide-bar  flex-1 px-3 bg-white divide-y space-y-1">
            <div class="text-center mb-5">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : URL('images/profile_img.png') }}"  alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28 cursor-pointer transform transition-all hover:scale-105 hover:border-2 hover:border-green-500 hover:shadow-lg"   onclick="openModal()">
                {{-- modal --}}
                <div id="profileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="bg-white rounded-lg w-96 p-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Upload Profile Image</h2>
                            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                                &times;
                            </button>
                        </div>
                        <form action="{{ route('profile.image.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                        @csrf
                        @method('PUT')
                            <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100" />
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <button type="submit" class="bg-green-900 text-white px-4 py-2 rounded hover:bg-green-700 w-full">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
                <a href="{{route('profile.edit', auth()->user()->id)}}" class="inline-flex mt-4 items-center">
                    <h5 class="userSide-bar  text-xl font-bold">{{auth()->user()->name}}</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3 text-green-600 hover:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" /></svg>
                </a>
                <p class="text-sm text-gray-500">{{auth()->user()->email}}</p>
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
                    <a href="{{route('sensor_devices.index')}}" target="_blank" class="userSide-cont  text-base  font-normal rounded-lg  flex items-center p-2 group ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        <span class="ml-3 flex-1 whitespace-nowrap">Sensor Devices</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('my_plants.index')}}" target="_blank" class="userSide-cont  text-base font-normal rounded-lg flex items-center p-2 group ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="3" width="8" height="14" rx="4" />  <rect x="12" y="7" width="8" height="10" rx="3" />  <line x1="8" y1="21" x2="8" y2="13" />  <line x1="16" y1="21" x2="16" y2="14" /></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">My Plants</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('getAllLogs')}}" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Irrigation Logs</span>
                    </a>
                </li>
            </ul>
            </div>
            </div>
        </div>
    </aside>

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
<script>
    function openModal() {
        document.getElementById('profileModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('profileModal').classList.add('hidden');
    }
</script>