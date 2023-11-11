<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Manage Settings</h1>

                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        @method('POST')

                        <!-- Header Field -->
                        <div class="mb-4">
                            <label for="header" class="block text-gray-600 text-sm font-semibold mb-2">Header:</label>
                            <textarea id="header" name="header" class="w-full border rounded-lg p-2">{{ $settings->header }}</textarea>
                        </div>

                        <!-- Footer Field -->
                        <div class="mb-4">
                            <label for="footer" class="block text-gray-600 text-sm font-semibold mb-2">Footer:</label>
                            <textarea id="footer" name="footer" class="w-full border rounded-lg p-2">{{ $settings->footer }}</textarea>
                        </div>

                        <!-- New Fields for Ads Settings -->
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="mb-4">
                                <label for="CreatePageAds{{ $i }}" class="block text-gray-600 text-sm font-semibold mb-2">Create Page Ads {{ $i }}:</label>
                                <textarea id="CreatePageAds{{ $i }}" name="CreatePageAds{{ $i }}" class="w-full border rounded-lg p-2">{{ $settings->{"CreatePageAds{$i}"} }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="HomePageAds{{ $i }}" class="block text-gray-600 text-sm font-semibold mb-2">Home Page Ads {{ $i }}:</label>
                                <textarea id="HomePageAds{{ $i }}" name="HomePageAds{{ $i }}" class="w-full border rounded-lg p-2">{{ $settings->{"HomePageAds{$i}"} }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="SharePageAds{{ $i }}" class="block text-gray-600 text-sm font-semibold mb-2">Share Page Ads {{ $i }}:</label>
                                <textarea id="SharePageAds{{ $i }}" name="SharePageAds{{ $i }}" class="w-full border rounded-lg p-2">{{ $settings->{"SharePageAds{$i}"} }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="ShowPageAds{{ $i }}" class="block text-gray-600 text-sm font-semibold mb-2">Show Page Ads {{ $i }}:</label>
                                <textarea id="ShowPageAds{{ $i }}" name="ShowPageAds{{ $i }}" class="w-full border rounded-lg p-2">{{ $settings->{"ShowPageAds{$i}"} }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="showVotePageAds{{ $i }}" class="block text-gray-600 text-sm font-semibold mb-2">Show Vote Page Ads {{ $i }}:</label>
                                <textarea id="showVotePageAds{{ $i }}" name="showVotePageAds{{ $i }}" class="w-full border rounded-lg p-2">{{ $settings->{"showVotePageAds{$i}"} }}</textarea>
                            </div>
                        @endfor
                        <!-- End of New Fields -->

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
