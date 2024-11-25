@extends('layouts.base')

@section('content')
    <form class="max-w-sm mx-auto" action="{{ url('pokemon/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" name="name" id="name" value="{{ $pokemon->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Tipo</label>
                <input type="text" name="type" id="type" value="{{ $pokemon->type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div> 
            <div class="mb-5">
                <label for="power" class="block mb-2 text-sm font-medium text-gray-900">Pontos de poder</label>
                <input type="number" name="power" id="power" value="{{ $pokemon->power }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
        <label for="coach_id" class="block mb-2 text-sm font-medium text-gray-900">Treinador</label>
        <select name="coach_id" id="coach_id">
            <option value="">Selecionador Treinador</option>
            @foreach ($coaches as $coach)
                @if($coaches->id === $pokemon->coach->id)
                    <option value="{{ $coach_id }}">{{ $coach->name }}</option>
                @else
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option> 
                @endif       
            @endforeach
        </select>
        </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submite">Editar Pokemon</button>
        </form>
@endsection

