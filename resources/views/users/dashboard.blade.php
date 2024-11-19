<x-layout>
<x-user-layout>
<div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4">
   <div class="dashboard-box  shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
      <div class="green-txt  flex items-center justify-between mb-4">
         <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Irrigation Report</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-lg">
            <canvas id="irrigationChart">
               
            </canvas>
      </div>
   </div>
</div>
<div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4 my-4">
   <div class="dashboard-box shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
         <div class="green-txt  flex items-center justify-between mb-4">
            <div class="flex-shrink-0">
               <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Sensor Actions Report</h3>
               <div class="mt-10">			
                  <div id="chartdiv2" class="w-full" style="height: 240px"></div>
               </div>
            </div>
         </div>      
   </div>
   <div class="dashboard-box-grn  shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
         <div class="mb-4 flex items-center justify-between">
            <div>
               <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Plant Soil Moisture</h3>
               <span class="text-base font-normal ">These are the plants that are scheduled for Irrigation today</span>
            </div>
            <div class="flex-shrink-0">
               <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all</a>
            </div>
         </div>
         <div class="flex flex-col mt-8">
            <div class="overflow-x-auto rounded-lg">
               <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
                     <table class="min-w-full divide-y divide-gray-200">
                        <thead class="irrigation-style">
                           <tr>
                           <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider">
                                 Plant Name
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider">
                                 Frenquency
                           </th>
                           {{-- Include No. of times to water a plant in a day --}}
                           <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider">
                                 Status
                           </th>
                           </tr>
                        </thead>
                        <tbody class="bg-white green-txt">
                           <tr>
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                 Plant A
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                 M T TH F
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                 Complete
                           </td>
                           </tr>
                           <tr class="irrigation-style">
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                 Plant B
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                 14 Days
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                 Ongoing
                           </td>
                           </tr>
                           <tr>
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                 Plant C
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                 M F
                           </td>
                           <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                 Not Started
                           </td>
                           </tr>
                        </tbody>
                     </table>
               </div>
               </div>
            </div>
         </div>
   </div>
</div>
<div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
   <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
         <div class="flex items-center justify-between mb-4">
            <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">My Plants</h3>
            <a href="{{route('my_plants.index')}}" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2"> View all </a>
         </div>
         <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200">
               @foreach ( $my_plants as $plant)
               <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                  <div class="inline-flex items-center space-x-4">
                     <a href="#" class="inline-flex items-center">
                        <img class="h-8 w-8 rounded-full" src="{{URL('images/default_moneyplant.jpg')}}">
                        <p class="text-l font-medium truncate ml-4">
                           {{$plant->plant_name}}
                        </p>
                     </a>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
   </div>
</div>
</x-user-layout>
</x-layout>

<script>
        $(document).ready(function() {
            const ctx = document.getElementById('irrigationChart').getContext('2d');

            const irrigationChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],  // Labels will be set dynamically
                    datasets: [] // Datasets will be set dynamically
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Irrigation Duration (minutes)',
                            },
                            beginAtZero: true,
                        },
                    },
                }
            });

            function fetchData() {
                $.ajax({
                    url: "{{ route('irrigation.graph.data') }}",
                    method: 'GET',
                    success: function(response) {
                        irrigationChart.data.labels = response.labels;
                        irrigationChart.data.datasets = response.datasets;
                        irrigationChart.update();
                    },
                    error: function(error) {
                        console.error("Error fetching data", error);
                    }
                });
            }

            // Initially fetch data for the logged-in user
            fetchData();

            // Set an interval to refresh the data periodically (every 60 seconds)
            setInterval(fetchData, 60000);  // Refresh every 60 seconds
        });
    </script>