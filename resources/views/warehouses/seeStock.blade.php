<?php
use App\Models\WarehouseFlower;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouses') }}
        </h2>
    </x-slot>

    <x-popup-feedback />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('go-to-add-stock', $warehouse->id) }}">Add a stock</a>
                    <?php
                    $amount = 0;
                    $stocks = WarehouseFlower::where('warehouse_id', $warehouse->id)->get();
                    foreach ($stocks as $stock) {
                        $amount += $stock->amount;
                    }
                    ?>
                    <h1>De hoeveelheid bloemen aanwezig in dit magazijn: {{ $amount }}</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Flower</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/flowers/' . $stock->flower->img) }}" alt="{{ $stock->flower->name }}" width="50">
                                </td>
                                <td>{{ $stock->flower->name }}</td>
                                <td>{{ $stock->amount }}</td>
                                <td><a href="{{ route('warehouseFlowers.edit', $stock->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
