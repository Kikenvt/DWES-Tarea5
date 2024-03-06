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

                    <table class="table auto">
                        <thead>
                            <tr class="border-b-2 border-orange-400">
                                <th>Usuario</th>
                                <th>Ítem</th>
                                <th>Fecha de préstamo</th>
                                <th>Fecha de devolución</th>
                                <th>Fecha de retorno</th>
                            </tr>
                        </thead>
                        @foreach ($loans as $loan)
                        <tr>
                            <td>{{ $users->find($loan->user_id)->name }}</td>
                            <td>{{ $items->find($loan->item_id)->name }}</td>
                            <td>{{ $loan->checkout_date }}</td>
                            <td>{{ $loan->due_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-center text-sm font-medium ">
                                    @if ($loan->returned_date === null)
                                        @if ($loan->user_id === Auth::id())
                                        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600 ">
                                           Devolver
                                        </button>
                                        </form>
                                        @else
                                    <span class="text-red-600">No devuelto</span>
                                    @endif
                                    @else
                                    {{ $loan->returned_date }}
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
    </div>
</x-app-layout>
