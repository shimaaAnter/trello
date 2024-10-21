<x-guest-layout>

    <form action="{{route('edite.workspace',$workspace->id)}}" method="POST">
        @csrf

        <!-- Name -->
        <div>
           {{-- // <x-text-input name=id value ={{$workspace->id}} class ="hidden"> --}}
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value='{{$workspace->name}}' required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Save') }}
        </x-primary-button>
        </div>

    </form>
</x-guest-layout>
