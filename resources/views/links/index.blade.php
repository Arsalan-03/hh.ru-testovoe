@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-700">Мои короткие ссылки</h1>
        <a href="{{ route('links.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">Создать ссылку</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    <div class="mb-4 p-2 bg-yellow-100 text-yellow-800 rounded">
        <b>Ваш user_id:</b> {{ Auth::id() }}<br>
    </div>
    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead>
            <tr class="bg-blue-50">
                <th class="py-2 px-4 text-left">Оригинальный URL</th>
                <th class="py-2 px-4 text-left">Короткая ссылка</th>
                <th class="py-2 px-4 text-center">Переходы</th>
                <th class="py-2 px-4 text-center">Действия</th>
            </tr>
        </thead>
        <tbody>
        @forelse($links as $link)
            <tr class="border-t">
                <td class="py-2 px-4 break-all">{{ $link->original_url }}<br><span class="text-xs text-gray-400">user_id: {{ $link->user_id }}</span></td>
                <td class="py-2 px-4">
                    <a href="/{{ $link->short_code }}" target="_blank" class="text-blue-600 hover:underline">{{ url($link->short_code) }}</a>
                </td>
                <td class="py-2 px-4 text-center font-semibold">{{ $link->clicks()->count() }}</td>
                <td class="py-2 px-4 text-center">
                    <form action="{{ route('links.destroy', ['link' => $link->id]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Удалить ссылку?')">Удалить</button>
                    </form>
                    <a href="{{ route('links.show', $link) }}" class="ml-3 text-blue-500 hover:underline">Статистика</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="py-6 text-center text-gray-500">У вас пока нет коротких ссылок.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
