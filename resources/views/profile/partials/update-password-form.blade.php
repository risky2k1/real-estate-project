<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cập nhật mật khẩu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Hãy đảm bảo bạn nhập đúng mật khẩu và bảo vệ mật khẩu của mình thật tốt, không chia sẻ cho bất cứ ai.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Mật khẩu hiện tại')"/>
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="password" :value="__('Mật khẩu mới')"/>
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Xác nhận lại')"/>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="btn btn-success">{{ __('Lưu') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                >{{ __('Đã lưu.') }}</p>
            @endif
        </div>
    </form>
</section>
