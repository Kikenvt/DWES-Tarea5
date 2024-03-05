<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center bg-gray-900 h-min-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 ">Añadir un nuevo item</h1>
                    <br><hr><br>
                    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control rounded-md text-black" name="name" id="name" required>
                        <label for="make">Descripción:</label>
                        <input type="text" class="form-control rounded-md text-black" name="description" id="description" required>
                        <label for="make">Precio:</label>
                        <input type="text" class="form-control rounded-md text-black" name="price" id="price" required>
                        <br><br><hr>
                        <label for="box_id">Nombre Caja</label>
                        <br>
                        <select name="box_id" id="box" class="rounded-md shadow-sm px-3 w-full text-black">
                            <option value="">Selecciona una caja</option>
                            @foreach ($boxes as $box)
                            <option value="{{ $box->id }}">{{ $box->label }}</option>
                            @endforeach
                        </select>
                        <br><br><hr>
                        <label for="picture">Picture</label>
                        <br>
                        <input type="file" class="form-control-file" name="picture" id="picture">
                        <br><br>
                        <button type="submit" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Añadir</button>
                    </form>
                    <br>
                    <a href="{{ route('items.index') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver.</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
