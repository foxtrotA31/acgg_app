<x-layout>
<div class="min-w-screen bg-gray-900 ">
    <div class="bg-gray-100 w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="hidden text-center text-white md:block w-1/2 bg-gradient-to-tr from-cyan-600 to bg-green-600 py-10 px-10">
                <div class="flex justify-center mt-10">
                    <img src="{{URL('images/acgg_logo.png')}}" alt="acgg_logo" width="200">
                </div>
                <h1 class="font-bold text-3xl mt-10"> Aqua Care Green Guard</h1>
                <p>Your Plant's Best Friend</p>
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                    <p>Enter your information to register</p>
                </div>
                <form action="{{route('register')}}" method="post">
                @csrf
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="firstname" placeholder="First Name" value="{{old('firstname')}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('firstname') border-red-500 @enderror">
                            </div>
                            @error('firstname')
                                <p class="text-red-600 text-xs ml-2">{{$message}} </p>
                            @enderror
                        </div>
                       
                        <div class="w-1/2 px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="lastname" placeholder="Last Name" value="{{old('lastname')}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('lastname') border-red-500 @enderror">
                            </div>
                            @error('lastname')
                                <p class="text-red-600 text-xs ml-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('email') border-red-500 @enderror">
                            </div>
                            @error('email')
                                <p class="text-red-600 text-xs ml-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    {{-- password --}}
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="password" placeholder="Password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 @error('email') border-red-500 @enderror">
                            </div>
                            @error('password')
                                <p class="text-red-600 text-xs ml-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    {{-- confirm passowrd --}}
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="password_confirmation" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button class="block w-full max-w-xs mx-auto bg-green-600 hover:bg-cyan-700 focus:bg-cyan-700 text-white rounded-lg px-3 py-3 font-semibold">REGISTER NOW</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout>
    