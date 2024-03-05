<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <label for="label">Label:</label>
                    {{$box->label}}
                    <br>
                    <label for="location">Location: </label>{{$box->location}}

                    @if (Session::get('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif


                    {{-- Agrega dd($boxes) aquí para verificar la variable --}}


                    <table class="table auto">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nombre</th>
                                <th>Caja</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($box->items as $item)

                            <tr>
                            <td class="px-6 py-4">
                                    <div class="flex justify-center h-20 w-20">
                                        @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">{{$item->name}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="">
                                        {{$box->label}}
                                    </div>
                                </td>
                                <td class="flex px-6 py-10 space-x-10 sm:-my-px sm:ms-10">
                                    <a href="{{ route('items.show', $item->id) }}" class="text-blue-800 font-bold">Ver</a>
                                    <a href="{{ route('items.edit', $item->id) }}" class="text-blue-800 font-bold">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" text-red-800 font-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                        <a href="{{ route('boxes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar Caja</a>


                        <a href="{{ route('boxes.create') }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Eliminar caja</a>


                        <a href="{{ route('boxes.index') }}" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver a la lista</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
