<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Landing Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|plus-jakarta-sans:700,800|jetbrains-mono:400" rel="stylesheet" />

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Alpine JS setup for Chatbot -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505; /* Deep dark background */
            color: #E5E7EB;
            cursor: none; /* Hide default cursor for custom one */
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
        
        /* Neon accents */
        .neon-text {
            color: #00A3FF;
            text-shadow: 0 0 10px rgba(0, 163, 255, 0.5), 0 0 20px rgba(0, 163, 255, 0.3);
        }
        .neon-border {
            border-color: #00A3FF;
            box-shadow: 0 0 10px rgba(0, 163, 255, 0.2);
        }
        .neon-bg {
            background-color: #00A3FF;
            box-shadow: 0 0 15px rgba(0, 163, 255, 0.4);
        }
        
        /* Custom Cursor */
        .custom-cursor {
            position: fixed;
            top: 0;
            left: 0;
            width: 30px;
            height: 30px;
            border: 2px solid #00A3FF;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: 9999;
            transition: width 0.2s, height 0.2s, background-color 0.2s;
            mix-blend-mode: difference;
        }
        .custom-cursor.hovering {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 163, 255, 0.2);
            border-color: transparent;
        }

        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
        
        /* Glassmorphism */
        .glass {
            background: rgba(20, 20, 20, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="antialiased min-h-screen overflow-x-hidden" x-data="landingPage()">

    <!-- Custom Cursor Element -->
    <div class="custom-cursor" x-ref="cursor"></div>

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <span class="text-2xl font-bold tracking-tighter text-white">CLASS<span class="neon-text">.IO</span></span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#about" class="text-gray-300 hover:text-white hover:neon-text transition-all px-3 py-2 rounded-md text-sm font-medium interactive">Tentang</a>
                        <a href="#teacher" class="text-gray-300 hover:text-white hover:neon-text transition-all px-3 py-2 rounded-md text-sm font-medium interactive">Wali Kelas</a>
                        <a href="#students" class="text-gray-300 hover:text-white hover:neon-text transition-all px-3 py-2 rounded-md text-sm font-medium interactive">Siswa</a>
                        <a href="#gallery" class="text-gray-300 hover:text-white hover:neon-text transition-all px-3 py-2 rounded-md text-sm font-medium interactive">Galeri</a>
                        <a href="#chat" class="text-gray-300 hover:text-white hover:neon-text transition-all px-3 py-2 rounded-md text-sm font-medium interactive">AI Chat</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-[#00A3FF] interactive">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-400 hover:text-white interactive">Login Admin</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#00A3FF] rounded-full mix-blend-screen filter blur-[128px] opacity-20 animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-600 rounded-full mix-blend-screen filter blur-[128px] opacity-10"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">
                Welcome to <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">Class</span>
                <span class="neon-text">X RPL D</span>
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mb-10">
                Membangun masa depan melalui baris kode. Kami adalah generasi pembelajar, inovator, dan kreator teknologi.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#students" class="px-8 py-3 rounded-full text-white bg-gray-900 border border-gray-700 hover:border-[#00A3FF] hover:shadow-[0_0_15px_rgba(0,163,255,0.4)] transition-all interactive font-medium">Kenali Kami</a>
                <a href="#chat" class="px-8 py-3 rounded-full text-[#00A3FF] bg-[#00A3FF]/10 border border-[#00A3FF]/30 hover:bg-[#00A3FF]/20 transition-all interactive font-medium">Tanya AI Assistant</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 border-t border-gray-800/50 bg-[#0A0A0A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Tentang <span class="neon-text">Kelas Kami</span></h2>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        X RPL D bukan sekadar kelas, melainkan sebuah komunitas. Di sini, kami belajar memahami dunia melalui logika dan kreativitas. Bersama-sama kami menavigasi kompleksitas teknologi dan merancang solusi untuk masa depan.
                    </p>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#00A3FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Fokus pada kolaborasi dan inovasi
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#00A3FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Membangun portofolio sejak dini
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#00A3FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Kekeluargaan yang kuat
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#00A3FF]/20 to-transparent rounded-2xl filter blur-xl"></div>
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=800" alt="Class Activity" class="relative rounded-2xl border border-gray-800 interactive grayscale hover:grayscale-0 transition-all duration-500 object-cover h-80 w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Teacher Section -->
    <section id="teacher" class="py-20 bg-[#050505]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-12">Wali <span class="neon-text">Kelas</span></h2>
            
            @if($teacher)
            <div class="glass p-8 rounded-3xl border border-gray-800 relative group overflow-hidden interactive">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#00A3FF] opacity-10 rounded-bl-full group-hover:scale-150 transition-transform duration-700"></div>
                <img src="{{ $teacher->image_url }}" alt="{{ $teacher->name }}" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#00A3FF]/30 group-hover:border-[#00A3FF] transition-all duration-300 mb-6 relative z-10">
                <h3 class="text-2xl font-bold text-white mb-2 relative z-10">{{ $teacher->name }}</h3>
                <div class="w-12 h-1 bg-[#00A3FF] mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-400 italic text-lg relative z-10 max-w-2xl mx-auto">
                    "{{ $teacher->quotes }}"
                </p>
            </div>
            @else
            <div class="text-gray-500">Data Wali Kelas belum ditambahkan.</div>
            @endif
        </div>
    </section>

    <!-- Students Section -->
    <section id="students" class="py-20 bg-[#0A0A0A] border-y border-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Daftar <span class="neon-text">Siswa</span></h2>
                <p class="text-gray-400">Pahlawan di balik setiap baris kode.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($students as $student)
                <div class="glass rounded-xl overflow-hidden group interactive border border-gray-800 hover:border-[#00A3FF]/50 transition-all duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $student->image_url }}" alt="{{ $student->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-500">
                    </div>
                    <div class="p-4 bg-gray-900/80">
                        <h3 class="text-lg font-semibold text-white group-hover:text-[#00A3FF] transition-colors truncate">{{ $student->name }}</h3>
                        <p class="text-sm text-gray-500 truncate mt-1">{{ $student->description ?? 'Siswa X RPL D' }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-10">Belum ada data siswa.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Album Section -->
    <section id="gallery" class="py-20 bg-[#050505]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Album <span class="neon-text">Kegiatan</span></h2>
                <p class="text-gray-400">Momen-momen berharga yang terekam dalam lensa.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($albums as $album)
                <div @click="openModal('{{ $album->title }}', '{{ $album->image_url }}', '{{ addslashes($album->description) }}')" class="group cursor-pointer interactive">
                    <div class="relative overflow-hidden rounded-2xl border border-gray-800 aspect-video">
                        <div class="absolute inset-0 bg-black/50 group-hover:bg-transparent transition-colors duration-300 z-10"></div>
                        <img src="{{ $album->image_url }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent z-20">
                            <h3 class="text-xl font-bold text-white group-hover:text-[#00A3FF] transition-colors">{{ $album->title }}</h3>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-10">Belum ada album kegiatan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Image Modal for Albums -->
    <div x-show="modalOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" x-transition.opacity>
        <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" @click="modalOpen = false"></div>
        <div class="relative w-full max-w-4xl bg-[#0A0A0A] border border-gray-800 rounded-2xl shadow-2xl overflow-hidden z-10" @click.stop>
            <button @click="modalOpen = false" class="absolute top-4 right-4 p-2 bg-black/50 hover:bg-[#00A3FF] text-white rounded-full transition-colors z-30 interactive">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex flex-col md:flex-row h-full max-h-[80vh]">
                <div class="md:w-3/5 bg-black h-64 md:h-auto">
                    <img :src="modalImage" alt="Album Image" class="w-full h-full object-contain">
                </div>
                <div class="md:w-2/5 p-8 flex flex-col overflow-y-auto">
                    <h3 class="text-2xl font-bold mb-4 neon-text" x-text="modalTitle"></h3>
                    <p class="text-gray-300 leading-relaxed" x-text="modalDesc"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- AI Chatbot Section -->
    <section id="chat" class="py-20 border-t border-gray-800/50 bg-[#0A0A0A]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">AI <span class="neon-text">Smart Assistant</span></h2>
                <p class="text-gray-400">Tanyakan apa saja seputar informasi kelas X RPL D. AI kami terhubung dengan basis pengetahuan kelas.</p>
            </div>

            <!-- Chat Interface -->
            <div class="glass border border-gray-800 rounded-2xl overflow-hidden shadow-[0_0_30px_rgba(0,0,0,0.5)] flex flex-col font-mono" x-data="chatbot()">
                <!-- Chat Header -->
                <div class="bg-gray-900/80 border-b border-gray-800 p-4 flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <div class="ml-4 text-xs text-gray-400">terminal@class-ai:~</div>
                </div>

                <!-- Chat History Area -->
                <div class="p-6 h-96 overflow-y-auto flex flex-col gap-4 bg-[#050505]/80" id="chatbox">
                    <!-- Welcome Message -->
                    <div class="flex flex-col gap-1 max-w-[85%] text-sm">
                        <span class="text-[#00A3FF] font-bold">system_bot</span>
                        <div class="bg-gray-800/50 border border-gray-700 text-gray-300 p-3 rounded-r-xl rounded-bl-xl inline-block">
                            Halo! Saya AI Assistant kelas X RPL D. Ada yang bisa saya bantu terkait informasi kelas, wali kelas, atau siswa?
                        </div>
                    </div>
                    
                    <!-- Dynamic Messages -->
                    <template x-for="(msg, index) in messages" :key="index">
                        <div class="flex flex-col gap-1 text-sm" :class="msg.role === 'user' ? 'items-end' : 'items-start'">
                            <span class="font-bold" :class="msg.role === 'user' ? 'text-purple-400' : 'text-[#00A3FF]'" x-text="msg.role === 'user' ? 'visitor' : 'system_bot'"></span>
                            <div class="p-3 inline-block max-w-[85%] whitespace-pre-wrap" 
                                 :class="msg.role === 'user' ? 'bg-purple-600/20 border border-purple-500/30 text-white rounded-l-xl rounded-br-xl' : 'bg-gray-800/50 border border-gray-700 text-gray-300 rounded-r-xl rounded-bl-xl'"
                                 x-text="msg.content">
                            </div>
                        </div>
                    </template>
                    
                    <!-- Loading Indicator -->
                    <div x-show="isLoading" class="flex flex-col gap-1 max-w-[85%] text-sm items-start">
                        <span class="text-[#00A3FF] font-bold">system_bot</span>
                        <div class="bg-gray-800/50 border border-gray-700 text-gray-300 p-3 rounded-r-xl rounded-bl-xl inline-block flex items-center gap-2">
                            <span class="w-2 h-2 bg-[#00A3FF] rounded-full animate-bounce"></span>
                            <span class="w-2 h-2 bg-[#00A3FF] rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                            <span class="w-2 h-2 bg-[#00A3FF] rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                        </div>
                    </div>
                </div>

                <!-- Chat Input Area -->
                <div class="p-4 bg-gray-900 border-t border-gray-800">
                    <form @submit.prevent="sendMessage" class="relative">
                        <textarea 
                            x-model="inputText"
                            @keydown.enter.prevent="if(!isLoading && inputText.trim() !== '') sendMessage()"
                            @input="charCount = inputText.length"
                            maxlength="500"
                            rows="2"
                            class="w-full bg-[#050505] border border-gray-700 text-green-400 p-4 pr-16 rounded-xl focus:outline-none focus:border-[#00A3FF] focus:ring-1 focus:ring-[#00A3FF] transition-colors resize-none interactive"
                            placeholder="// Tanyakan sesuatu tentang kelas X RPL D... (misal: siapa wali kelasnya?)"
                            :disabled="isLoading"
                        ></textarea>
                        
                        <!-- Char Counter -->
                        <div class="absolute bottom-2 left-4 text-xs text-gray-500">
                            <span x-text="charCount"></span>/500
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="absolute right-3 bottom-3 flex items-center gap-2">
                            <button type="button" @click="resetChat" class="text-gray-500 hover:text-white p-2 transition-colors interactive" title="Reset">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </button>
                            <button type="submit" :disabled="isLoading || inputText.trim() === ''" class="bg-[#00A3FF] hover:bg-[#00A3FF]/80 text-black p-2 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed interactive">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                    <div class="mt-2 text-xs text-gray-500 flex justify-between items-center px-1">
                        <div>
                            <span>Session History: <span x-text="messages.length"></span> interactions</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full" :class="isLoading ? 'bg-yellow-500 animate-pulse' : 'bg-green-500'"></span>
                            <span x-text="isLoading ? 'Processing...' : 'System Ready'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-black py-8 border-t border-gray-900 text-center">
        <p class="text-gray-500 text-sm">© {{ date('Y') }} Class X RPL D. All rights reserved.</p>
    </footer>

    <script>
        // Setup CSRF Token for Axios
        document.addEventListener('alpine:init', () => {
            Alpine.data('landingPage', () => ({
                modalOpen: false,
                modalTitle: '',
                modalImage: '',
                modalDesc: '',
                
                init() {
                    // Custom Cursor Logic
                    const cursor = this.$refs.cursor;
                    
                    document.addEventListener('mousemove', (e) => {
                        requestAnimationFrame(() => {
                            cursor.style.left = e.clientX + 'px';
                            cursor.style.top = e.clientY + 'px';
                        });
                    });

                    // Add hover effect for interactive elements
                    const interactives = document.querySelectorAll('.interactive, a, button');
                    interactives.forEach(el => {
                        el.addEventListener('mouseenter', () => cursor.classList.add('hovering'));
                        el.addEventListener('mouseleave', () => cursor.classList.remove('hovering'));
                    });
                },
                
                openModal(title, image, desc) {
                    this.modalTitle = title;
                    this.modalImage = image;
                    this.modalDesc = desc;
                    this.modalOpen = true;
                }
            }));

            Alpine.data('chatbot', () => ({
                inputText: '',
                charCount: 0,
                isLoading: false,
                messages: [],
                
                async sendMessage() {
                    if (this.inputText.trim() === '' || this.isLoading) return;
                    
                    const query = this.inputText.trim();
                    this.messages.push({ role: 'user', content: query });
                    this.inputText = '';
                    this.charCount = 0;
                    this.isLoading = true;
                    
                    // Scroll to bottom
                    this.scrollToBottom();
                    
                    try {
                        // In a real implementation, this would call your Laravel API
                        const response = await fetch('/chat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ message: query })
                        });
                        
                        const data = await response.json();
                        
                        if (response.ok) {
                            this.messages.push({ role: 'bot', content: data.reply });
                        } else {
                            this.messages.push({ role: 'bot', content: 'Error: ' + (data.error || 'Gagal merespons.') });
                        }
                    } catch (error) {
                        this.messages.push({ role: 'bot', content: 'Error: Koneksi terputus.' });
                    } finally {
                        this.isLoading = false;
                        this.scrollToBottom();
                    }
                },
                
                resetChat() {
                    this.messages = [];
                    this.inputText = '';
                    this.charCount = 0;
                },
                
                scrollToBottom() {
                    setTimeout(() => {
                        const chatbox = document.getElementById('chatbox');
                        if (chatbox) {
                            chatbox.scrollTop = chatbox.scrollHeight;
                        }
                    }, 50);
                }
            }));
        });
    </script>
</body>
</html>
