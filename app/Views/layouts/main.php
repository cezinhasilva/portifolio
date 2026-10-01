<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'Cezinha Silva — Diretor de Tecnologia, Arquiteto & Dev Full Stack' ?></title>
    <meta name="description" content="Engenharia de Software de Alta Performance, Monólitos Modernos, Automações Inteligentes e IA Generativa com Vertex AI." />
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN com Plugins) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        obsidian: '#0B0D11',
                        carbine: '#15181D',
                        elevated: '#1B1F26',
                        neon: '#00E599',
                        cyan: '#00B4D8',
                    },
                    fontFamily: {
                        display: ['Space Grotesk', 'sans-serif'],
                        mono: ['Fira Code', 'monospace'],
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS (Engine.Core & Interactive Mouse Tokens) -->
    <link rel="stylesheet" href="/assets/css/cez-style.css?v=<?= file_exists(FCPATH . 'assets/css/cez-style.css') ? filemtime(FCPATH . 'assets/css/cez-style.css') : time() ?>">

    <!-- HTMX & Alpine.js -->
    <script src="https://unpkg.com/htmx.org@1.9.10" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-obsidian text-[#FAFAFA] antialiased selection:bg-neon selection:text-obsidian min-h-screen flex flex-col relative" x-data="{ mobileMenuOpen: false }">

    <!-- Interactive Cursor Elements (Disparados no cez-motion.js) -->
    <div id="cez-cursor-dot"></div>
    <div id="cez-cursor-aura"></div>

    <!-- Ambient Grid Reactive to Mouse Spotlight -->
    <div class="ambient-mouse-grid"></div>

    <!-- Top Navigation Header -->
    <header class="sticky top-0 z-40 backdrop-blur-md bg-obsidian/80 border-b border-white/5 transition-all">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            
            <!-- Logo / Brand -->
            <a href="/" class="flex items-center gap-3 text-white no-underline group" data-magnetic data-magnetic-strength="0.2">
                <div class="w-10 h-10 rounded-lg bg-carbine border border-white/10 flex items-center justify-center font-display font-bold text-lg text-neon group-hover:border-neon/50 transition-colors">
                    CS
                </div>
                <div class="flex flex-col">
                    <span class="font-display font-bold text-lg tracking-tight group-hover:text-neon transition-colors">Cezinha Silva</span>
                    <span class="text-xs text-[#8B949E] tracking-wider uppercase">Magnus Media OS</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-[#8B949E]">
                <a href="/#experiencia" class="hover:text-white transition-colors" data-magnetic data-magnetic-strength="0.3">Projetos</a>
                <a href="/#arquitetura" class="hover:text-white transition-colors" data-magnetic data-magnetic-strength="0.3">Stack & Cloud</a>
                <a href="/#solucoes" class="hover:text-white transition-colors" data-magnetic data-magnetic-strength="0.3">Serviços</a>
                <a href="/#cockpit" class="hover:text-white transition-colors" data-magnetic data-magnetic-strength="0.3">Cockpit</a>
                <?php /* Link de achadinhos temporariamente oculto para produção
                <a href="/achadinhos" class="text-neon hover:text-white transition-colors flex items-center gap-1 font-semibold" data-magnetic data-magnetic-strength="0.3">
                    <i data-lucide="flame" class="w-4 h-4 text-neon"></i>
                    <span>Achadinhos</span>
                </a>
                */ ?>
            </nav>

            <!-- Status Badge & CTA -->
            <div class="hidden sm:flex items-center gap-4">
                <div class="badge-status">
                    <span class="badge-pulse-dot"></span>
                    <span>Disponível para Projetos</span>
                </div>
                <a href="#contato" class="btn-magnetic-primary text-sm py-2.5 px-5" data-magnetic data-magnetic-strength="0.4">
                    <span>Iniciar Briefing</span>
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg bg-carbine border border-white/10 text-white">
                <i data-lucide="menu" x-show="!mobileMenuOpen" class="w-6 h-6"></i>
                <i data-lucide="x" x-show="mobileMenuOpen" class="w-6 h-6" style="display: none;"></i>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-carbine border-b border-white/10 px-6 py-6 space-y-4" style="display: none;">
            <a @click="mobileMenuOpen = false" href="#experiencia" class="block text-white font-medium">Projetos</a>
            <a @click="mobileMenuOpen = false" href="#arquitetura" class="block text-white font-medium">Stack & Cloud</a>
            <a @click="mobileMenuOpen = false" href="#solucoes" class="block text-white font-medium">Serviços</a>
            <a @click="mobileMenuOpen = false" href="#cockpit" class="block text-white font-medium">Cockpit</a>
            <div class="pt-4 border-t border-white/10">
                <a @click="mobileMenuOpen = false" href="#contato" class="btn-magnetic-primary w-full justify-center">
                    <span>Iniciar Briefing</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main class="flex-grow z-10 relative">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Modern Architecture Footer -->
    <footer class="border-t border-white/5 bg-carbine/50 mt-24 py-14 relative z-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex flex-col gap-2 text-center md:text-left">
                <span class="font-display font-bold text-xl text-white">Cezinha Silva</span>
                <p class="text-sm text-[#8B949E] max-w-md">
                    Arquiteto de Soluções e CTO na Magnus Media. Monólitos modernos de alta velocidade, automação de processos e engenharia em nuvem.
                </p>
            </div>

            <div class="flex items-center gap-6 text-[#8B949E]">
                <a href="https://github.com/cezinhasilva" target="_blank" rel="noopener" class="hover:text-neon transition-colors p-2" data-magnetic>
                    <i data-lucide="github" class="w-5 h-5"></i>
                </a>
                <a href="https://linkedin.com/in/cesar-silva-64347b59" target="_blank" rel="noopener" class="hover:text-neon transition-colors p-2" data-magnetic>
                    <i data-lucide="linkedin" class="w-5 h-5"></i>
                </a>
                <a href="https://instagram.com/cezinhasilva" target="_blank" rel="noopener" class="hover:text-neon transition-colors p-2" data-magnetic>
                    <i data-lucide="instagram" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-8 mt-8 border-t border-white/5 flex flex-col sm:flex-row justify-between items-center text-xs text-[#8B949E]">
            <span>&copy; <?= date('Y') ?> Cezinha Silva — Magnus Media. Todos os direitos reservados.</span>
            <span class="flex items-center gap-2 mt-4 sm:mt-0">
                <span class="w-2 h-2 rounded-full bg-neon"></span> Engine.Core v4 (CI4 PHP 8.2 + Docker + GCP)
            </span>
        </div>
    </footer>

    <!-- GSAP & Motion Engine Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="/assets/js/cez-motion.js?v=<?= file_exists(FCPATH . 'assets/js/cez-motion.js') ? filemtime(FCPATH . 'assets/js/cez-motion.js') : time() ?>"></script>
    
    <script>
        // Inicializa ícones Lucide
        lucide.createIcons();
    </script>
</body>
</html>