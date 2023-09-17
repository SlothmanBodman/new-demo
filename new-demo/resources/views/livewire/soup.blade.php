<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Soup') }}
        </h2>
    </x-slot>
    <div class="col-span-8 mb-2">
        @if(session()->has('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 text-teal-900 px-4 py-3 shadow-md" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="bg-red-100 border-t-4 border-red-500 text-red-900 px-4 py-3 shadow-md" role="alert">
            {{session()->get('error')}}
        </div>
        @endif
        <div>
            @if($addSoupModal)
                @include('livewire.createsoup')
            @endIf
            @if($editSoupModal)
                @include('livewire.updateSoup')
            @endIf
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                @if(!$addSoupModal)
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addSoup()">
                    Add Soup
                </button>
                @endIf
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Rating</th>
                            <th scope="col" class="px-6 py-3">Cost</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        @if(count($soups) > 0)
                            @foreach($soups as $soup)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" wire:key="soup-{{$soup->id}}">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$soup->name}}</td>
                                <td class="px-6 py-4">{{$soup->description}}</td>
                                <td class="px-6 py-4">
                                    @livewire('rating', ['rating' => $soup->rating, 'soupId' => $soup->id], key('rating-' . $soup->id))
                                </td>
                                <td class="px-6 py-4">£{{$soup->costWithVat()}}</td>
                                <td class="px-6 py-4">
                                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" wire:click="editSoup({{$soup->id}})">
                                        Edit
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="deleteSoup({{$soup->id}})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td>No soups found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
