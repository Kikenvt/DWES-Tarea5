<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex justify-center bg-gray-900 h-min-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
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


                    <div class="p-6 text-white">
                        <table class="table auto">
                            <thead>
                                <tr class="border-b-2 border-orange-400">
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
                                        <a href="{{ route('items.show', $item->id) }}" class=" text-orange-400 font-bold">Ver</a>
                                        <a href="{{ route('items.edit', $item->id) }}" class=" text-orange-400 font-bold">Editar</a>
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
                    </div>

                        <a href="{{ route('boxes.create') }}" class="font-bold text-black border rounded-xl bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Editar Caja</a>


                        <a href="{{ route('boxes.create') }}" class="font-bold text-red-950 border rounded-xl bg-red-700 hover:bg-red-950 hover:text-red-700 py-2 px-4">Eliminar caja</a>


                        <a href="{{ route('boxes.index') }}" class="font-bold text-black border rounded-xl bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver a la lista</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
