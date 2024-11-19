<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
    <h3 class="green-txt  text-2xl sm:text-3xl leading-none font-bold">My Sensors</h3>
    <p class="green-txt">You have {{$my_sensors->count()}} Sensors</p>
    <table class="min-w-full divide-y divide-gray-200 mt-5">
        <thead class="sensor-index">
            <tr>
                <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                Sensor ID
                </th>
                <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                Plant Monitored
                </th>
                <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                Type of Sensor
                </th>
                <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                Connection Status
                </th>
                <th scope="col" class="p-4 text-left text-xs font-bold green-txt uppercase tracking-wider">
                Current Irrigation Status
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($my_sensors as $sensor)
            <tr>
                <td class="p-4 text-sm font-normal green-txt">
                    {{$sensor->id}}
                </td>
                <td class="p-4 text-sm font-normal green-txt">
                    {{$sensor->plant->plant_name}}
                </td>
                <td class="p-4 text-sm font-normal green-txt">
                    {{$sensor->sensor_type}}
                </td>
                <td class="p-4 text-sm font-normal green-txt">
                    {{ $sensor->ping_status == 1 ? 'Connected' : 'Disconnected' }}
                </td>
                <td class="p-4 text-sm font-normal green-txt">
                    {{ $sensor->action_status == 1 ? 'Watering' : 'Not Watering' }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-user-layout>
</x-layout>