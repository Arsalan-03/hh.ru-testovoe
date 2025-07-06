<x-guest-layout>
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Подтверждение Email</h2>
    <div class="mb-4 text-sm text-gray-600 text-center">
        {{ __('Спасибо за регистрацию! Пожалуйста, подтвердите свой email, перейдя по ссылке в письме. Если письмо не пришло, мы можем отправить его повторно.') }}
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 text-center">
            {{ __('Новая ссылка для подтверждения отправлена на ваш email.') }}
        </div>
    @endif
    <div class="mt-4 flex flex-col gap-2 items-center justify-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">Отправить письмо повторно</button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Выйти</button>
        </form>
    </div>
</x-guest-layout>
