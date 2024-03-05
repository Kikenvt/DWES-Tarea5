<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center bg-gray-900 h-min-full">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="container p-6 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <h1 class="text-2xl text-white font-bold mb-4">Editar Item</h1>
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-white text-sm font-bold mb-2">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-white text-sm font-bold mb-2">Descripcion</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ $item->description }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-white text-sm font-bold mb-2">Precio</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $item->price }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="box_id" class="block text-white text-sm font-bold mb-2">Caja</label>
                                <select name="box_id" id="box" class="rounded px-3 w-full">
                                    <option value="">Selecciona una caja</option>
                                    @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="picture" class="block text-white text-sm font-bold mb-2">Foto</label>
                                <input type="file" class="form-control-file text-white" name="picture" id="picture">
                                <img src="{{ Storage::url($item->picture) }}" alt="picture" width="100" height="100" class="text-white">
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('items.index') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4" >Back</a>
                                <button type="submit" class="text-black border rounded bg-green-600 hover:bg-green-300 hover:text-green-900 py-2 px-4">Update</button>
                            </div>
                        </form>
                    </div>

            </div>

    </div>
</x-app-layout>
