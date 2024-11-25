@extends('layouts.base')

@section('content')

@can('create', App\Models\Pokemon::class)
<div class="flex items-center">
    <div class="py-88 mb-5 p-4">
  <a href="{{url('pokemon/create')}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Pokemon</a>
    </div>
</div>
@endcan

<div class="flex flex-wrap justify-center mt-10">
@foreach($pokemon as $entity)
    <div class="flex flex-wrap justify-center mt-10">
    <div class="p-4 max-w-sm">
    <div class="flex rounded-lg h-full bg-teal-400 p-8 flex-col">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $entity->name }}</h5>
        <span class="text-sm text-gray-500">{{ $entity->type }}</span>
        <span class="text-sm text-gray-500">{{ $entity->power }}</span>
            <span class="text-sm text-gray-500">{{ $entity->coach->name }}</span>
            <div class="flex mt-4 md:mt-6">
                    <a href="{{ url('pokemon/'.$entity->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Edit</a>
                    <form action="{{ url('pokemon/'.$entity->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Delete</button>
        </form>
        </div>
    </div>
</div>
</div>
</div>
@endforeach
@endsection

