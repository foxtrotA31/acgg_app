<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"> 
    <div>
        <a href="{{route('my_plants.show', $plant->id)}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        </a>
    </div>
    @if (session('success'))
        <div class="bg-green-600 px-2 py-2 mb-5 text-white rounded-xl">
            <p class= text-xl">{{session('success')}}</p>
        </div>
    @endif 
    <div class="flex items-center justify-center">
        <input type="text" id="sensor-id" placeholder="Enter Sensor Device No. Here" class="w-1/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <button id="search-btn" class="ml-1 px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600">Search</button>
    </div>
    <div id="sensor-details" class="w-full">
        <div class="flex flex-col items-center justify-center">
        <img class="h-1/4 w-1/4 mt-16" src="{{URL('images/acgg_logo.png')}}" alt="ACGGLogo" />
        <p class="text-2xl mt-4 mb-16">Enter Sensor Device No. Above.</p>
        </div>
    </div>
</div>
</x-user-layout>
</x-layout>
<script>
document.getElementById('search-btn').addEventListener('click', function() {
    const sensorId = document.getElementById('sensor-id').value;

    fetch(`{{ route('search_devices.search') }}?sensor_id=${sensorId}`)
        .then(response => response.json())
        .then(data => {
            const detailsDiv = document.getElementById('sensor-details');
            detailsDiv.innerHTML = '';

            if (data.length > 0) {
                data.forEach(sensor => {
                    detailsDiv.innerHTML += `
                    <div class="grid grid-cols-2 gap-4 mt-16">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 rounded-full object-cover text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        
                            <p class="text-2xl ml-4 p-2"> 
                                <strong class=" mr-3"> Sensor ID: </strong> ${sensor.id}
                                <br>
                                <strong class=" mr-3"> Sensor Type: </strong> ${sensor.sensor_type} 
                            </p>
                        </div>
                        <div class="flex items-center justify-center">
                            <form action="{{route('my_plants.update', $plant->id)}}" method="post">
                            @csrf
                            @method('PUT')
                                <input type="hidden" name="sensor_id" value="${sensor.id}">
                                <button class="bg-green-600 font-bold text-white py-2 px-4 rounded-xl hover:bg-green-700"> Connect and Activate Sensor </button>
                            </form>
                        </div>
                    </div>
                    `;
                });
            } else {
                detailsDiv.innerHTML += `
                    <div class="flex items-center justify-center my-20">
                        <p class="text-2xl text-red-500">Sensor ID not availble or does not exist.</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error fetching sensor data:', error);
        });
});
</script>