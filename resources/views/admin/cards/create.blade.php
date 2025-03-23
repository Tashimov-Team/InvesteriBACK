@extends('layouts.admin')

@section('title', 'Создание карточки')
@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Создать новую карточку</h2>

    <form action="{{ route('admin.cards.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Основные поля -->
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Заголовок</label>
                <input name="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <!-- Загрузка изображения -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Обложка карточки</label>
                <input name="image" type="file" class="ml-5 py-2 px-3 border border-gray-300 rounded-md text-sm" required>
            </div>

            <!-- Дополнительные поля -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
            </div>
        </div>

        <!-- Кнопки -->
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.cards.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">Отмена</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Сохранить</button>
        </div>
    </form>
</div>
@endsection
