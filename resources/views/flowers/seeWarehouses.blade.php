<?php
use App\Models\WarehouseFlower;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flowers') }}
        </h2>
    </x-slot>

    <x-popup-feedback />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('flowers.create') }}">Create a new flower</a>
                    <?php
                    $amount = 0;
                    $stocks = WarehouseFlower::where('flower_id', $id)->get();
                    foreach ($stocks as $stock) {
                        $amount += $stock->amount;
                    }
                    ?>
                    <h1>Hoeveelheid van deze bloem aanwezig in alle warehouses: {{ $amount }}</h1>
                    <table>
                        <thead>
                        <tr>
                            <th width="150px">Name</th>
                            <th width="150px">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <td width="150px" class="text-center">{{ $warehouse->warehouse->name }}</td>
                                <td width="150px" class="text-center">{{ $warehouse->amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
