<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"> 
    <div class="mb-5">
        <a href="{{route('my_plants.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" class="green-txt" />
        </svg>
        </a>
    </div>  
    @if (session('success'))
        <div class="bg-green-600 px-2 py-2 text-white rounded-xl">
            <p class= text-xl">{{session('success')}}</p>
        </div>
    @endif 
    <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt">Create A New Plant Information</h3>
    <form action="{{route('my_plants.store')}}" method="post" class="my-10">
    @csrf
        <div class="grid grid-cols-2 gap-4 mt-10">
        <div class="flex items-center p-4">
            <label for="plant_name" class="text-lg green-txt font-medium">Plant Name</label>
            <input type="text" name="plant_name" value="{{old('plant_name')}}" class="w-60 ml-3 py-2 px-3 rounded-lg border-2  outline-none focus:border-indigo-500 @error('plant_name') border-red-500 @enderror" >
            @error('plant_name')
                <p class="text-red-600 text-md ml-2">{{$message}} </p>
            @enderror
        </div>

        <div class="flex items-center p-4">
            <label for="pc_id" class="text-lg green-txt font-medium">Plant Category</label>
            <select name="pc_id" id="pc_id" value="{{old('pc_id')}}" class="green-txt w-60 ml-3 py-2 px-3 rounded-lg border-2  outline-none focus:border-indigo-500">
                <option value="" disabled selected>-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->pc_name}}</option>
                @endforeach
            </select>    
            @error('irrigation_frequency')
                <p class="text-red-600 text-md ml-2">{{$message}} </p>
            @enderror
        </div>
        </div>

        <div class="overflow-x-auto">
            <table id="plantTable" border="1" class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="green-txt create-plant uppercase text-sm leading-normal">
                        <th class="py-3 px-6 w-48 text-left">Name</th>
                        <th class="py-3 px-6 w-48 text-left">Ideal Moisture %</th>
                        <th class="py-3 px-6 w-48 text-left">Wilting Point %</th>
                        <th class="py-3 px-6 w-64 md:w-[500px] text-left">Description</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    
                </tbody>
            </table>
        </div>
        <div class="text-right mt-10">
        <button class="btn-color hover:bg-cyan-700 focus:bg-cyan-700 text-white rounded-lg px-3 py-3 font-semibold">Add Plant</button>
        </div>
    </form>
</div>
</x-user-layout>
</x-layout>
<script>
$(document).ready(function(){
    $('#pc_id').on('change', function(){
        var categoryId = $(this).val();
        
        if(categoryId) {
            
            $.ajax({
                url: '{{ route('plants.byCategory') }}',
                type: 'POST',
                data: {
                    pc_id: categoryId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var tableBody = '';
                    
                    if(response.length > 0) {
                        $('#plantTable').show(); 

                        $.each(response, function(index, plant){
                            tableBody += 
                            '<tr>' +
                                '<td class="py-3 px-6 w-48 text-left whitespace-nowrap">' + plant.pc_name + '</td>' +
                                '<td class="py-3 px-6 w-48 text-left whitespace-nowrap">' + plant.pc_ideal_moisture + '</td>' +
                                '<td class="py-3 px-6 w-48 text-left whitespace-nowrap">' + plant.pc_wilting_point + '</td>' +
                                '<td class="py-3 px-6 w-64 md:w-[500px] text-left">' + plant.pc_description + '</td>' +
                            '</tr>';
                        });
                        $('#plantTable tbody').html(tableBody);
                    } else {
                        $('#plantTable tbody').html('<tr><td colspan="3" class="py-3 px-6 text-center">No plants found in this category.</td></tr>');
                    }
                }
            });
        } else {
            $('#plantTable').hide();
        }
    });
});
</script>