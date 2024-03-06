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
                    @if($user->id == Auth::user()->id)
                    <button type="submit" class="text-black border rounded-xl bg-green-700 hover:bg-slate-600 hover:text-green-700 py-2 px-4">Devolver</button>
                    @else
                    <div class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Prestado a {{$loan->user->name}}</div>
                    @endif
                </form>
                <a href="{{ url()->previous() }}" class="text-black border rounded-xl bg-orange-400 hover:bg-slate-800 hover:text-orange-400 py-2 px-4">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
