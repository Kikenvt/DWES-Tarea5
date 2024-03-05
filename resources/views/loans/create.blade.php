<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Préstamos') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center bg-gray-900 h-min-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1>Nuevo Préstamo</h1>
                    <br>
                    <hr><br>
                    <form action="{{ route('loans.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <label for="Item">Item</label>
                        <select class="form-control text-black" name="item_id" id="item_id" required>
                            <option value="">Selecciona un ítem</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="due_date">Fecha de devolucion esperada</label>
                        <input type="date" class="form-control text-black" name="due_date" id="due_date" required>
                        <br><br>
                        <hr><br>
                        <button type="submit" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Crear préstamo</button>
                    </form>
                    <br>
                    <a href="{{ route('items.index') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver a la página principal sin crear nada.</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
