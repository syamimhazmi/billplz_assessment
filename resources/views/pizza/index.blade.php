@extends('master')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Pizza Order System</h1>

        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-semibold mb-2">Price List</h2>

            <ul class="list-disc pl-5 space-y-1">
                <li>Small pizza: RM{{ $prices['sizes']['small'] }}</li>
                <li>Medium pizza: RM{{ $prices['sizes']['medium'] }}</li>
                <li>Large pizza: RM{{ $prices['sizes']['large'] }}</li>
                <li>Pepperoni for small pizza: +RM{{ $prices['pepperoni']['small'] }}</li>
                <li>Pepperoni for medium pizza: +RM{{ $prices['pepperoni']['medium'] }}</li>
                <li>Pepperoni for large pizza: +RM{{ $prices['pepperoni']['large'] }}</li>
                <li>Extra cheese for any size pizza: +RM{{ $prices['extra_cheese'] }}</li>
            </ul>
        </div>

        <form action="{{ route('pizza.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Select Pizza Size:</label>
                <div class="space-y-2">
                    <div>
                        <input type="radio" id="small" name="size" value="small" required>
                        <label for="small">Small</label>
                    </div>

                    <div>
                        <input type="radio" id="medium" name="size" value="medium">
                        <label for="medium">Medium</label>
                    </div>

                    <div>
                        <input type="radio" id="large" name="size" value="large">
                        <label for="large">Large</label>
                    </div>
                </div>

                @error('size')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="pepperoni" name="pepperoni" value="1" class="mr-2">

                    <label for="pepperoni">Add Pepperoni?</label>
                </div>
            </div>

            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="extra_cheese" name="extra_cheese" value="1" class="mr-2">

                    <label for="extra_cheese">Add Extra Cheese?</label>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-300">
                    Calculate Bill
                </button>
            </div>
        </form>
    </div>
@endsection
