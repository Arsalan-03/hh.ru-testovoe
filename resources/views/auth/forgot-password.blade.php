<x-guest-layout>
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Восстановление пароля</h2>
    <div class="mb-4 text-sm text-gray-600 text-center">
        {{ __('Забыли пароль? Просто введите свой email, и мы отправим ссылку для сброса пароля.') }}
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Отправить ссылку</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Войти</a>
    </div>
</x-guest-layout>
