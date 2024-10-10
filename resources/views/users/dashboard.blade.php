<x-layout>
<x-user-layout>
<div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4">
   <div class="dashboard-box  shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
         <div class="flex items-center justify-between mb-4">
            <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Irrigation Report</h3>
            
         </div>
         <div class="mt-6">
            <canvas id="myChart" width="1025" height="300" role="img" aria-label="line graph to show selling overview in terms of months and numbers" ></canvas>
         </div>
   </div>
</div>
<div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4 my-4">
   <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
         <div class="flex items-center justify-between mb-4">
            <div class="flex-shrink-0">
               <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Water Level Status </h3>
               <div class="mt-10">			
                  <div id="chartdiv2" class="w-full" style="height: 240px"></div>
               </div>
            </div>
         </div>      
   </div>
   <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
         <div class="mb-4 flex items-center justify-between">
            <div>
               <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Irrigation Schedule</h3>
               <span class="text-base font-normal text-gray-500">These are the plants that are scheduled for Irrigation today</span>
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
                        <thead class="bg-gray-50">
                           <tr>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Plant Name
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Frenquency
                           </th>
                           {{-- Include No. of times to water a plant in a day --}}
                           <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Status
                           </th>
                           </tr>
                        </thead>
                        <tbody class="bg-white">
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
                           <tr class="bg-gray-50">
                           <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
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

{{-- For Display Only. Okay to remove and replace Chart--}}
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script>
    function radar_chart(selector, data) {
        // Themes begin
        // Themes end
        am4core.useTheme(am4themes_animated);

        // Create chart instance
        var chart = am4core.create(selector, am4charts.RadarChart);

        
        chart.data = data;

        // Make chart not full circle
        chart.startAngle = -90;
        chart.endAngle = 180;
        chart.innerRadius = am4core.percent(20);

        // Set number format
        chart.numberFormatter.numberFormat = "#.#'%'";

        // Create axes
        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.grid.template.strokeOpacity = 0;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.fontWeight = 500;
        categoryAxis.renderer.labels.template.adapter.add("fill", function (fill, target) {
            return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
        });
        categoryAxis.renderer.minGridDistance = 10;

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.grid.template.strokeOpacity = 0;
        valueAxis.min = 0;
        valueAxis.max = 100;
        valueAxis.strictMinMax = true;

        // Create series
        var series1 = chart.series.push(new am4charts.RadarColumnSeries());
        series1.dataFields.valueX = "full";
        series1.dataFields.categoryY = "category";
        series1.clustered = false;
        series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        series1.columns.template.fillOpacity = 0.08;
        series1.columns.template.cornerRadiusTopLeft = 10;
        series1.columns.template.strokeWidth = 0;
        series1.columns.template.radarColumn.cornerRadius = 10;

        var series2 = chart.series.push(new am4charts.RadarColumnSeries());
        series2.dataFields.valueX = "value";
        series2.dataFields.categoryY = "category";
        series2.clustered = false;
        series2.columns.template.strokeWidth = 0;
        series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
        series2.columns.template.radarColumn.cornerRadius = 10;

        series2.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        // Add cursor
        chart.cursor = new am4charts.RadarCursor();
    }

    am4core.ready(function () {
        radar_chart("chartdiv2", [{
            "category": "You still got 80%",
            "value": 80,
            "full": 100
        }, ]);
    }); // end am4core.ready()

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>const chart = new Chart(document.getElementById("myChart"), {
  type: "line",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "Aug",
      "Sep",
      "Nov",
      "Dec"
    ],
    datasets: [
      {
        label: "16 Mar 2018",
        borderColor: "#4A5568",
        data: [600, 400, 620, 300, 200, 600, 230, 300, 200, 200, 100, 1200],
        fill: false,
        pointBackgroundColor: "#4A5568",
        borderWidth: "3",
        pointBorderWidth: "4",
        pointHoverRadius: "6",
        pointHoverBorderWidth: "8",
        pointHoverBorderColor: "rgb(74,85,104,0.2)"
      }
    ]
  },
  options: {
    legend: {
      position: false
    },
    scales: {
      yAxes: [
        {
          gridLines: {
            display: false
          },
          display: false
        }
      ]
    }
  }
});
</script>