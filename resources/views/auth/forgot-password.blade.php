<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="" />
            </a>
        </x-slot>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <img src="https://docs.jpa.gov.my/cdn/images/ePerkhidmatan/BLUE/BM/INTAN.jpg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Masukan e-mel yang berdaftar dibawah. Kemudian sila klik butang "E-MEL RESET KATA LALUAN" untuk set semula kata laluan anda. Seterusnya, sila semak dia e-mel anda.') }}
        </div>
        <form method="POST" action="/forgot-password">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('E-mel')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('E-mel reset kata laluan') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
