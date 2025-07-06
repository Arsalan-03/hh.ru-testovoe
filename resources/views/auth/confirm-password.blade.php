<x-guest-layout>
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Подтвердите пароль</h2>
    <div class="mb-4 text-sm text-gray-600 text-center">
        {{ __('Это защищённая область приложения. Пожалуйста, подтвердите свой пароль перед продолжением.') }}
    </div>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="mb-6">
            <x-input-label for="password" :value="__('Пароль')" />
            <input id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Подтвердить</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Войти</a>
    </div>
</x-guest-layout>
