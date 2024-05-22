@extends('layout')

@section('title', 'Cars')

   

@section('content')

<section class='flex items-start gap-6'>
    <form class='flex flex-col items-start gap-6 overflow-x-hidden overflow-y-scroll p-4 h-4/5 bg-dark rounded-xl'>
    @csrf
        <div class='flex flex-col gap-2 w-64'>
            <h2 class='font-bold'>Search</h2>
            <span class='border-2 border-primary rounded-lg p-2 flex items-center justify-between'>
                <input class='border-none p-0 outline-none w-full' autocomplete='off' type='text' name='name' id='name' />
                <ion-icon name='search-sharp' class='text-2xl text-primary' />
            </span>
        </div>

        <div class='flex flex-col gap-2 w-64'>
            <h2 class='font-bold'>Price Range</h2>
            <span class='border-2 border-primary rounded-lg p-2 flex items-center gap-1'>
                <p class='text-primary w-20'>Min $ |</p>
                <input class='border-none p-0 outline-none w-full' autocomplete='off' type='number' name='min' id='min' />
            </span>
            <span class='border-2 border-primary rounded-lg p-2 flex items-center gap-1'>
                <p class='text-primary w-20'>Max $ |</p>
                <input class='border-none p-0 outline-none w-full' autocomplete='off' type='number' name='max' id='max' />
            </span>
        </div>

        <details class='flex flex-col gap-2 w-64 cursor-pointer'>
            <summary class='flex flex-col gap-1'>
                <input class='cursor-ponter bg-gray rounded-full checked:bg-primary' type='checkbox' name='transmission' value=0 id='transmission_automatic'>
                <input type='checkbox' name='transmission' value=1 id='transmission_automatic'>
            </summary>
        </details>

    </form>
        <div class='flex-grow flex flex-col gap-4'>
            @foreach($cars as $car)
                <x-card :car="$car" />
            @endforeach
        </div>
</section>
@endsection