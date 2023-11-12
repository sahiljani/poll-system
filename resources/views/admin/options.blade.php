<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Poll Options - {{ $poll->question }}</h1>

                    @foreach ($options as $option)
                        <div class="mb-4 p-4 border rounded shadow-md">
                            <p class="text-lg font-semibold">{{ $option->option_text }}</p>
                            <p class="text-gray-600">Votes: {{ $option->votes }}</p>
                            <form method="post"
                                action="{{ route('admin.polls.options.edit', [$poll->id, $option->id]) }}"
                                class="mt-2">
                                @csrf
                                @method('post')
                                <label for="votes" class="block text-sm font-medium text-gray-700">Edit Votes:</label>
                                <input type="number" name="votes" value="{{ $option->votes }}"
                                    class="mt-1 p-2 border rounded-md w-full" required>
                                <button type="submit"
                                    class="mt-2 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-white focus:outline-none focus:ring focus:border-green-700 active:bg-green-800">
                                    Update
                                </button>
                            </form>
                        </div>
                        <hr class="my-2">
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
