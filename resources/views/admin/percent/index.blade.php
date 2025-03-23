@extends('layouts.admin')

@section('title', 'Изменение процента')
@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        @if (empty($percent))
        <h2 class="text-xl font-semibold">Процент не установлен</h2>
        @else
        <h2 class="text-xl font-semibold">Текущий процент: {{ $percent->percent }} %</h2>
        @endif
    </div>

    <div class="p-6">
        @if (empty($percent))
        <form action="{{ route('admin.percent.create') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="percent" class="block text-sm font-medium text-gray-700">Установить процент</label>
                <input type="number" id="percent" name="percent" min="0" max="100" step="0.01" value=""
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Сохранить</button>
        </form>
        @else
        <form action="{{ route('admin.percent.update', $percent) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="percent" class="block text-sm font-medium text-gray-700">Новый процент</label>
                <input type="number" id="percent" name="percent" min="0" max="100" step="0.01" value="{{ $percent->percent }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Сохранить</button>
        </form>
        @endif
    </div>
</div>
@endsection
