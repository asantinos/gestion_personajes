<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los personajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Foto</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Raza</th>
                                <th class="px-4 py-2">Clase</th>
                                <th class="px-4 py-2">Creado por</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($personajes) > 0)
                            @foreach ($personajes as $personaje)
                            <tr>
                                @if ($personaje->imagen)
                                <td class="border px-4 py-2"><img src="{{ asset(Storage::url($personaje->imagen)) }}" alt="{{ $personaje->nombre }}" class="w-20 h-20 object-cover rounded-lg"></td>
                                @else
                                <td class="border px-4 py-2">
                                    <div class="flex items-center justify-center text-xs w-20 h-20 bg-neutral-300 text-neutral-500 rounded-lg">{{ $personaje->nombre}}</div>
                                </td>
                                @endif
                                <td class="border px-4 py-2">{{ $personaje->nombre }}</td>
                                <td class="border px-4 py-2">{{ $personaje->raza->nombre }}</td>
                                <td class="border px-4 py-2">{{ $personaje->clase }}</td>
                                <td class="border px-4 py-2">{{ $personaje->user->name }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex gap-1">
                                        <a href="{{ route('personajes.edit', $personaje) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="border px-4 py-2" colspan="6">No hay personajes</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>