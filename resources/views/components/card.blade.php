<div class="bg-dark rounded-xl p-6 flex flex-row gap-6">
    <img src={{ $imageUrl }} class="w-96 object-cover rounded-xl" />
    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between">
            <h2 class="text-primary">{{ $price }}</h2>
            <button disabled={{ $isLiked }}
                class="bg-primary text-darker disabled:bg-red-500 disabled:text-white rounded-full p-2">
                <ion-icon name="heart-sharp" class="text-xl"></ion-icon>
            </button>
        </div>
        <h2>{{ $name }}</h2>
        <div class="flex items-center justify-between">
            <span class="flex items-center gap-2 text-gray text-base">
                <ion-icon name="car-sport-sharp" class="text-xl"></ion-icon>
                {{ $type }}
            </span>
            <span class="flex items-center gap-2 text-gray text-base">
                <div class="rounded-full h-6 w-6" style="background-color: {{ $color }}" />
                {{ $colorName }}
            </span>
            <span class="flex items-center gap-2 text-gray text-base">
                <ion-icon name="calendar-sharp" class="text-xl"></ion-icon>
                {{ $year }}
            </span>
        </div>
        <button class="w-full justify-center">View Product <ion-icon name="arrow-forward-sharp"></ion-icon>
        </button>
    </div>
</div>
