<x-layout>
<x-user-layout>
<div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
    @if (session('delete'))
        <div class="bg-red-500 px-2 py-2 text-white rounded-xl">
            <p class= text-xl">{{session('delete')}}</p>
        </div>
    @endif    
    <h3 class="text-2xl sm:text-3xl leading-none font-bold green-txt">My Plants</h3>
    <p class="green-txt">You have {{$my_plants->count()}} Plants</p>
    <div class="grid lg:grid-cols-4 gap-5 my-10">
        <div class="flex items-center justify-between">
            <a href="{{route('my_plants.create')}}" class="w-full h-60 bg-center object-cover sm:h-72 rounded-xl overflow-hidden shadow-md bg-contain bg-no-repeat flex items-center justify-center text-green-600 hover:text-white hover:scale-90" style="background-image: url('../images/default_moneyplant.jpg')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>
        @foreach ($my_plants as $plant)
        <div class="flex items-center justify-between">
            <div class="my-8">
                <a href="{{route('my_plants.show', $plant)}}">
                    <div class="bg-green-600 text-white rounded-xl overflow-hidden shadow-md hover:scale-90">
                        <div class="text-right">
                            <form action="{{route('my_plants.destroy', $plant)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <button class="w-full bg-red-600 hover:bg-red-700 focus:bg-red-700 text-white py-1  px-3 font-semibold text-sm" >
                                    Quit Monitoring 
                                </button>
                            </form>
                        </div>
                        <img src="{{URL('images/default_moneyplant.jpg')}}" alt="default" class="w-full h-60 sm:h-72 object-cover">
                        <div class="m-3">
                            <h4 class="font-bold text-center">{{$plant->plant_name}}</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
         @endforeach
    </div>
</div>
</x-user-layout>
</x-layout>
