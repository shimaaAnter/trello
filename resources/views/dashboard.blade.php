<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Workspaces') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                        <ol>
                            @foreach ($workspaces as $workspace)
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex justify-between h-16">
                                    <div class="flex">
                          <h3><a href="{{route('details.workspace',$workspace->id)}}"><li>{{$workspace->name}}</li></a></h3>
                          <button type="button" class="btn btn-block btn-dark"><a href="{{route('showedite.workspace',$workspace->id)}}">Edite</a></button>
                          <button type="button" class="btn btn-block btn-danger"><a href="{{route('delete.workspace',$workspace->id)}}">Delete</a></button>
                        </div>
                                </div>
                            </div>
                          @endforeach
                        </ol>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
