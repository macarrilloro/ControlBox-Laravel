<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->name }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <x-validation-errors class="mb-4" />
                    <h1 class="text text-lg text-center">Información del libro</h1>
                    <div>
                        <div class="flex items-center w-full">
                            <div class="bg-indigo-300 flex">
                                <img class="object-cover h-30 w-40" src="{{ asset('storage/' . $book->photo_path) }}">
                            </div>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                <a href="">{{ $book->name }}</a>
                            </h2>
                        </div>
                        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
                            {{ $book->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <h1 class="text text-lg text-center">Categoría(s)</h1>
                    <div>
                        @if ($book->categories->count() > 0)
                            @foreach ($book->categories as $category)
                                <div class="flex items-center w-full mt-2">
                                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                        <a href="{{route('categories.show',$category->category)}}">{{ $category->category->name }}</a>
                                    </h2>
                                </div>
                            @endforeach
                        @else
                            <div>
                                Todavía no hay categorías conocidas para este libro
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <h1 class="text text-lg text-center">Autor(es)</h1>
                    <div>
                        @if ($book->authors->count() > 0)
                            @foreach ($book->authors as $author)
                                <div class="flex items-center w-full mt-2">
                                    <div class="bg-indigo-300 flex">
                                        <img class="object-cover h-20 w-30"
                                            src="{{ asset('storage/' . $author->author->profile_photo_path) }}">
                                    </div>
                                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                        <a href="{{route('authors.show',$author->author)}}">{{ $author->author->name }}</a>
                                    </h2>
                                </div>
                            @endforeach
                        @else
                            <div>
                                Todavía no hay autores conocidos para este libro
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <h1 class="text text-lg text-center">Reseñas</h1>
                    <div>
                        @if ($book->reviews->count() > 0)
                            @foreach ($book->reviews as $review)
                                <div class="mt-2 border-dotted border-2 border-indigo-600">
                                    <div>
                                        <h2 class="text-xl text-gray-900">
                                            <span>{{ $review->description }}</span>
                                        </h2>
                                    </div>
                                    <div>
                                        <h3 class="text-sm text-gray-900">
                                            <span>Calificación {{ $review->qualification }} estrellas</span>
                                        </h3>
                                    </div>
                                    <p class="mt-1 text-gray-600 text-sm leading-relaxed">
                                        {{ $review->user->name }} - {{ $review->updated_at }}
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div>
                                Todavía no hay reseñas registradas para este libro
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user())
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-gray-200 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        <h1 class="text text-lg">Deja tu reseña</h1>
                        <div>
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <x-input class="w-full" placeholder="Describe tu reseña" name="description"
                                        value="{{ old('name') }}" autocomplete="off"/>
                                    <x-input name="book_id" value="{{ old('book_id', $book->id) }}" hidden/>
                                    <x-input name="user_id" value="{{ old('user_id', Auth::user()->id) }}" hidden/>
                                </div>
                                <div class="mb-5">
                                    <h1 class="text text-lg">Calificación</h1>
                                    <x-input class="w-full" type="number" min=0 max=5 name="qualification"
                                    value="{{ old('qualification') }}" />
                                </div>
                                <div class="flex justify-end">
                                    <x-button>
                                        Guardar
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
