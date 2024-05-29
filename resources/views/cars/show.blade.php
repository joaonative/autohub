@extends('layout')

@section('title', 'Car Details')

@section('content')
    <div class='-space-y-20'>
        <img src='{{ $car->imageUrl }}' alt='{{ $car->name }} photo' class='object-cover h-96 w-full'
            style="background-color: {{ $car->color }}">
        <div class='3xl:px-80 lg:px-32 md:px-16 px-5 flex'>
            <section class='rounded-t-3xl bg-dark lg:px-12 px-6 py-6 flex flex-col lg:gap-12'>
                <div class='flex items-center justify-between'>
                    <h1 class='text-primary'>${{ $car->price }}</h1>
                    @if ($isInCart)
                        <a href='{{ route('cart.show') }}'
                            class=" text-xl font-bold bg-success text-darker flex items-center gap-2 px-4 py-2 rounded-lg">
                            In Cart <ion-icon name="cart-sharp"></ion-icon>
                        </a>
                    @else
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <button class='font-bold text-xl justify-center'>Add to Cart <ion-icon
                                    name="cart-sharp"></ion-icon></button>
                            <input type="text" class="hidden" name="productId" id="productId"
                                value="{{ $car->id }}">
                            <input type="text" class="hidden" name="userId" id="userId"
                                value="{{ auth()->user()->id }}">
                        </form>
                    @endif
                </div>
                <div class="flex flex-col lg:gap-20 gap-10">
                    <div class="flex flex-col gap-5">
                        <h1>{{ $car->name }}</h1>
                        <div class="flex lg:flex-row flex-col items-start lg:justify-between gap-5">
                            <blockquote class='text-gray font-medium'>
                                {{ $car->description }}
                            </blockquote>
                            <div class='grid grid-cols-3 grid-rows-3 lg:gap-12 gap-5 lg:justify-center'>
                                <span class="font-medium">
                                    <p class="text-gray">Year</p>
                                    <h2>{{ $car->year }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">KM</p>
                                    <h2>{{ $car->km }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">State</p>
                                    <h2>{{ $car->state ? 'Used' : 'New' }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">Color</p>
                                    <h2 style=" color: {{ $car->color }}">{{ $car->color }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">Brand</p>
                                    <h2>{{ $car->brand }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">BodyWork</p>
                                    <h2>{{ $car->type }}</h2>
                                </span>

                                <span class="font-medium">
                                    <p class="text-gray">Transmission</p>
                                    <h2>{{ $car->transmission ? 'Automatic' : 'Manual' }}</h2>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='flex flex-col gap-6'>
                        <h1>Learn More About <span class="text-primary">{{ $adm->name }}</span></h1>
                        <div class="flex lg:flex-row flex-col lg:items-center lg:justify-between gap-5">
                            <ul class="flex flex-col gap-5">
                                <li class="flex items-center gap-2"> <ion-icon name="mail-sharp"
                                        class="text-xl text-primary"></ion-icon>
                                    {{ $adm->contact_email }}</li>
                                <li class="flex items-center gap-2"> <ion-icon name="call-sharp"
                                        class="text-xl text-primary"></ion-icon>
                                    {{ $adm->phone }}</li>
                                <li class="flex items-center gap-2"> <ion-icon name="pin-sharp"
                                        class="text-xl text-primary"></ion-icon>
                                    {{ $adm->location }}</li>
                                <li class="flex items-center gap-2"> <ion-icon name="globe-sharp"
                                        class="text-xl text-primary"></ion-icon> <a href="{{ $adm->site }}"
                                        class="overflow-ellipsis" class="text-xl text-primary">{{ $adm->site }}</a>
                                </li>
                            </ul>
                            <div class="flex flex-col lg:items-center gap-2">
                                <img src="{{ $adm->imageUrl }}" alt="{{ $adm->name }} photo"
                                    class="object-cover lg:w-52 lg:h-52 w-32 h-32 rounded-full"></img>
                                <h2 class="font-bold">{{ $adm->company_name }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
