<x-guest-layout>

    <form action="{{route('edite.list',$the_list->id)}}" method="POST">
        @csrf

        <!-- Name -->
        <div>
           {{-- // <x-text-input name=id value ={{$workspace->id}} class ="hidden"> --}}
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value='{{$the_list->title}}' required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Save') }}
        </x-primary-button>
        </div>

    </form>
</x-guest-layout>
