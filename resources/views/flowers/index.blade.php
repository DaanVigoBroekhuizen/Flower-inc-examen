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
                    <table>
                        <thead>
                        <tr>
                            <th width="150px">Image</th>
                            <th width="150px">Name</th>
                            <th width="150px">Total amount of this flower in all warehouses</th>
                            <th width="150px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flowers as $flower)
                            <tr>
                                <td width="150px" class="text-center"><img src="{{ asset('images/flowers/' . $flower->img) }}" alt="flower-image" width="50px" height="50px"></td>
                                <td width="150px" class="text-center">{{ $flower->name }}</td>

                                <?php
                                $amount = 0;
                                $stocks = WarehouseFlower::where('flower_id', $flower->id)->get();
                                foreach ($stocks as $stock) {
                                    $amount += $stock->amount;
                                }
                                ?>
                                <td width="150px" class="text-center">{{ $amount }}</td>
                                <td width="150px" class="text-center">
                                    <a href="{{ route('flowers.edit', $flower->id) }}">
                                        Edit
                                    </a>
                                    <a href="{{ route('see-warehouses', $flower->id) }}">
                                        Amount in warehouses
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
