<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to my ridiculous demo app!") }}
                </div>

                @if($countries)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">European Countries from REST Countries</h1>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Common Name</th>
                                <th scope="col" class="px-6 py-3">Official Name</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        @foreach($countries as $country)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="{{ $country->unMember ? 'text-green-500' : 'text-red-300' }} px-6 py-4 font-medium whitespace-nowrap">
                                    {{$country->commonName}}
                                </td>
                                <td class="px-6 py-4">{{$country->officialName}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($todos)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">My Todos from Json Placholder</h1>
                    <ol>
                     @foreach($todos as $todo)
                        <li>
                        {{$todo['title']}}
                        </li>
                     @endforeach
                     <ol>
                </div> 
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
