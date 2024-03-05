<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 items-center bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-7 bg-gray-800 text-white rounded-lg shadow-lg w-full">

                    <div class="container flex flex-col">
                        <h1 class="text-2xl font-bold mb-4">{{$item->name}}</h1>
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-orange-100 text-sm font-bold mb-2">Nombre</label>
                                <div class="">{{$item->name}}</div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-orange-100 text-sm font-bold mb-2">Descripcion</label>
                                <div class="">{{$item->description}}</div>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-orange-100 text-sm font-bold mb-2">Precio</label>
                                <div class="">{{$item->price}}€</div>
                            </div>
                            <div class="mb-4">
                                <label for="box_id" class="block text-orange-100 text-sm font-bold mb-2">Caja</label>
                                @if ($item->box)
                                    <div class="">{{$item->box->label}}</div>
                                @else
                                    <div class="">Ninguna caja</div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="picture" class="block text-orange-100 text-sm font-bold mb-2">Foto</label>
                                @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                            </div>
                            <div>
                                <a href="{{ route('items.edit', $item->id) }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Editar</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" text-black border rounded bg-red-600 hover:bg-red-300 hover:text-red-600 py-2 px-4">Delete</button>
                                        </form>
                                <a href="{{ route('items.index') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver a la lista</a>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
