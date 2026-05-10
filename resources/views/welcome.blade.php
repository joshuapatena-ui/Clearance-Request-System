<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clearance | Graduate System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            .gradient-text {
                background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .blob {
                position: absolute;
                width: 500px;
                height: 500px;
                background: linear-gradient(135deg, rgba(99, 102, 241, 0.2) 0%, rgba(168, 85, 247, 0.2) 100%);
                filter: blur(80px);
                border-radius: 50%;
                z-index: -1;
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 overflow-x-hidden">
        <div class="blob top-[-100px] left-[-100px]"></div>
        <div class="blob bottom-[-100px] right-[-100px]"></div>

        <nav class="p-6 flex justify-between items-center max-w-7xl mx-auto">
            <div class="text-2xl font-black gradient-text">CLEARANCE.</div>
            <div>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-full font-bold shadow-lg shadow-indigo-200 hover:scale-105 transition-transform duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-bold text-slate-600 hover:text-indigo-600 transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-indigo-600 border border-indigo-100 rounded-full font-bold shadow-sm hover:bg-indigo-50 transition-all">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 pt-20 pb-32 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h1 class="text-6xl md:text-7xl font-extrabold text-slate-900 leading-tight mb-6">
                    Effortless <span class="gradient-text">Clearance</span> for Graduates.
                </h1>
                <p class="text-xl text-slate-600 mb-10 max-w-lg leading-relaxed">
                    Streamline your graduation process. Request departmental clearances, track status in real-time, and get ready for your big day without the paperwork hassle.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:translate-y-[-4px] transition-all duration-300">Get Started</a>
                    <a href="#features" class="px-8 py-4 glass rounded-2xl font-bold text-lg text-slate-700 hover:bg-white transition-all duration-300">Learn More</a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="glass p-8 rounded-[40px] shadow-2xl relative z-10 animate-float">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="font-bold text-slate-900">Library Clearance</div>
                            <div class="text-sm text-green-600 font-semibold">Status: Cleared</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 mb-8 opacity-60">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="font-bold text-slate-900">Finance Department</div>
                            <div class="text-sm text-amber-600 font-semibold">Status: Pending</div>
                        </div>
                    </div>
                    <div class="pt-6 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-slate-400 text-sm">Overall Progress</span>
                        <span class="font-bold text-indigo-600">65%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full mt-2 overflow-hidden">
                        <div class="bg-indigo-600 h-full w-[65%] rounded-full"></div>
                    </div>
                </div>
                <!-- Decorative elements -->
                <div class="absolute top-[-20px] right-[-20px] w-24 h-24 bg-amber-400 rounded-3xl -rotate-12 z-0 opacity-20"></div>
                <div class="absolute bottom-[-20px] left-[20px] w-32 h-32 bg-indigo-400 rounded-full z-0 opacity-10"></div>
            </div>
        </main>

        <section id="features" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-black text-slate-900 mb-16">Designed for <span class="gradient-text">Efficiency.</span></h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="p-10 rounded-3xl bg-slate-50 hover:bg-indigo-50 transition-all duration-300 border border-slate-100 group">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Fast Submission</h3>
                        <p class="text-slate-500">Submit your clearance requests to all departments in just one click.</p>
                    </div>
                    <div class="p-10 rounded-3xl bg-slate-50 hover:bg-purple-50 transition-all duration-300 border border-slate-100 group">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Real-time Tracking</h3>
                        <p class="text-slate-500">Monitor your status across Library, Finance, Registrar, and more.</p>
                    </div>
                    <div class="p-10 rounded-3xl bg-slate-50 hover:bg-amber-50 transition-all duration-300 border border-slate-100 group">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A3.323 3.323 0 0010.603 3.303a3.238 3.238 0 00-4.65b4.95 3.321 3.321 0 00-1.647 5.4c.148.145.299.274.451.387A3.326 3.326 0 009.635 18h4.73a3.326 3.326 0 005.474-3.96 3.238 3.238 0 00-4.221-8.056z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Fully Digital</h3>
                        <p class="text-slate-500">No more signatures on paper. Everything is processed digitally.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-12 border-t border-slate-100 text-center text-slate-400 font-medium">
            &copy; 2026 Clearance System. All rights reserved.
        </footer>
    </body>
</html>
