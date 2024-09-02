<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">   
    @if (session('success'))
        <div class="bg-green-600 px-2 py-2 text-white rounded-xl">
            <p class= text-xl">{{session('success')}}</p>
        </div>
    @endif 
    <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Create A New Plant Information</h3>
    <form action="{{route('my_plants.store')}}" method="post" class="my-10">
        @csrf
        <div class="flex items-center mt-10">
            <label for="plant_name" class="text-2xl">Plant Name</label>
            <input type="text" name="plant_name" value="{{old('plant_name')}}" class="ml-3 py-2 px-3 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('plant_name') border-red-500 @enderror" >
            @error('plant_name')
                <p class="text-red-600 text-md ml-2">{{$message}} </p>
            @enderror
        </div>
        <div class="flex items-center mt-10">
            <label for="irrigation_frequency" class="text-2xl">Frequency</label>
            <select name="irrigation_frequency" id="irrigation_frequency" value="{{old('irrigation_frequency')}}" class="ml-3 py-2 px-3 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('irrigation_frequency') border-red-500 @enderror">
                <option value="Daily">Daily</option>
                <option value="Weekly">Weekly</option>
                <option value="MWF">M | W | F</option>
                <option value="TTH">T | TH</option>
            </select>    
            @error('irrigation_frequency')
                <p class="text-red-600 text-md ml-2">{{$message}} </p>
            @enderror            
        </div>
        <div class="flex items-center mt-10">
            <label for="action_start" class="text-2xl">Action Time</label>
            <input type="time" name="action_start" id="action_start" value="{{old('action_start')}}" class="ml-3 py-2 px-3 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('time') border-red-500 @enderror">
            @error('time')
                <p class="text-red-600 text-md ml-2">{{$message}} </p>
            @enderror   
        </div>
        <div class="flex items-center">
            <button class=" mt-10 bg-green-600 hover:bg-cyan-700 focus:bg-cyan-700 text-white rounded-lg px-3 py-3 font-semibold">Add Plant</button>
        </div>
    </form>
</div>
</x-user-layout>
</x-layout>