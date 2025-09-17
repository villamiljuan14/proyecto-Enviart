<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl rounded-2xl shadow-lg overflow-hidden bg-white">
            
            {{-- Panel izquierdo --}}
            <div class="hidden md:flex flex-col items-center justify-center w-1/2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-10">
                <h2 class="text-3xl font-bold mb-2">Bienvenido de vuelta!</h2>
                <p class="mb-6">¿Ya tienes una cuenta? Inicia sesión y continúa con nosotros.</p>
                <a href="{{ route('login') }}" 
                   class="px-6 py-2 bg-white text-purple-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                    Iniciar sesión
                </a>
            </div>

            {{-- Panel derecho (form registro) --}}
            <div class="w-full md:w-1/2 p-8">
                <div class="flex justify-center mb-6">
                    <x-authentication-card-logo />
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Cuenta</h2>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="name" value="Nombres" />
                        <x-input id="name" type="text" name="name" :value="old('name')" required autofocus class="w-full"/>
                    </div>

                    <div class="mb-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email" type="email" name="email" :value="old('email')" required class="w-full"/>
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="Contraseña" />
                        <x-input id="password" type="password" name="Contraseña" required autocomplete="new-password" class="w-full"/>
                    </div>

                    <div class="mb-4">
                        <x-label for="password_confirmation" value="Confirmar contraseña" />
                        <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full"/>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mb-4">
                            <label for="terms" class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <span class="ml-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </span>
                            </label>
                        </div>
                    @endif

                    <button type="submit" 
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Regstrarse
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

