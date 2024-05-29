<div class='flex flex-col'>
    <div class="bg-dark rounded-xl p-6 flex lg:flex-row flex-col lg:gap-6 gap-3 w-full">
        <img src={{ $car->imageUrl }} class="w-full h-48 object-cover rounded-xl"
            style="background-color: {{ $car->color }}">
        <div class="flex flex-col gap-3 lg:justify-between w-full">
            <div class="flex items-center justify-between">
                <h2 class="text-primary">${{ $car->price }}</h2>
            </div>
            <h2>{{ $car->name }}</h2>
            <div class="flex flex-row items-center justify-between">
                <span class="flex items-center gap-2 text-gray text-base">
                    <ion-icon name="car-sport-sharp" class="text-xl"></ion-icon>
                    @if ($car->state)
                        Used
                    @else
                        New
                    @endif
                </span>
                <span class="flex items-center gap-2 text-gray text-base">
                    <div class="rounded-full h-6 w-6" style="background-color: {{ $car->color }}";></div>
                    {{ $car->colorName }}
                </span>
                <span class="flex items-center gap-2 text-gray text-base">
                    <ion-icon name="calendar-sharp" class="text-xl"></ion-icon>
                    {{ $car->year }}
                </span>
            </div>
            <button class="w-full justify-center">
                <a class='flex-grow flex justify-center items-center gap-2'
                    href='{{ route('cars.show', ['id' => $car->id]) }}'>View Product <ion-icon
                        name="arrow-forward-sharp"></ion-icon></a>
            </button>
        </div>
    </div>
</div>
