<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviart</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto" alt="Logo Enviart">
                <span class="font-bold text-xl text-black-600">Enviart</span>
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-red-600">Inicio</a>
                <a href="#" class="hover:text-red-600">Servicios</a>
                <a href="#" class="hover:text-red-600">Rastrear envío</a>
                <a href="#" class="hover:text-red-600">Contacto</a>
            </nav>
            <div class="flex space-x-3">
                <a href="{{ route('login') }}" class="px-4 py-2 border rounded hover:bg-white-100">Ingresar</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-black-700">Registrarse</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Tu envío, rápido y seguro <br> en todo Colombia
                </h1>
                <p class="mt-4 text-lg text-gray-600">
                    Con Enviart tus paquetes llegan donde quieras, cuando quieras.
                </p>
                <div class="mt-6 flex space-x-4">
                    <a href="#" class="px-6 py-3 bg-black-600 text-white rounded-lg hover:bg-black-700">
                        Cotizar Envío
                    </a>
                    <a href="#" class="px-6 py-3 border rounded-lg hover:bg-gray-100">
                        Rastrear Envío
                    </a>
                </div>
            </div>
        <div class="flex justify-center">
    <video src="{{ asset('videos/domiciliario.mp4') }}" class="w-96" autoplay  muted loop playsinline></video>
</div>

    </section>

 
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-900">Nuestros Servicios</h2></div>
        </div>
    </section>
    
<div class="flex flex-row flex-wrap justify-center gap-6">
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="bg-white p-4 rounded-md shadow-md">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-black-900 dark:text-black-100">Envíos Nacionales</h5>
            </a>
            <p class="mb-3 font-normal text-black-700 dark:text-gray-400">Entrega rápida y segura en todo el país.</p>
            <img src="{{ asset('images/nacional.png') }}" alt="Envíos rápidos" class="w-96">
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Leer más
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="bg-white p-4 rounded-md shadow-md">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-black-900 dark:text-black-100">Envíos Internacionales</h5>
            </a>
            <p class="mb-3 font-normal text-black-700 dark:text-gray-400">Conectamos Colombia con el mundo.</p>
            <img src="{{ asset('images/internacional.png') }}" alt="Envíos rápidos" class="w-96">
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Leer más
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="bg-white p-4 rounded-md shadow-md">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-black-900 dark:text-black-100">Logística Empresarial</h5>
            </a>
            <p class="mb-3 font-normal text-black-700 dark:text-gray-400">Soluciones de transporte para tu negocio.</p>
            <img src="{{ asset('images/Empresarial.png') }}" alt="Envíos rápidos" class="w-96">
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Leer más
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>

  
</div>


    

  
    <section class="py-16 bg-blue-50">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-2xl font-bold">Rastrea tu envío</h2>
            <form action="#" method="GET" class="mt-6 flex">
                <input type="text" name="guia" placeholder="Ingresa tu número de guía"
                       class="w-full px-4 py-3 border rounded-l-lg focus:outline-none-border-blue-500" required>
                <button type="submit" class="px-6 bg-black-600 text-white rounded-r-lg hover:bg-black-700">
                    Rastrear
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">
            <div>
                <h3 class="font-bold text-lg">Enviart</h3>
                <p class="mt-2 text-gray-400">Tu aliado en envíos rápidos y seguros.</p>
            </div>
            <div>
                <h3 class="font-bold text-lg">Enlaces</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="hover:text-black-400">Servicios</a></li>
                    <li><a href="#" class="hover:text-black-400">Rastrear</a></li>
                    <li><a href="#" class="hover:text-black-400">Contacto</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg">Contacto</h3>
                <p class="mt-2 text-gray-400">📍 Bogotá, Colombia</p>
                <p class="text-gray-400">☎ 300 123 4567</p>
                <p class="text-gray-400">✉ contacto@enviart.com</p>
            </div>
        </div>
        <div class="mt-8 text-center text-gray-500 text-sm">
            © {{ date('Y') }} Enviart. Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>
