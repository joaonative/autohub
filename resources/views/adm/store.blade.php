@extends('layout')

@section('title', 'Publish an Car')

@section('content')
    <section class="flex flex-col gap-5">
        <h1 class='lg:text-center capitalize'>Publish an Car as
            <span class="text-primary">{{ auth()->user()->company_name }}</span>
        </h1>
        <form class="flex flex-col gap-4" method="POST" action="{{ route('admin.store') }}">
            @csrf
            @method('POST')
            <input id="admId" type="text" name="admId" value="{{ auth()->user()->id }}" class="hidden">
            <input id="imageUrl" type="file" name="imageUrl" accept="image/png/webp" class="hidden">
            <label for="imageUrl">
                <h2>Change Image</h2>
                <img id="previewImage" src="{{ asset('car.webp') }}" alt="Preview Image"
                    class="w-full h-52 lg:h-96 object-cover rounded-lg border-4 border-primary">
            </label>
            <div class="flex lg:flex-row flex-col gap-5">
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Car Name</span>
                    <input type="text" autocomplete='off' name="name" id="name" required>
                </label>
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Price</span>
                    <input type="number" max="10000000" min="1000" autocomplete='off' name="price" id="price"
                        required step="0.001">
                </label>
            </div>
            <div class="flex lg:flex-row flex-col gap-5">
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Description</span>
                    <input type="text" maxlength="512" autocomplete='off' name="description" id="description" required>
                </label>
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Brand</span>
                    <input type="text" maxlength="80" autocomplete='off' name="brand" id="brand" required>
                </label>
            </div>
            <div class="flex lg:flex-row flex-col gap-5">
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Color</span>
                    <select autocomplete='off' name="color" id="color" required class=" text-white">
                        @foreach ($colors as $colorName => $color)
                            <option value="{{ $color }}" class="bg-dark">{{ $colorName }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Type</span>
                    <select autocomplete='off' name="type" id="type" required class=" text-white">
                        @foreach ($types as $type)
                            <option value="{{ $type }}" class="bg-dark">{{ $type }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="flex lg:flex-row flex-col gap-5">
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">State</span>
                    <select autocomplete='off' name="state" id="state" required class=" text-white">
                        <option value="0" class="bg-dark">New</option>
                        <option value="1" class="bg-dark">Used</option>
                    </select>
                </label>
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Transmission</span>
                    <select autocomplete='off' name="transmission" id="transmission" required class=" text-white">
                        <option value="0" class="bg-dark">Manual</option>
                        <option value="1" class="bg-dark">Automatic</option>
                    </select>
                </label>
            </div>
            <div class="flex lg:flex-row flex-col gap-5">
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Km</span>
                    <input type="number" autocomplete="off" name="km" id="km" required>
                </label>
                <label class="flex flex-col gap-2 w-full">
                    <span class="text-xl">Year</span>
                    <input type="text" autocomplete="off" name="year" id="x" required>
                </label>
            </div>
            @error('name')
                {{ $message }}
            @enderror
            @error('color')
                {{ $message }}
            @enderror
            @error('price')
                {{ $message }}
            @enderror
            @error('type')
                {{ $message }}
            @enderror
            @error('state')
                {{ $message }}
            @enderror
            @error('transmission')
                {{ $message }}
            @enderror
            @error('km')
                {{ $message }}
            @enderror
            @error('year')
                {{ $message }}
            @enderror
            <div class="flex lg:justify-end gap-5">
                <a href='{{ route('admin.index') }}'
                    class=" text-xl font-bold bg-red-500 text-darker flex items-center gap-2 px-4 py-2 rounded-lg">
                    Cancel <ion-icon name="close-sharp"></ion-icon>
                </a>
                <button type="submit">Publish <ion-icon name='car-sport-sharp'></ion-icon></button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </section>

    <script>
        $(document).ready(function() {
            $('#year').inputmask('9999');
        });

        const imageUrlInput = document.getElementById('imageUrl');
        const previewImage = document.getElementById('previewImage');

        imageUrlInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
