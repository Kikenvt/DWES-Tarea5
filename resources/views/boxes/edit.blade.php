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
                    <h1>Editar Caja</h1>
                    <br>
                    <hr><br>
                    <form action="{{ route('boxes.update',$box->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="label">Etiqueta</label>
                        <input type="text" class="form-control text-black" name="label" id="name" value="{{ $box->label }}" required>
                        <label for="location">Ubicación</label>
                        <input type="text" class="form-control text-black" name="location" id="location" value="{{ $box->location }}" required required>
                        <br><br>
                        <hr><br>
                        <button type="submit" class="text-black border rounded bg-green-600 hover:bg-green-300 hover:text-green-900 py-2 px-4">Actualizar</button>
                    </form>
                    <br>
                    <a href="{{ route('boxes.index') }}" class="text-black border rounded bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver atrás</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
