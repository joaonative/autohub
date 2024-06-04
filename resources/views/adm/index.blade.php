@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
    @if (session('success'))
        <div id="successMessage" class="fixed top-12 inset-x-0 flex items-center justify-center">
            <span class="bg-success text-dark p-5 rounded-lg text-xl font-bold shadow-2xl">
                {{ session('success') }}
            </span>
        </div>

        <script>
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                successMessage.parentNode.removeChild(successMessage);
            }, 2000);
        </script>
    @endif

    <section class="flex flex-col gap-6">
        <h1 class='lg:text-center capitalize'>Showing {{ count($cars) }} owned by <span
                class="text-primary">{{ auth()->user()->company_name }}</span></h1>

        @foreach ($cars as $car)
            <div class='flex lg:flex-row flex-col bg-dark p-6 rounded-xl gap-6'>
                <img src="{{ $car->imageUrl }}" alt="{{ $car->name }} photo"
                    class="w-96 object-cover h-48 rounded-xl bg-primary">
                <div class="flex flex-col lg:justify-between gap-2 w-full">
                    <div class="flex items-center justify-between ">
                        <h2 class="text-primary font-bold">${{ $car->price }}</h2>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-full bg-red-500 flex justify-center"><ion-icon
                                    name="trash-sharp" class="text-xl"></ion-icon>
                            </button>
                        </form>
                    </div>
                    <h2 class="font-bold">{{ $car->name }}</h2>
                    <div class="flex lg:flex-row flex-col items-center lg:gap-6 gap-2">
                        <a href="{{ route('cars.show', $car->id) }}"
                            class=" text-xl font-bold bg-primary text-darker flex items-center gap-2 px-4 py-2 rounded-lg w-full justify-center">View
                            Product <ion-icon name="arrow-forward-sharp"></ion-icon></a>
                        <a href="{{ route('admin.edit', $car->id) }}"
                            class=" text-xl font-bold bg-cyan-500 text-darker flex items-center gap-2 px-4 py-2 rounded-lg w-full justify-center">Edit
                            Now
                            <ion-icon name="pencil-sharp"></ion-icon></a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
