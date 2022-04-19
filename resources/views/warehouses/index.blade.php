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
                    <a href="{{ route('warehouses.create') }}">Create a new warehouse</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Actions</th>
                                <th>Total amount of flowers</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <td width="150px" class="text-center">{{ $warehouse->name }}</td>
                                <td width="150px" class="text-center">{{ $warehouse->address }}</td>
                                <td width="150px" class="text-center">
                                    <a href="{{ route('warehouses.edit', $warehouse->id) }}">
                                        Edit
                                    </a>
                                    <a href="{{ route('see-stock', $warehouse->id) }}">
                                        Stock
                                    </a>
                                </td>
                                <?php
                                    $amount = 0;
                                    $stocks = WarehouseFlower::where('warehouse_id', $warehouse->id)->get();
                                    foreach ($stocks as $stock) {
                                        $amount += $stock->amount;
                                    }
                                ?>
                                <td width="150px" class="text-center">{{ $amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
