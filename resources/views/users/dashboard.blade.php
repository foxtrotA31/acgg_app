<x-layout>
<x-user-layout>
<div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4">
   <div class="dashboard-box shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
      <div class="green-txt  flex items-center justify-between mb-4">
         <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Irrigation Report</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800 md:p-6">
         
         <canvas id="irrigationChart"> </canvas>
         
      </div>
   </div>
</div>
<div class="w-full my-4">
   <div class="dashboard-box shadow rounded-lg p-4 sm:p-6 xl:p-8">
      <div class="green-txt mb-4 flex items-center justify-between">
         <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Device Action Status</h3>
            <span class="text-base font-normal ">These are the devices that are activated for Irrigation.</span>
         </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6" id="sensor-list">
      </div>
   </div>
</div>
   {{-- <div class="dashboard-box-grn shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
      <div class="mb-4 flex items-center justify-between">
         <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold ">Plant Soil Moisture</h3>
            <span class="text-base font-normal ">These are the soil moisture level of each plant.</span>
         </div>
      </div>
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
                  <canvas id="soilMoisureChart"> </canvas>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
</x-user-layout>
</x-layout>
<script>
$(document).ready(function() {
   const irrChart = document.getElementById('irrigationChart').getContext('2d');

   const irrigationChart = new Chart(irrChart, {
         type: 'line',
         data: {
            labels: [],  
            datasets: [] 
         },
         options: {
            responsive: true,
            
            scales: {
               y: {
                  title: {
                     display: true,
                     text: 'Total Irrigation Duration (minutes)',
                  },
                  beginAtZero: true,
               },
            },
         }
   });

   function getIrrGraph() {
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


   function getDevices() {
      $.ajax({
         url: '/user-sensors',  // URL to fetch the sensor data
         method: 'GET',  // HTTP method (GET to fetch data)
         success: function(response) {
            const sensorList = $('#sensor-list');
            
            // Clear the current list
            sensorList.empty();
            
            if (response.length === 0) {
               sensorList.append('<p>No sensors available.</p>');
            } else {
               // Loop through each sensor and append it to the list
               response.forEach(sensor => {
                  // Check the action_status: 1 for "on", 0 for "off"
                  const statusClass = sensor.action_status === 1 ? 'bg-green-500' : 'bg-red-500';
                  const statusText = sensor.action_status === 1 ? 'On' : 'Off';
                  
                  const sensorItem = `
                     <div class="${statusClass} text-white shadow-lg rounded-lg p-4 text-center">
                        <h2 class="text-lg font-semibold">ID# : ${sensor.id}
                        <p class="mt-2">${statusText}</p>
                     </div>
                  `;
                  sensorList.append(sensorItem);  // Append each sensor to the DOM
               });
            }
         },
         error: function(error) {
               console.error('Error fetching sensors:', error);
         }
      });
   }


      // Initially fetch data for the logged-in user
   getIrrGraph();
   getDevices();
   
   // Set an interval to refresh the data periodically (every 60 seconds)
   setInterval(getIrrGraph, 60000);  
   setInterval(getDevices, 60000);
   
});

</script>