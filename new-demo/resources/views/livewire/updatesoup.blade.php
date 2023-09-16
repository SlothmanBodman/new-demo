<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form>
                    <label for="name" class="block text-white text-sm font-bold mb-2">
                        Name
                    </label>
                    <input type="text" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror

                    <label for="description" class="block text-white text-sm font-bold mb-2">
                        Description
                    </label>
                    <input type="text" wire:model="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('description')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror

                    <label for="rating" class="block text-white text-sm font-bold mb-2">
                        Rating
                    </label>
                    <input type="number" wire:model="rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('rating')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror

                    <label for="cost" class="block text-white text-sm font-bold mb-2">
                        Cost
                    </label>
                    <input type="number" wire:model="cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('cost')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror

                    <div>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="updateSoup()">
                            Update
                        </button>
                        <button class="bg-grey-200 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="cancelSoup()">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
</div>