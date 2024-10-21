<x-guest-layout>
    <form action="{{route('store.list',$boarde->id)}}" method="POST">
        @csrf

        <!-- Name -->
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="name" :value="__('list title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Save') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
