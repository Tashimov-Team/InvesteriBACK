@extends('layouts.admin')

@section('title', 'Пользователи')
@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Зарегистрированные пользователи</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Новый пользователь</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Имя</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Номер телефона</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ИНН</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">{{ $user->phone }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if (empty($user->inn))
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">Не указан</span>
                        @else
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">{{ $user->inn }}</span>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.users.update', $user) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Редактировать</a>
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST">
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
