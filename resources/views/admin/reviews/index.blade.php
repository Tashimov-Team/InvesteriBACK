@extends('layouts.admin')

@section('title', 'Управление отзывами')
@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Все отзывы</h2>
        <a href="{{ route('admin.reviews.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Новый отзыв</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Имя</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Роль</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Текст</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($reviews as $review)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $review->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <span>{{ $review->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $review->role }}</td>
                    <td class="px-6 py-4">{{ $review->text }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.reviews.update', $review) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Редактировать</a>
                        <form action="{{ route('admin.reviews.delete', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
