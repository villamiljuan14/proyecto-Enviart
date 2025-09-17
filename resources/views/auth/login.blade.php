<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl rounded-2xl shadow-lg overflow-hidden bg-white">
            
            {{-- Panel izquierdo --}}
            <div class="hidden md:flex flex-col items-center justify-center w-1/2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-10">
                <h2 class="text-3xl font-bold mb-2">Bienvenido!</h2>
                <p class="mb-6">¿No tienes cuenta? Crea una y empieza a realizar envios.</p>
                <a href="{{ route('register') }}" 
                   class="px-6 py-2 bg-white text-purple-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                    Registrarse
                </a>
            </div>

            {{-- Panel derecho (form login) --}}
            <div class="w-full md:w-1/2 p-8">
                <div class="flex justify-center mb-6">
                    <x-authentication-card-logo />
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Iniciar Sesion</h2>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus class="w-full"/>
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="Contraseña" />
                        <x-input id="password" type="password" name="password" required class="w-full"/>
                    </div>

                    <div class="flex items-center mb-4">
                        <x-checkbox id="remember_me" name="remember" />
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">Recuerdame</label>
                    </div>

                    <button type="submit" 
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Ingresar
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-4 text-center">
                            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

