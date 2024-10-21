<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Workspaces') }}

        </h2>
<button type="button" class="btn btn-block btn-secondary btn-lg"><a href="{{route('create.board',$workspace->id)}}">create Board</button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                        <ol>
                            @if($boardes)
                            @foreach ($boardes as $boarde)
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex justify-between h-16">
                                    <div class="flex">
                          <h3><a href="{{route('details.list',$boarde->id)}}"><li>{{$boarde->name}}</li></a></h3>
                          <button type="button" class="btn btn-block btn-dark"><a href="{{route('showedite.boarde',$boarde->id)}}">Edite</a></button>
                          <button type="button" class="btn btn-block btn-danger"><a href="{{route('delete.boarde',$boarde->id)}}">Delete</a></button>
                        </div>
                                </div>
                            </div>
                          @endforeach
                          @endif
                        </ol>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
