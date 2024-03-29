@extends('layout')

@section('content')

    <body class="flex flex-col gap-64 h-screen justify-center items-center">
        <a href="/add/movie" class="absolute top-0 left-0 translate-y-1/2 translate-x-full">
            <ion-icon name="arrow-back-outline" class="text-6xl text-white hover:drop-shadow-xl">
            </ion-icon>
        </a>
        <form method="POST" action="/admin/movies/{{ $movie->id }}" class="flex items-center w-[20%]">
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-12 w-full bg-gray-400 p-12 rounded-xl drop-shadow-2xl">


                <p class="block text-center mb-4 uppercase font-semibold text-3xl text-gray-800">
                    {{ __('translate.movie_name') }}
                </p>
                <div class="flex flex-col relative">
                    <label for="name_en"
                        class="block mb-2 uppercase font-semibold text-2xl
                        text-gray-800">{{ __('translate.eng') }}</label>
                    <input type="text" name="name_en" class="border border-gray-400 p-2 w-full rounded-lg h-16"
                        id="name_en">

                    @error('name_en')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col relative">
                    <label for="name_en"
                        class="block mb-2 uppercase font-semibold text-2xl
                        text-gray-800">{{ __('translate.ka') }}</label>
                    <input type="text" name="name_ka" class="border border-gray-400 p-2 w-full rounded-lg h-16"
                        id="name_ka">
                    @error('name_ka')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-white flex items-center justify-center text-gray-800 uppercase font-bold text-2xl py-4 px-10 rounded-2xl hover:bg-gray-500 hover:text-white w-1/2 self-center mt-8 shadow-md">{{ __('translate.update_movie') }}
                </button>
            </div>


        </form>



        <x-languages></x-languages>

        <x-success></x-success>
    </body>
@endsection
