<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
    <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">My Sensors</h3>
    <p>You have {{$my_sensors->count()}} Sensors</p>
    <table class="min-w-full divide-y divide-gray-200 mt-5">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Sensor ID
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Plant Monitored
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type of Sensor
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Connection Status
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Current Irrigation Status
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($my_sensors as $sensor)
            <tr>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{$sensor->id}}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{$sensor->plant->plant_name}}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{$sensor->sensor_type}}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{ $sensor->ping_status == 1 ? 'Connected' : 'Disconnected' }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{ $sensor->action_status == 1 ? 'Watering' : 'Not Watering' }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-user-layout>
</x-layout>