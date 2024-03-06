<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 items-center justify-center bg-gray-900">
        <div class="mb-6 flex flex-row items-center justify-center">
            <a href="{{ route('items.create') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange py-2 px-4">Nuevo Item</a>
            <input type="text" class="form-control bg-gray-700 text-white ml-4" placeholder="Buscar..." id="searchInput">
        </div>

        <div class="py-8 px-16 flex overflow-hidden items-center justify-center w-full">

            <div class="p-7 bg-gray-800 text-white rounded-lg shadow-lg w-full">
                <table class="min-w-full w-full">
                    <thead class=" border-b-2 border-orange-400">
                        <tr>
                            <th class="py-4 px-7 border-b-3 border-gray-600 text-center">Imagen</th>
                            <th class="py-4 px-7 border-b-3 border-gray-600 text-center">Nombre</th>
                            <th class="py-4 px-7 border-b-3 border-gray-600 text-center">Caja</th>
                            <th class="py-4 px-7 border-b-3 border-gray-600 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="py-4 px-7 border-b border-gray-600">
                                <div class="flex justify-center">
                                    @if ($item->picture)
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                    @else
                                    <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                    @endif
                                </div>
                            </td>

                            <td class="py-4 px-7 border-b border-gray-600">
                                <div class="text-center">{{$item->name}}</div>
                            </td>
                            <td class="py-4 px-7 border-b border-gray-600">
                                <div class="text-center">
                                    @isset($item->box)
                                    {{$item->box->label}}
                                    @else
                                    No tiene caja
                                    @endisset
                                </div>
                            </td>
                            <td class="py-4 px-7 border-b border-gray-600">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('items.show', $item->id) }}" class="font-bold text-black border rounded-xl bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Ver</a>


                                    <a href="{{ route('items.edit', $item->id) }}" class="font-bold text-black border rounded-xl bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-bold text-red-950 border rounded-xl bg-red-700 hover:bg-red-950 hover:text-red-700 py-2 px-4">Eliminar</button>
                                    </form>
                                    @if ($item->loans()->whereNull('returned_date')->first())
                                    <a href="{{ route('loans.show', $item->loans()->whereNull('returned_date')->first()->id) }}" class="font-bold text-white border rounded-xl bg-purple-950 hover:bg-slate-500 hover:text-purple-950 py-2 px-4">Ver Préstamo</a>
                                    @else
                                    <a href="{{ route('loans.create', ['item_id' => $item->id]) }}" class="font-bold text-black border rounded-xl bg-green-700 hover:bg-black hover:text-green-700 py-2 px-4">Prestar</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-app-layout>


    <script>
        let searchInput = document.getElementById('searchInput');


        searchInput.addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('table tbody tr');


            tableRows.forEach(function(row) {
                let itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                let boxLabel = row.querySelector('td:nth-child(3)').textContent.toLowerCase();


                if (itemName.includes(searchValue) || boxLabel.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
