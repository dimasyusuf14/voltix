@extends('admin.index')

@section('content')
<!-- Widgets -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg p-4 shadow">
        <h2 class="text-lg font-semibold mb-2">Profit & Expenses</h2>
        <div class="h-40 bg-gray-100 flex items-center justify-center text-sm text-gray-400">
            [Chart Placeholder]
        </div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow">
        <h2 class="text-lg font-semibold">Traffic Distribution</h2>
        <p class="text-2xl font-bold mt-2">$36,358</p>
        <p class="text-green-500 text-sm">+9% last year</p>
        <div class="h-24 flex items-center justify-center text-gray-400">
            [Pie Chart]
        </div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow">
        <h2 class="text-lg font-semibold">Product Sales</h2>
        <p class="text-2xl font-bold mt-2">$6,820</p>
        <p class="text-red-500 text-sm">-9% last year</p>
        <div class="h-24 flex items-center justify-center text-gray-400">
            [Line Chart]
        </div>
    </div>
</div>
@endsection
