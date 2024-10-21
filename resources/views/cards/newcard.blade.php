<x-guest-layout>
    <form action="{{route('store.card',$list->id)}}" method="POST">
        @csrf

        <!-- text -->
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="text" :value="__('card')" />
            <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('text')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="description_photo" :value="__('description_photo')" />
            <x-text-input id="description_photo" class="block mt-1 w-full" type="text" name="description_photo" :value="old('description_photo')" required autofocus autocomplete="description_photo" />
            <x-input-error :messages="$errors->get('description_photo')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="color" :value="__('color')" />
            <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required autofocus autocomplete="color" />
            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="photo" :value="__('photo')" />
            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" :value="old('photo')" required autofocus autocomplete="photo" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="position" :value="__('position')" />
            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autofocus autocomplete="position" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="start_time" :value="__('start_time')" />
            <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" :value="old('start_time')" required autofocus autocomplete="start_time" />
            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="end_time" :value="__('end_time ')" />
            <x-text-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" :value="old('end_time')" required autofocus autocomplete="end_time" />
            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
        </div>
        <div>
            {{-- <x-text-input id="id" class="hidden" type="number" name="id" value='{{$workspace->id}}' required autofocus autocomplete="id" /> --}}

            <x-input-label for="completed" :value="__('completed ')" />
            <x-text-input id="completed" class="block mt-1 w-full" type="checkbox" name="completed" :value="old('completed')" required autofocus autocomplete="completed" />
            <x-input-error :messages="$errors->get('completed')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Save') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
