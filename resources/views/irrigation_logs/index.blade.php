<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
    <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">My Irrigation Logs</h3>
    <p>You have {{$my_logs->count()}} Irrigation Logs</p>
    @if ($my_logs)
    <table class="min-w-full divide-y divide-gray-200 mt-5">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Sensor ID
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Time Started
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Time Ended
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Duration
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($my_logs as $log)
            <tr>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{ \Carbon\Carbon::parse($log->start_time)->format('l, F j, Y') }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{$log->sensor_id}}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{ \Carbon\Carbon::parse($log->start_time)->format('h:i:s A') }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    {{ \Carbon\Carbon::parse($log->end_time)->format('h:i:s A') }}
                </td>
                <td class="p-4 text-sm font-normal text-gray-900">
                    @php
                        $start = \Carbon\Carbon::parse($log->start_time);
                        $end = \Carbon\Carbon::parse($log->end_time);

                        $durationInSeconds = $start->diffInSeconds($end);

                        $hours = floor($durationInSeconds / 3600); 
                        $minutes = floor(($durationInSeconds % 3600) / 60); 
                        $seconds = $durationInSeconds % 60; 
                    @endphp

                    {{ str_pad($hours, 2, '0', STR_PAD_LEFT) }}h: {{ str_pad($minutes, 2, '0', STR_PAD_LEFT) }}m: {{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}s

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p class="mt-10 text-center text-gray-400">There are no irrigation logs available for this plant. Please connect a sensor to enable monitoring.</p>
    @endif
    
</div>
</x-user-layout>
</x-layout>