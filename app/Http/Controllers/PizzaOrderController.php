<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PizzaOrderController extends Controller
{
    private $prices = [
        'sizes' => [
            'small' => 15,
            'medium' => 22,
            'large' => 30
        ],
        'pepperoni' => [
            'small' => 3,
            'medium' => 5,
            'large' => 5
        ],
        'extra_cheese' => 6
    ];

    public function index(Request $request): View
    {
        return view('pizza.index', ['prices' => $this->prices]);
    }

    public function store(Request $request): View
    {
        $validated = $request->validate([
            'size' => ['required', 'in:small,medium,large'],
            'pepperoni' => ['nullable', 'boolean'],
            'extra_cheese' => ['nullable', 'boolean'],
        ]);

        $size = $validated['size'];
        $has_pepperoni = $validated['pepperoni'] ?? false;
        $has_extra_cheese = $validated['extra_cheese'] ?? false;

        $bill = $this->prices['sizes'][$size];

        if ($has_pepperoni) {
            $bill += $this->prices['pepperoni'][$size];
        }

        if ($has_extra_cheese) {
            $bill += $this->prices['extra_cheese'];
        }

        return view('pizza.result', [
            'size' => $size,
            'has_pepperoni' => $has_pepperoni,
            'has_extra_cheese' => $has_extra_cheese,
            'bill' => $bill,
            'prices' => $this->prices
        ]);
    }
}
