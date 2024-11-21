<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"> 
    <div class="mb-5">
        <a href="{{route('my_plants.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        </a>
    </div> 
    <div class="flex items-center justify-between">
        <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$plant->plantCategory->pc_name}} <span class="mx-5 text-cyan-500"> &#10093;</span> <span class="text-green-500">{{$plant->plant_name}}</span></h3>
        @if (!$plant->sensor)
        <div class="text-right">
            <a href="{{route('my_plants.edit', $plant->id)}}" class="text-cyan-600 inline-flex hover:bg-gray-100 hover:text-black group rounded-lg p-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                </svg><span class="mx-1 font-semibold">Apply Sensor</span>
            </a>
        </div>
        @endif
    </div>
    <p class="mt-5 text-justify green-txt text-lg font-normal">{{$plant->plantCategory->pc_description}}</p>
    
    <div class="mt-10 grid grid-cols-3 gap-6">
        <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt text-center">Ideal Moisture</h3>
            <p class="text-7xl text-center mt-10 text-green-600">{{$plant->plantCategory->pc_ideal_moisture}}%</p>
        </div>
        <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt text-center">Wilting Point</h3>
            <p class="text-7xl text-center mt-10 text-red-600">{{$plant->plantCategory->pc_wilting_point}}%</p>
        </div>
        <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt text-center">Current Moisture</h3>
            <p class="text-7xl text-center mt-10 text-cyan-600" id="data"> </p>
        </div>
    </div>

    <div class="my-20 ">
        <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt">Irrigation History</h3>
        @if ($plant->sensor)
        <table class="min-w-full divide-y divide-gray-200 mt-5">
            <thead class="sensor-index">
                <tr>
                    <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                    Date
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                    Sensor ID
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                    Time Started
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                    Time Ended
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                    Duration
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white" id="logsContainer">
                
            </tbody>
        </table>
        @else
        <p class="mt-10 text-center text-gray-500">There are no irrigation logs available for this plant. Please connect a sensor to enable monitoring. <span class="green-txt font-semibold">Located at the upper right corner of the screen.</span></p>
        @endif
    </div>
    <div class="my-20">
        <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">From Seed to Sprout Gallery</h3>
        <p>Your Plant's Journey Begins Here! Capture and Witness the Magic of Growth.</p>
        <div class="grid grid-cols-5 gap-5 mt-10">
            
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div> 
        </div>
    </div> --}}
</div>
</x-user-layout>
</x-layout>
@if($plant->sensor)
<script>

    const idealMoisture = {{$plant->plantCategory->pc_ideal_moisture}};
    const wiltingPoint = {{$plant->plantCategory->pc_wilting_point}};
    const plantId = {{$plant->id}};
    const sensorId = {{$plant->sensor->id}};

    let irrigationLogId = null; 

    let lastLogId = null;

    function sendRequest(value) {
        const url = `http://122.3.114.27:4000/?topic=smartgarden/&value=${value}`;
        
        fetch(url, { method: 'GET' })
            .then(response => {
                if (response.ok) {
                    console.log('Request successful');
                    if (value === 1) {
                        startIrrigationLog();
                    } else if (value === 0 && irrigationLogId) {
                        endIrrigationLog();
                    }
                } else {
                    console.log('Request failed');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function fetchData() {
        $.ajax({
            url: 'http://122.3.114.27:4000/?topic=smartgarden/data',
            method: 'GET',
            dataType: 'json', 
            success: function(data) {
                console.log(data);

                
                $('#data').text(`${data.moisture}%`);

                if(data.id == sensorId){
                    //  $('#data').text(`Sensor ID: ${data.id}, Moisture Level: ${data.moisture}`);
                    if (data.moisture <= wiltingPoint && irrigationLogId === null) 
                    {
                        sendRequest(1);
                    } 
                    else if (data.moisture >= idealMoisture && irrigationLogId) 
                    {
                        sendRequest(0);
                    }
                } else {
                    console.log(data.id + ' is not equal to ' + sensorId);
                }
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                $('#data').text('Error loading data');
            }
        });
    }

    function startIrrigationLog() {
        $.ajax({
            url: `{{route('startLog')}}`,
            method: 'POST',
            data: {
                sensor_id: sensorId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                irrigationLogId = response.id;
                console.log('Irrigation log started:', irrigationLogId);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error starting irrigation log:', textStatus, errorThrown);
            }
        });
    }

    function endIrrigationLog() {
        $.ajax({
            url:`/irrigation/endLog/${irrigationLogId}`,
            method: 'PATCH',
            data: {
                sensor_id: sensorId,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                console.log('Irrigation log ended:', irrigationLogId);
                irrigationLogId = null;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error ending irrigation log:', textStatus, errorThrown);
            }
        });
    }
    function formatDate(date, format) {
        const d = new Date(date);

        const options = {
            date: { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' },
            time: { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true }, 

        };

        if (format === 'date') {

            const weekday = d.toLocaleDateString('en-US', { weekday: 'long' });
            const monthDayYear = d.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            
            return `${monthDayYear} (${weekday})`;
            
        } else if (format === 'time') {
            return d.toLocaleTimeString('en-US', options.time);
        }
        return d;
    }

    function calculateDuration(start, end) {
        const startDate = new Date(start);
        const endDate = new Date(end);
        const diffMs = Math.abs(endDate - startDate);

        const hours = Math.floor(diffMs / (1000 * 60 * 60));
        const minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diffMs % (1000 * 60)) / 1000);

        return `${hours}h : ${minutes}m : ${seconds}s`;
    }

    function loadIrrigationLogs() {
        $.ajax({
            url: `/irrigation/logs/${sensorId}`,
            method: 'GET',
            success: function(data) {
            if (data.length > 0) {
                data.forEach(log => {
                    if (lastLogId === null || log.id > lastLogId && log.end_time) {
                        
                        const startDateFormatted = formatDate(log.start_time, 'date');
                        const startTimeFormatted = formatDate(log.start_time, 'time');
                        const endTimeFormatted = log.end_time ? formatDate(log.end_time, 'time') : 'N/A';
                        const duration = log.end_time ? calculateDuration(log.start_time, log.end_time) : 'N/A';
                        
                        const row = `
                        <tr id="log-${log.id}">
                            <td class="p-4 text-sm font-normal green-txt">${startDateFormatted}</td>
                            <td class="p-4 text-sm font-normal green-txt">${log.sensor_id}</td>
                            <td class="p-4 text-sm font-normal green-txt">${startTimeFormatted}</td>
                            <td class="p-4 text-sm font-normal green-txt">${endTimeFormatted}</td>
                            <td class="p-4 text-sm font-normal green-txt">${duration}</td>
                        </tr>`;
                        
                        $('#logsContainer').append(row);

                        lastLogId = log.id;
                    }
                });
            }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error loading logs:', textStatus, errorThrown);
            }
        });
    }


    fetchData();

    setInterval(fetchData, 5000);

    
    loadIrrigationLogs();

    setInterval(loadIrrigationLogs, 5000);

</script>

@endif

