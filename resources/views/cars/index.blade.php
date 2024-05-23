@extends('layout')

@section('title', 'Cars')

   

@section('content')

<section class='flex lg:flex-row flex-col flex-grow lg:items-start gap-6'>
    <form class='flex flex-col items-start gap-6 overflow-x-hidden overflow-y-scroll p-4 h-4/5 bg-dark rounded-xl' action="{{route('cars.search')}}" method="POST">
    @csrf
        <div class='flex flex-col gap-2 lg:w-64 w-full'>
            <h2 class='font-bold'>Search Car Name</h2>
            <span class='border-2 border-primary rounded-lg p-2 flex items-center justify-between'>
                <input class='border-none p-0 outline-none w-full' autocomplete='off' type='text' name='name' id='name' />
                <ion-icon name='search-sharp' class='text-2xl text-primary' />
            </span>
        </div>
        <div class='flex flex-col gap-2 lg:w-64 w-full'>
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
        <details class='flex flex-col gap-2 lg:w-64 w-full cursor-pointer'>
            <summary class="font-bold lg:text-2xl text-lg;">Bodywork</summary>
            <div class='flex flex-col items-start gap-1'>
                <label class='cursor-pointer flex items-center gap-2 w-full'>
                    <input class="cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='checkbox' id="type_all" name='type_all' value=true>
                    <h3>All</h3>
                </label>
                @foreach($types as $type)
                <label class='cursor-pointer flex items-center gap-2 w-full'>
                    <input class="type-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='checkbox' name='type[]' value='{{$type}}'>
                    <h3>{{$type}}</h3>
                </label>
                @endforeach            
            </summary>
            </div>
        </details>
        <details>
            <summary class="font-bold lg:text-2xl text-lg;">State</summary>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="state_both" name='state' value=false>
                <h3>Both</h3>
            </label>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="state-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="state_new" name='state' value=0>
                <h3>New</h3>
            </label>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="state-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="state_used" name='state' value=1>
                <h3>Used</h3>
            </label>
        </details>
        <details>
            <summary class="font-bold lg:text-2xl text-lg;">Transmission</summary>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="trn_both" name='transmission' value=false>
                <h3>Both</h3>
            </label>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="state-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="trn_manual" name='transmission' value=0>
                <h3>Manual</h3>
            </label>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="state-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='radio' id="trn_auto" name='transmission' value=1>
                <h3>Automatic</h3>
            </label>
        </details>
        <details>
            <summary class="font-bold lg:text-2xl text-lg;">Colors</summary>
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" type='checkbox' id="color_all" name='color_all' value=true>
                <h3>All</h3>
            </label>
            @foreach($colors as $colorName => $color)
            <label class='cursor-pointer flex items-center gap-2 w-full'>
                <input class="color-checkbox cursor-pointer accent-gray rounded-full h-6 w-6 checked:accent-primary" style="accent-color: {{$color}};" type='checkbox' name='color[]' value='{{$color}}'>
                <h3 class="capitalize">{{$colorName}}</h3>
            </label>
            @endforeach
        </details>
        <button type="submit" class="w-full justify-center">Filter Now</button>
    </form>
        <div class='flex-grow flex flex-col gap-4'>
            @foreach($cars as $car)
                <x-card :car="$car" />
            @endforeach
        </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeAllCheckbox = document.getElementById('type_all');
        const typeCheckboxes = document.querySelectorAll('.type-checkbox');

        typeAllCheckbox.addEventListener('change', function () {
            if (typeAllCheckbox.checked) {
                typeCheckboxes.forEach(checkbox => checkbox.checked = false);
            }
        });

        typeCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    typeAllCheckbox.checked = false;
                }
            });
        });

        const colorAllCheckBoxes = document.getElementById('color_all');
        const colorsCheckBoxes = document.querySelectorAll('.color-checkbox');

        colorAllCheckBoxes.addEventListener('change', function () {
            if (colorAllCheckBoxes.checked) {
                colorsCheckBoxes.forEach(checkbox => checkbox.checked = false);
            }
        });

        colorsCheckBoxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    colorAllCheckBoxes.checked = false;
                }
            });
        });
    });
</script>
@endsection