@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Статистика по ссылке</h1>
    <div class="bg-white p-6 rounded shadow mb-6">
        <div class="mb-2"><span class="font-semibold">Оригинальный URL:</span> <a href="{{ $link->original_url }}" target="_blank" class="text-blue-600 hover:underline">{{ $link->original_url }}</a></div>
        <div class="mb-2"><span class="font-semibold">Короткая ссылка:</span> <a href="{{ url('/' . $link->short_code) }}" target="_blank" class="text-blue-600 hover:underline">{{ url('/' . $link->short_code) }}</a></div>
        <div class="mb-2"><span class="font-semibold">Всего переходов:</span> {{ $clicks->count() }}</div>
    </div>
    <h2 class="text-xl font-semibold mb-4">Переходы</h2>
    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead>
            <tr class="bg-blue-50">
                <th class="py-2 px-4 text-left">IP-адрес</th>
                <th class="py-2 px-4 text-left">User Agent</th>
                <th class="py-2 px-4 text-left">Дата и время</th>
            </tr>
        </thead>
        <tbody>
        @forelse($clicks as $click)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $click->ip_address }}</td>
                <td class="py-2 px-4 break-all">{{ $click->user_agent }}</td>
                <td class="py-2 px-4">{{ $click->created_at->format('d.m.Y H:i:s') }}</td>
            </tr>
        @empty
            <tr><td colspan="3" class="py-6 text-center text-gray-500">Переходов пока нет.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div class="mt-6">
        <a href="{{ route('links.index') }}" class="text-blue-500 hover:underline">← К списку ссылок</a>
    </div>
</div>
@endsection
