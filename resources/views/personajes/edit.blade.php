<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar personaje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('personajes.update', $personaje) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-input w-full" value="{{ $personaje->nombre }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="raza_id" class="block text-gray-700 text-sm font-bold mb-2">Raza:</label>
                            <select name="raza_id" id="raza_id" class="form-select w-full" required>
                                @foreach ($razas as $raza)
                                <option value="{{ $raza->id }}" @if ($personaje->raza_id === $raza->id) selected @endif>{{ $raza->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="clase" class="block text-gray-700 text-sm font-bold mb-2">Clase:</label>
                            <input type="text" name="clase" id="clase" class="form-input w-full" value="{{ $personaje->clase }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="habilidades" class="block text-gray-700 text-sm font-bold mb-2">Habilidades:</label>
                            <textarea name="habilidades" id="habilidades" class="form-textarea w-full" required>{{ $personaje->habilidades }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-input w-full resize-none">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar personaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>