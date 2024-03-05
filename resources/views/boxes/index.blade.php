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


                    <table class="table auto">
                        <thead>
                            <tr class="border-b-2 border-orange-400">
                                <th>Etiqueta</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                @foreach($boxes as $box)

                                <td class="px-6 py-4">
                                    <div >{{$box->label}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div >
                                      {{$box->location}}
                                    </div>
                                </td>
                                <td class="flex py-3 space-x-10 sm:-my-px sm:ms-10">
                                    <a href="{{ route('boxes.show', $box->id) }}" class=" text-orange-400 font-bold">Ver</a>
                                    <a href="{{ route('boxes.edit', $box->id) }}" class=" text-orange-400 font-bold">Editar</a>
                                    <form action="{{ route('boxes.destroy', $box->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" text-red-800 font-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end"><a href="{{ route('boxes.create') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Nueva Caja</a></div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
