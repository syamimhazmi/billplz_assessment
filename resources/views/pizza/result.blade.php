@extends('master')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Pizza Order Summary</h1>

        <div class="bg-blue-50 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-semibold mb-4">Your Order Details</h2>
            <div class="space-y-2">
                <p><span class="font-medium">Pizza Size:</span> {{ ucfirst($size) }}</p>
                <p><span class="font-medium">Pepperoni:</span> {{ $has_pepperoni ? 'Yes' : 'No' }}</p>
                <p><span class="font-medium">Extra Cheese:</span> {{ $has_extra_cheese ? 'Yes' : 'No' }}</p>
            </div>
        </div>

        <div class="bg-green-50 p-4 rounded-lg mb-6">
            <h2 class="text-xl font-bold text-center text-green-800">Total Bill: RM{{ $bill }}</h2>
        </div>

        <div class="text-center">
            <a href="{{ route('pizza.index') }}"
                class="inline-block py-2 px-4 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md transition duration-300">
                Place Another Order
            </a>
        </div>
    </div>
@endsection
