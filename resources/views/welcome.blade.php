<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="antialiased">
    <div class="background-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
        <!-- Content container -->
        <div class="content-container">
            <div class="flex justify-center">
                <img src="{{ asset('images/yougram-high-resolution-logo-color-on-transparent-background.png') }}" style="max-height: 650px; max-width: 650px; margin-top: 75px;">
            </div>

            <div class="relative sm:flex sm:justify-center sm:items-center sm-h-screen" style="background-size: cover; background-position: center; background-repeat: no-repeat;">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                    <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-900 text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-900 text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                    @endauth
                </div>
                @endif

                <div class="max-w-10xl mx-auto p-6 lg:p-8">
                    <div class="mt-16">
                        <div class="grid grid-cols-4 md:grid-cols-4 gap-4 lg:gap-6" style="grid-template-columns: repeat(4, minmax(0, 1fr)); margin-bottom: 0; margin-top: 156px;">
                            <a class="scale-100 p-6 bg-white bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="max-width: 400px">
                                <div>
                                    <div class=" h-16 w-16 bg-red-50 bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 text-white">Engagement</h2>

                                    <p class="mt-4 text-gray-500 text-gray-400 text-sm leading-relaxed">
                                        Experience a collaborative environment in the technology work space where users and creators can interact with each other via comments or subscribtions.
                                    </p>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>

                            <a class="scale-100 p-6 bg-white bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="max-width: 400px">
                                <div>
                                    <div class="h-16 w-16 bg-red-50 bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 text-white">Create Videos</h2>

                                    <p class="mt-4 text-gray-500 text-gray-400 text-sm leading-relaxed">
                                        Upload videos online and share your knwoledge on programming languages and other technology savy tips for others to see.
                                    </p>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>

                            <a class="scale-100 p-6 bg-white bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="max-width: 400px">
                                <div>
                                    <div class="h-16 w-16 bg-red-50 bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 text-white">Your Media</h2>

                                    <p class="mt-4 text-gray-500 text-gray-400 text-sm leading-relaxed">
                                        Organize and stream your personal collection of programming languages, guides, and walkthroughs anywhere on your personalized computer.
                                    </p>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </a>

                            <div class="scale-100 p-6 bg-white bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="max-width: 400px">
                                <div>
                                    <div class="h-16 w-16 bg-red-50 bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 text-white">Live Streaming Services</h2>

                                    <p class="mt-4 text-gray-500 text-gray-400 text-sm leading-relaxed">
                                        Watch free ad-supported streams on programming lectures and special events on your local devices.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>