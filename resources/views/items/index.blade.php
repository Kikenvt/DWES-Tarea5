<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <!--Los comentarios son como en html, aqui empieza el div de Tailwind para el margen-->
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Session::get('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif

                    <!--Aqui pongo un anchor para crear un nuevo item. basicamente te lleva a la pagina create.blade.php-->
                    <div class="flex justify-center mb-4"><a href="{{ route('items.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nuevo Item</a></div>
                    <!--Pongo un buscador dinamico-->
                    <div class="flex justify-center"><input type="text" class="form-control " placeholder="Buscar..." id="searchInput"></div>
                    <!--Aqui traigo una tabla de la pagina de tailwind.-->
                    <table class="table auto">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Caja</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($items as $item)
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
                                    <div class="flex justify-center h-20 w-20">{{$item->name}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center h-20 w-20">
                                        @isset($item->box)
                                        {{$item->box->label}}
                                        @else
                                        No tiene caja
                                        @endisset
                                    </div>
                                </td>
                                <td class="flex py-4 space-x-10 sm:-my-px sm:ms-10">
                                    @if ($item->box)
                                    <a href="{{ route('items.show', $item->id) }}" class=" text-blue-800 font-bold">Ver</a>
                                    @else
                                    <span class="text-gray-400">
                                        No disponible</span>
                                    @endif
                                    <a href="{{ route('items.edit', $item->id) }}" class=" text-blue-800 font-bold">Editar</a>
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
            </div>
        </div>
    </div>

    <!--debo mirar donde meter el script  es del buscador dinamico lo hizo copilot yo esto en la vida lo saco wtf!?-->
    <script>
        // Get the input element
        let searchInput = document.getElementById('searchInput');

        // Add event listener for input change
        searchInput.addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('table tbody tr');

            // Loop through each table row
            tableRows.forEach(function(row) {
                let itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                let boxLabel = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                // Show/hide rows based on search value
                if (itemName.includes(searchValue) || boxLabel.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
