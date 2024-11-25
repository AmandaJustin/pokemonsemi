@extends('layouts.base')

@section('content')

<div class="flex items-start">
  <div class="py-8 mb-5 p-4">
    <a href="{{ url('coaches/create' )}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Coach</a>
  </div>
</div>

<div class="flex flex-wrap justify-center mt-10">
    @foreach($coaches as $entity)
        <div class="p-4 max-w-sm">
            <div class="flex rounded-lg h-full bg-teal-400 p-8 flex-col">
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $entity->name }}</h5>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ url('pokemon/'.$entity->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Edit</a>
                    <form action="{{ url('pokemon/'.$entity->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Delete</button>
                </div>
            </div>
        </div>
    @endforeach

    </div>
@endsection