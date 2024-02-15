<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Libros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <div class="items-center w-full">
                        <form action="{{ route('reviews.update', $review) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <x-label class="mb-2">
                                    Descripción
                                </x-label>
                                <x-input class="w-full" placeholder="Ingrese la descripción" name="description"
                                    value="{{ old('description', $review->description) }}" />
                            </div>
                            <div class="mb-4">
                                <x-label class="mb-2">
                                    Calificación
                                </x-label>
                                <x-input class="w-full" type="number" min=0 max=5 name="qualification"
                                    value="{{ old('qualification', $review->qualification) }}" />
                            </div>
                            <div class="flex justify-end">
                                <x-danger-button onclick="confirmDelete()">
                                    Eliminar
                                </x-danger-button>
                                <x-button class="ml-2">
                                    Actualizar
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="{{ route('reviews.destroy', $review) }}" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                </form>
                @push('js')
                    <script>
                        function confirmDelete() {
                            document.getElementById('delete-form').submit();
                        }
                    </script>
                @endpush
            </div>
        </div>
    </div>
</x-app-layout>
