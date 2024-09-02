<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">    
    <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$plant->plant_name}}</h3>
    <div class="mt-10 grid lg:grid-cols-2 gap-10">
        <div>
            <div class="grid grid-cols-2">
                <div>
                <h3 class="font-bold text-gray-900">Irrigation Frequency : {{$plant->irrigation_frequency}}</h3>
                <h3 class="font-bold text-gray-900">Action Start : {{date('h:i a', strtotime($plant->action_start))}}</h3>
                </div>
            </div>

            <hr class="my-10">
            
            <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Irrigation History</h3>
            <table class="min-w-full divide-y divide-gray-200 mt-5">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Day
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Watering Duration
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Soil Moisture Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        31-OCT-24
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Monday
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        30 Minutes
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Wet
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        31-OCT-24
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Monday
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        30 Minutes
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Wet
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        31-OCT-24
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Monday
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        30 Minutes
                        </td>
                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        Wet
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900 text-center">Soil Moisture Status</h3>
            <div class="mt-10">			
				<div id="chartdiv2" class="w-full" style="height: 240px"></div>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">From Seed to Sprout Gallery</h3>
        <p>Your Plant's Journey Begins Here! Capture and Witness the Magic of Growth.</p>
        <div class="grid grid-cols-5 gap-5 mt-10">
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
            <div class="card">
                <img src="{{URL('images/default_moneyplant.jpg')}}" alt="">
            </div>
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
            "category": "Soil Moisture",
            "value": 80,
            "full": 100
        }, ]);
    }); // end am4core.ready()

</script>