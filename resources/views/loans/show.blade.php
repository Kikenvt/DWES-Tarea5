<x-app-layout>

<x-slot name="header">
<div class="flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Detalles del préstamo</h1>

            <p class="mb-2 text-gray-600"><strong>ID del préstamo:</strong> {{ $loan->id }}</p>
            <p class="mb-2 text-gray-600"><strong>Fecha de creación:</strong> {{ $loan->created_at }}</p>
            <p class="mb-2 text-gray-600"><strong>Fecha de vencimiento:</strong> {{ $loan->due_date }}</p>

            @if($loan->item)
                <p class="mb-2 text-gray-600"><strong>ID del artículo:</strong> {{ $loan->item->id }}</p>
                <p class="mb-2 text-gray-600"><strong>Nombre del artículo:</strong> {{ $loan->item->name }}</p>
            @endif

            <div class="flex justify-between mt-6">
                <form method="POST" action="{{ route('loans.update', $loan->id) }}">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Devolver producto</button>
                </form>
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
