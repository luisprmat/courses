<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PaymentOrder;

Route::get('{course}/checkout', PaymentOrder::class)->name('checkout');
