<x-layout>
<div class="flex overflow-hidden bg-white pt-16">
   {{-- sidebar --}}
   <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
      <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
         <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
            <div class="text-center mb-5">
               <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/second_user.webp" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
               <a href="" class="inline-flex mt-4 items-center">
                  <h5 class="text-xl font-bold text-cyan-600 ">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</h5>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3 text-green-600 hover:text-gray-600">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" /></svg>
               </a>
            </div>
            <ul class="space-y-2 py-3">
               <li>
                  <a href="{{route('dashboard')}}" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                           <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                     </svg>
                     <span class="ml-3">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                     </svg>
                     <span class="ml-3 flex-1 whitespace-nowrap">Irrigation Schedule</span>
                  </a>
               </li>
                  <li>
                  <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                     <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="3" width="8" height="14" rx="4" />  <rect x="12" y="7" width="8" height="10" rx="3" />  <line x1="8" y1="21" x2="8" y2="13" />  <line x1="16" y1="21" x2="16" y2="14" /></svg>
                     <span class="ml-3 flex-1 whitespace-nowrap">My Plants</span>
                  </a>
                  </li>
               </ul>
               </div>
         </div>
      </div>
   </aside>
   {{-- sidebar --}}

   <div class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
      <div class="pt-6 px-4">
         <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
               <div class="flex items-center justify-between mb-4">
                  <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Report</h3>
               </div>
               <div>

               </div>
            </div>
         </div>
         <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4 my-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
               <div class="flex items-center justify-between mb-4">
                  <div class="flex-shrink-0">
                     <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Water Level Status </h3>
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
                  <h3 class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Plant Lists</h3>
                  <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2"> View all </a>
               </div>
               <div class="flow-root">
                  <ul role="list" class="divide-y divide-gray-200">
                     <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                        <div class="inline-flex items-center space-x-4">
                           <a href="#" class="inline-flex items-center">
                              <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              <p class="text-l font-medium truncate ml-4">
                                 Plant 1
                              </p>
                           </a>
                        </div>
                     </li>
                     <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                        <div class="inline-flex items-center space-x-4">
                           <a href="#" class="inline-flex items-center">
                              <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              <p class="text-l font-medium truncate ml-4">
                                 Plant 2
                              </p>
                           </a>
                        </div>
                     </li>
                     <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                        <div class="inline-flex items-center space-x-4">
                           <a href="#" class="inline-flex items-center">
                              <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              <p class="text-l font-medium truncate ml-4">
                                 Plant 3
                              </p>
                           </a>
                        </div>
                     </li>
                     <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                        <div class="inline-flex items-center space-x-4">
                           <a href="#" class="inline-flex items-center">
                              <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              <p class="text-l font-medium truncate ml-4">
                                 Plant 4
                              </p>
                           </a>
                        </div>
                     </li>
                     <li class="py-3 sm:py-4 hover:bg-gray-100 group rounded-lg px-5">
                        <div class="inline-flex items-center space-x-4">
                           <a href="#" class="inline-flex items-center">
                              <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              <p class="text-l font-medium truncate ml-4">
                                 Plant 5
                              </p>
                           </a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div>
            <p class="text-center text-sm text-gray-500 my-10"> © Copyright 2024-year. All Rights Reserved.</p>
         </div>
      </div>
   </div>
</div>
</x-layout>