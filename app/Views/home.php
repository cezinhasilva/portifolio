<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Ambient Spotlight Glow in Hero -->
<div class="ambient-hero-glow"></div>

<!-- ==========================================================================
     1. HERO SECTION (INTERACTIVE COCKPIT & MOUSE ACTIONS)
     ========================================================================== -->
<section class="relative min-h-[90vh] flex items-center pt-12 pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Typography & Positioning -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Status Badge -->
                <div class="hero-badge inline-flex items-center gap-3 px-4 py-2 rounded-full bg-carbine/90 border border-white/10 text-xs font-mono tracking-wide text-[#8B949E]">
                    <span class="w-2.5 h-2.5 rounded-full bg-neon animate-ping"></span>
                    <span class="text-white font-semibold">MAGNUS MEDIA OS</span>
                    <span class="text-white/20">|</span>
                    <span class="text-neon">ONLINE & DISPONÍVEL</span>
                </div>

                <!-- Main Title with Heavy Display Font -->
                <div class="space-y-2">
                    <h1 class="hero-title-line font-display font-extrabold text-4xl sm:text-6xl xl:text-7xl tracking-tight leading-[1.05] text-white">
                        ENGENHARIA <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-neon via-[#00B4D8] to-white">DE SOFTWARE</span><br>
                        DE ALTA PERFORMANCE.
                    </h1>
                </div>

                <!-- Subtitle with Visceral Engineering Language -->
                <p class="hero-subtitle text-lg sm:text-xl text-[#8B949E] leading-relaxed max-w-2xl">
                    Arquiteto de Soluções e CTO. Desenvolvo <strong class="text-white">monólitos modernos e ultrarrápidos</strong>, infraestruturas serverless no Google Cloud e esteiras inteligentes de automação com <strong class="text-neon">Vertex AI</strong> e <strong class="text-neon">n8n</strong>.
                </p>

                <!-- CTAs with Magnetic Physics -->
                <div class="hero-cta-group flex flex-wrap items-center gap-4 pt-4">
                    <a href="#experiencia" class="btn-magnetic-primary" data-magnetic data-magnetic-strength="0.35">
                        <span>Explorar Projetos</span>
                        <i data-lucide="arrow-down-right" class="w-5 h-5"></i>
                    </a>
                    <a href="#cockpit" class="btn-magnetic-secondary" data-magnetic data-magnetic-strength="0.35">
                        <span>Ver Cockpit de Stack</span>
                        <i data-lucide="terminal" class="w-5 h-5 text-neon"></i>
                    </a>
                </div>

                <!-- Quick Tech Highlights -->
                <div class="pt-6 border-t border-white/5 flex flex-wrap items-center gap-6 text-xs text-[#8B949E] font-mono">
                    <div class="flex items-center gap-2">
                        <i data-lucide="cpu" class="w-4 h-4 text-neon"></i>
                        <span>PHP 8.2 & CodeIgniter 4</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="cloud" class="w-4 h-4 text-cyan"></i>
                        <span>Google Cloud Run & Always Free</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="sparkles" class="w-4 h-4 text-neon"></i>
                        <span>Vertex AI (Gemini 2.0)</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: 3D Tilt Interactive Cockpit Card -->
            <div class="lg:col-span-5 hero-cockpit" id="hero-cockpit-card">
                <div class="interactive-card p-6 border border-white/10 rounded-xl shadow-2xl relative" data-tilt
                     x-data="{ 
                         activeTab: 'ping', 
                         pinging: false, 
                         latency: 14, 
                         history: [12, 15, 14],
                         aiProcessing: false,
                         aiResponse: '',
                         dockerLogs: [
                             '[18:17:10] cez_web: Apache 2.4.68 PHP 8.2 pronto na porta :80',
                             '[18:17:10] cez_db: MySQL 8.0 pool de conexao ativo (3306)',
                             '[18:19:42] spark: migracoes executadas com sucesso',
                             '[18:45:54] http: 200 OK GET / (render em 14ms)'
                         ],
                         runPing() {
                             this.pinging = true;
                             setTimeout(() => {
                                 const newLat = Math.floor(Math.random() * 6) + 11;
                                 this.latency = newLat;
                                 this.history.unshift(newLat);
                                 if (this.history.length > 5) this.history.pop();
                                 this.dockerLogs.unshift('[' + new Date().toLocaleTimeString() + '] ping: GCP us-central1 ' + newLat + 'ms (OK)');
                                 this.pinging = false;
                             }, 350);
                         },
                         runAI() {
                             this.aiProcessing = true;
                             this.aiResponse = '';
                             setTimeout(() => {
                                 this.aiResponse = 'Score: 98/100 | Lead Quente: Solicitacao de Migracao GCP + Vertex AI.';
                                 this.dockerLogs.unshift('[' + new Date().toLocaleTimeString() + '] vertex_ai: Gemini 2.0 Flash inferencia 180ms (24 tokens)');
                                 this.aiProcessing = false;
                             }, 500);
                         },
                         clearLogs() {
                             this.dockerLogs = ['[' + new Date().toLocaleTimeString() + '] console limpo pelo operador'];
                         }
                     }">
                    
                    <!-- Card Header / Terminal Bar com Botões Reais -->
                    <div class="flex items-center justify-between pb-4 border-b border-white/10 text-xs font-mono text-[#8B949E]">
                        <div class="flex items-center gap-2">
                            <button type="button" @click="clearLogs()" title="Limpar Logs" class="w-3.5 h-3.5 rounded-full bg-red-500/90 hover:bg-red-400 hover:scale-110 transition-all focus:outline-none cursor-pointer"></button>
                            <button type="button" @click="runPing()" title="Recarregar Ping" class="w-3.5 h-3.5 rounded-full bg-yellow-500/90 hover:bg-yellow-400 hover:scale-110 transition-all focus:outline-none cursor-pointer"></button>
                            <button type="button" @click="activeTab = (activeTab === 'ping' ? 'ai' : (activeTab === 'ai' ? 'logs' : 'ping'))" title="Alternar Aba" class="w-3.5 h-3.5 rounded-full bg-green-500/90 hover:bg-green-400 hover:scale-110 transition-all focus:outline-none cursor-pointer"></button>
                            <span class="ml-2 text-white font-semibold">cezinhasilva-cockpit.sh</span>
                        </div>
                        <span class="text-neon flex items-center gap-1 font-mono text-xs">
                            <span class="w-2 h-2 rounded-full bg-neon animate-ping"></span> Live
                        </span>
                    </div>

                    <!-- Botões de Navegação das Abas do Cockpit -->
                    <div class="flex items-center gap-1.5 pt-4 pb-2 border-b border-white/5 font-mono text-[11px]">
                        <button type="button" @click="activeTab = 'ping'" 
                                class="px-3 py-1.5 rounded transition-all flex items-center gap-1.5 cursor-pointer"
                                :class="activeTab === 'ping' ? 'bg-neon/15 text-neon border border-neon/40 font-bold' : 'text-[#8B949E] hover:text-white bg-white/5'">
                            <span>⚡ Latência</span>
                        </button>
                        <button type="button" @click="activeTab = 'ai'" 
                                class="px-3 py-1.5 rounded transition-all flex items-center gap-1.5 cursor-pointer"
                                :class="activeTab === 'ai' ? 'bg-cyan/15 text-cyan border border-cyan/40 font-bold' : 'text-[#8B949E] hover:text-white bg-white/5'">
                            <span>🤖 Vertex AI</span>
                        </button>
                        <button type="button" @click="activeTab = 'logs'" 
                                class="px-3 py-1.5 rounded transition-all flex items-center gap-1.5 cursor-pointer"
                                :class="activeTab === 'logs' ? 'bg-white/15 text-white border border-white/40 font-bold' : 'text-[#8B949E] hover:text-white bg-white/5'">
                            <span>📟 Logs</span>
                        </button>
                    </div>

                    <!-- Conteúdo da Aba 1: Latência & Ping -->
                    <div x-show="activeTab === 'ping'" class="pt-4 space-y-3 font-mono text-xs">
                        <div class="space-y-1.5">
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[INFRAESTRUTURA]</span>
                                <span class="text-neon font-semibold">GCP Cloud Run (Serverless)</span>
                            </div>
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[CONTAINER]</span>
                                <span class="text-white">Docker PHP 8.2 Apache (Stateless)</span>
                            </div>
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[REGIÃO NUVEM]</span>
                                <span class="text-cyan">us-central1 (Always Free)</span>
                            </div>
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[LATÊNCIA ATUAL]</span>
                                <span class="text-neon font-bold text-sm" x-text="latency + ' ms'"></span>
                            </div>
                        </div>

                        <!-- Botão de Ação: Testar Ping -->
                        <button type="button" @click="runPing()" 
                                class="w-full py-3 px-4 bg-neon text-obsidian hover:bg-[#00ffaa] transition-all rounded text-center text-xs font-mono font-bold flex items-center justify-center gap-2 shadow-lg shadow-neon/20 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" :class="{ 'animate-spin': pinging }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                            </svg>
                            <span x-text="pinging ? 'MEDINDO LATÊNCIA...' : 'TESTAR PING DA NUVEM'"></span>
                        </button>

                        <!-- Histórico de Pings Recentes -->
                        <div class="flex items-center justify-between text-[11px] text-[#8B949E] pt-1">
                            <span>Histórico Recente:</span>
                            <div class="flex gap-1.5">
                                <template x-for="(val, idx) in history" :key="idx">
                                    <span class="px-2 py-0.5 rounded bg-white/5 border border-white/10 text-white font-semibold" x-text="val + 'ms'"></span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Conteúdo da Aba 2: Vertex AI Gemini 2.0 -->
                    <div x-show="activeTab === 'ai'" class="pt-4 space-y-3 font-mono text-xs" style="display: none;">
                        <div class="space-y-1.5">
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[MODELO IA]</span>
                                <span class="text-cyan font-bold">gemini-2.0-flash</span>
                            </div>
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[PRIVACIDADE]</span>
                                <span class="text-neon font-semibold">Enterprise (Zero Treino)</span>
                            </div>
                            <div class="text-white flex justify-between">
                                <span class="text-[#8B949E]">[CASO DE USO]</span>
                                <span class="text-white">Triagem de Leads & Conteúdo</span>
                            </div>
                        </div>

                        <!-- Botão de Ação: Testar Vertex AI -->
                        <button type="button" @click="runAI()" 
                                class="w-full py-3 px-4 bg-cyan text-obsidian hover:bg-[#33c9ff] transition-all rounded text-center text-xs font-mono font-bold flex items-center justify-center gap-2 shadow-lg shadow-cyan/20 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" :class="{ 'animate-spin': aiProcessing }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                            </svg>
                            <span x-text="aiProcessing ? 'PROCESSANDO COM GEMINI 2.0...' : 'SIMULAR TRIAGEM COM IA'"></span>
                        </button>

                        <!-- Resultado da IA -->
                        <div class="p-3 rounded bg-obsidian/90 border border-white/10 text-[11px] min-h-[46px] flex items-center">
                            <span class="text-neon font-medium" x-text="aiResponse ? aiResponse : 'Clique no botão acima para testar a triagem de lead com a Vertex AI.'"></span>
                        </div>
                    </div>

                    <!-- Conteúdo da Aba 3: Docker Console Logs -->
                    <div x-show="activeTab === 'logs'" class="pt-4 space-y-2 font-mono text-[11px]" style="display: none;">
                        <div class="flex items-center justify-between pb-1">
                            <span class="text-[#8B949E]">Logs em tempo real:</span>
                            <button type="button" @click="clearLogs()" class="text-neon hover:underline text-[10px] cursor-pointer">Limpar Console</button>
                        </div>
                        <div class="p-3 rounded bg-obsidian/90 border border-white/10 max-h-[140px] overflow-y-auto space-y-1.5 text-[#8B949E]">
                            <template x-for="(log, idx) in dockerLogs" :key="idx">
                                <div class="leading-relaxed text-white/90 font-mono" x-text="log"></div>
                            </template>
                        </div>
                    </div>

                    <!-- Quote no Rodapé do Cockpit -->
                    <div class="pt-4 mt-4 border-t border-white/5 flex items-center justify-between text-[11px] font-mono text-[#8B949E]">
                        <span>Engine.Core v4 (CI4)</span>
                        <span class="text-neon font-semibold">Porta 8085 Online</span>
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>

<!-- ==========================================================================
     2. IMPACT METRICS BAR (REVEAL ON SCROLL)
     ========================================================================== -->
<section class="border-y border-white/5 bg-carbine/30 py-12 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="interactive-card p-6 text-center space-y-1" data-tilt>
                <div class="font-display font-extrabold text-3xl sm:text-4xl text-neon">10+</div>
                <div class="text-xs uppercase tracking-wider text-[#8B949E] font-medium">Anos de Experiência</div>
                <div class="text-[11px] text-white/50">Desde 2014 construindo software</div>
            </div>
            <div class="interactive-card p-6 text-center space-y-1" data-tilt>
                <div class="font-display font-extrabold text-3xl sm:text-4xl text-white">100%</div>
                <div class="text-xs uppercase tracking-wider text-[#8B949E] font-medium">Monólitos Enxutos</div>
                <div class="text-[11px] text-white/50">Sem overhead SPA desnecessário</div>
            </div>
            <div class="interactive-card p-6 text-center space-y-1" data-tilt>
                <div class="font-display font-extrabold text-3xl sm:text-4xl text-cyan">Vertex AI</div>
                <div class="text-xs uppercase tracking-wider text-[#8B949E] font-medium">IA Corporativa</div>
                <div class="text-[11px] text-white/50">Triagem e agentes inteligentes</div>
            </div>
            <div class="interactive-card p-6 text-center space-y-1" data-tilt>
                <div class="font-display font-extrabold text-3xl sm:text-4xl text-neon">99.9%</div>
                <div class="text-xs uppercase tracking-wider text-[#8B949E] font-medium">Uptime Serverless</div>
                <div class="text-[11px] text-white/50">Cloud Run + Docker Resiliente</div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. SHOWCASE DE PROJETOS PRINCIPAIS (INTERACTIVE 3D CARDS)
     ========================================================================== -->
<section id="experiencia" class="py-24 relative reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-3">
                <span class="text-neon font-mono text-xs font-semibold tracking-widest uppercase">// PROJETOS EM PRODUÇÃO</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl text-white tracking-tight">
                    Ecossistemas Reais, <br>Resultados Concretos.
                </h2>
            </div>
            <p class="text-[#8B949E] max-w-md text-sm">
                Projetos desenvolvidos sob a diretriz <strong class="text-white">Engine.Core</strong> da Magnus Media, unindo design de alto padrão e estabilidade operacional.
            </p>
        </div>

        <!-- Project Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Project 1: WGP Conectores Elétricos -->
            <div class="interactive-card p-8 flex flex-col justify-between" data-tilt>
                <div class="space-y-5">
                    <div class="flex items-center justify-between text-xs font-mono text-[#8B949E]">
                        <span class="text-neon font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-neon"></span> INDÚSTRIA B2B
                        </span>
                        <span>WGP-2026</span>
                    </div>
                    <h3 class="font-display font-extrabold text-2xl text-white">WGP Conectores Elétricos</h3>
                    <p class="text-[#8B949E] text-sm leading-relaxed">
                        Portal institucional e catálogo técnico industrial com mais de 35 anos de tradição. Desenvolvido em Monólito CI4 com biblioteca corporativa `Mailer.php`, animações cinematográficas GSAP com ScrollTrigger e envio automatizado de propostas.
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="tech-pill">CodeIgniter 4</span>
                        <span class="tech-pill">GSAP 3.12</span>
                        <span class="tech-pill">Alpine.js</span>
                        <span class="tech-pill">Bitbucket CI/CD</span>
                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-white/5 flex items-center justify-between">
                    <span class="text-xs font-mono text-[#8B949E]">Status: Em Produção</span>
                    <a href="https://wgpconectores.com.br" target="_blank" rel="noopener" class="text-neon text-sm font-bold flex items-center gap-1 hover:underline" data-magnetic>
                        <span>Visitar Website</span>
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Project 2: E&C Contábeis -->
            <div class="interactive-card p-8 flex flex-col justify-between" data-tilt>
                <div class="space-y-5">
                    <div class="flex items-center justify-between text-xs font-mono text-[#8B949E]">
                        <span class="text-cyan font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-cyan"></span> FINANÇAS & CONSULTORIA
                        </span>
                        <span>ECCONTABEIS_SITE</span>
                    </div>
                    <h3 class="font-display font-extrabold text-2xl text-white">E&C Contábeis & Consultoria</h3>
                    <p class="text-[#8B949E] text-sm leading-relaxed">
                        Website corporativo, blog técnico com SEO dinâmico e painel administrativo completo. Possui um Simulador Tributário reativo em Alpine.js (cálculo de economia PJ vs CLT) e disparo direto de leads qualificados para o WhatsApp da equipe.
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="tech-pill">Monólito CI4</span>
                        <span class="tech-pill">MySQL 8.0</span>
                        <span class="tech-pill">HTMX</span>
                        <span class="tech-pill">Simulador Tributário</span>
                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-white/5 flex items-center justify-between">
                    <span class="text-xs font-mono text-[#8B949E]">Status: Em Produção</span>
                    <a href="https://eccontabeis.com.br" target="_blank" rel="noopener" class="text-cyan text-sm font-bold flex items-center gap-1 hover:underline" data-magnetic>
                        <span>Visitar Website</span>
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Project 3: Magnus Media OS -->
            <div class="interactive-card p-8 flex flex-col justify-between" data-tilt>
                <div class="space-y-5">
                    <div class="flex items-center justify-between text-xs font-mono text-[#8B949E]">
                        <span class="text-neon font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-neon"></span> BUSINESS OS & PAGAMENTOS
                        </span>
                        <span>MAGNUS_OS</span>
                    </div>
                    <h3 class="font-display font-extrabold text-2xl text-white">Magnus Media OS</h3>
                    <p class="text-[#8B949E] text-sm leading-relaxed">
                        Sistema operacional de gestão financeira e relacionamento da agência. Integração direta com a API v3 do Asaas para faturamento automatizado, geração instantânea de Pix dinâmico, conciliação e réguas de cobrança.
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="tech-pill">Asaas API v3</span>
                        <span class="tech-pill">n8n Engine</span>
                        <span class="tech-pill">Webhooks</span>
                        <span class="tech-pill">Pix Dinâmico</span>
                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-white/5 flex items-center justify-between">
                    <span class="text-xs font-mono text-[#8B949E]">Status: Ativo</span>
                    <span class="text-white/60 text-xs font-mono">Infraestrutura Interna</span>
                </div>
            </div>

            <!-- Project 4: Roblox & GameDev 3D -->
            <div class="interactive-card p-8 flex flex-col justify-between" data-tilt>
                <div class="space-y-5">
                    <div class="flex items-center justify-between text-xs font-mono text-[#8B949E]">
                        <span class="text-yellow-400 font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span> 3D SIMULAÇÃO & GAMES
                        </span>
                        <span>ROBLOX_BLENDER</span>
                    </div>
                    <h3 class="font-display font-extrabold text-2xl text-white">Simulador de Voo 3D — Aerostato</h3>
                    <p class="text-[#8B949E] text-sm leading-relaxed">
                        Simulação física 3D em tempo real construída em Roblox Studio (Luau) e Blender (Python). Modelagem mecânica, camadas atmosféricas, termodinâmica realista de queima e instrumentos analógicos no HUD.
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="tech-pill">Blender 3D</span>
                        <span class="tech-pill">Roblox Luau</span>
                        <span class="tech-pill">Física de Voo</span>
                        <span class="tech-pill">MCP Automação</span>
                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-white/5 flex items-center justify-between">
                    <span class="text-xs font-mono text-[#8B949E]">Status: Em Desenvolvimento</span>
                    <span class="text-white/60 text-xs font-mono">Lab de Inovação</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
     4. ARQUITETURA & PILARES TECNOLÓGICOS (COCKPIT DE ENGENHARIA)
     ========================================================================== -->
<section id="cockpit" class="py-24 bg-carbine/20 border-t border-white/5 reveal-on-scroll" 
         x-data="{ 
             selectedStack: 'ci4',
             stacks: {
                 ci4: {
                     title: 'Monólito Moderno em CodeIgniter 4 (PHP 8.2)',
                     badge: 'VELOCIDADE & SSR NATIVO',
                     desc: 'Renderização do lado do servidor que gera o HTML final em ~14ms. Elimina hydration lag, compilações pesadas de Node e complexidade de estado no frontend. Utiliza Alpine.js e HTMX para interatividade cirúrgica sem recarregar páginas.',
                     command: 'php spark serve --host 0.0.0.0 --port 8085',
                     metrics: 'TTFB: 18ms | Core Web Vitals: 100/100 | Memória: 12MB'
                 },
                 gcp: {
                     title: 'Google Cloud Run & Arquitetura Serverless',
                     badge: 'ESCALA AUTOMÁTICA ATÉ ZERO',
                     desc: 'Containers Docker stateless empacotados com PHP 8.2 e Apache. Escala para zero instâncias quando ocioso (custo zero de CPU/RAM) e atende picos repentinos instantaneamente com certificados SSL automáticos.',
                     command: 'gcloud run deploy cezinhasilva --image gcr.io/magnus/cez:v1 --region us-central1',
                     metrics: 'Always Free: 2M req/mês | Deploy: ~45s | Auto-scale: 0 a 100 instâncias'
                 },
                 vertex: {
                     title: 'Vertex AI & Modelos Gemini 2.0 Flash',
                     badge: 'IA COM PRIVACIDADE EMPRESARIAL',
                     desc: 'Acesso corporativo via Vertex AI no Google Cloud. Garante que os dados de clientes e regras de negócio nunca sejam usados para treinar modelos públicos. Usado para triagem automática de leads e geração de posts SEO.',
                     command: 'curl -X POST https://us-central1-aiplatform.googleapis.com/v1/projects/.../endpoints/...',
                     metrics: 'Latência de Inferência: ~180ms | Contexto: 1M Tokens | Contrato: SOC2/LGPD'
                 },
                 n8n: {
                     title: 'n8n Automation Engine na VM Always Free',
                     badge: 'AUTOMAÇÃO 24/7 CUSTO ZERO',
                     desc: 'Hospedado na instância e2-micro permanente gratuita do GCP. Escuta webhooks de formulários HTMX em tempo real, qualifica leads com a Vertex AI e envia alertas instantâneos no WhatsApp e CRM da diretoria.',
                     command: 'docker compose -f docker-compose.n8n.yml up -d',
                     metrics: 'Disparo de WhatsApp: < 30s | Uptime: 99.99% | Custo de Nuvem: R$ 0,00'
                 }
             }
         }">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-3">
            <span class="text-neon font-mono text-xs font-semibold tracking-widest uppercase">// COCKPIT DE ENGENHARIA & STACK</span>
            <h2 class="font-display font-black text-3xl sm:text-5xl text-white tracking-tight">
                Construído para Durar. <br>Feito para Escalar.
            </h2>
            <p class="text-[#8B949E] text-sm">
                Selecione um dos pilares abaixo para inspecionar os detalhes arquiteturais em tempo real:
            </p>
        </div>

        <!-- Seletor de Abas Interativo com Botões -->
        <div class="flex flex-wrap items-center justify-center gap-2 mb-8">
            <button type="button" @click="selectedStack = 'ci4'" 
                    class="px-4 py-2.5 rounded-lg font-mono text-xs font-semibold transition-all border cursor-pointer"
                    :class="selectedStack === 'ci4' ? 'bg-neon text-obsidian border-neon shadow-lg shadow-neon/20' : 'bg-carbine text-[#8B949E] border-white/10 hover:text-white hover:border-white/20'">
                🏛️ Monólito CI4
            </button>
            <button type="button" @click="selectedStack = 'gcp'" 
                    class="px-4 py-2.5 rounded-lg font-mono text-xs font-semibold transition-all border cursor-pointer"
                    :class="selectedStack === 'gcp' ? 'bg-cyan text-obsidian border-cyan shadow-lg shadow-cyan/20' : 'bg-carbine text-[#8B949E] border-white/10 hover:text-white hover:border-white/20'">
                ☁️ GCP Cloud Run
            </button>
            <button type="button" @click="selectedStack = 'vertex'" 
                    class="px-4 py-2.5 rounded-lg font-mono text-xs font-semibold transition-all border cursor-pointer"
                    :class="selectedStack === 'vertex' ? 'bg-neon text-obsidian border-neon shadow-lg shadow-neon/20' : 'bg-carbine text-[#8B949E] border-white/10 hover:text-white hover:border-white/20'">
                🤖 Vertex AI
            </button>
            <button type="button" @click="selectedStack = 'n8n'" 
                    class="px-4 py-2.5 rounded-lg font-mono text-xs font-semibold transition-all border cursor-pointer"
                    :class="selectedStack === 'n8n' ? 'bg-white text-obsidian border-white shadow-lg shadow-white/20' : 'bg-carbine text-[#8B949E] border-white/10 hover:text-white hover:border-white/20'">
                ⚡ n8n Automations
            </button>
        </div>

        <!-- Painel de Inspeção Dinâmica da Stack Selecionada -->
        <div class="interactive-card p-6 sm:p-8 rounded-xl border border-white/10 mb-12" data-tilt>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
                <div class="space-y-1">
                    <span class="text-neon font-mono text-xs font-bold" x-text="stacks[selectedStack].badge"></span>
                    <h3 class="font-display font-extrabold text-2xl text-white" x-text="stacks[selectedStack].title"></h3>
                </div>
                <div class="px-3 py-1.5 rounded bg-white/5 border border-white/10 text-xs font-mono text-[#8B949E]">
                    Telemetria: <span class="text-white font-semibold" x-text="stacks[selectedStack].metrics"></span>
                </div>
            </div>
            <div class="pt-6 space-y-4">
                <p class="text-[#8B949E] text-sm leading-relaxed" x-text="stacks[selectedStack].desc"></p>
                <div class="p-3 rounded bg-obsidian border border-white/5 font-mono text-xs flex items-center justify-between">
                    <span class="text-neon">$ <span class="text-white" x-text="stacks[selectedStack].command"></span></span>
                    <span class="text-[10px] text-[#8B949E]">Terminal Ativo</span>
                </div>
            </div>
        </div>

        <!-- 3 Pilares Resumidos -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Pillar 1: Backend Monolith -->
            <div class="interactive-card p-8 space-y-4 cursor-pointer" @click="selectedStack = 'ci4'" data-tilt>
                <div class="w-12 h-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-neon">
                    <i data-lucide="server" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Monólito Moderno</h3>
                <p class="text-[#8B949E] text-sm leading-relaxed">
                    CodeIgniter 4 em PHP 8.2 puro. Renderização SSR ultra-rápida que entrega o HTML pronto para o navegador em milissegundos.
                </p>
            </div>

            <!-- Pillar 2: Google Cloud & Serverless -->
            <div class="interactive-card p-8 space-y-4 cursor-pointer" @click="selectedStack = 'gcp'" data-tilt>
                <div class="w-12 h-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-cyan">
                    <i data-lucide="cloud-lightning" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Google Cloud Serverless</h3>
                <p class="text-[#8B949E] text-sm leading-relaxed">
                    Aplicações empacotadas em containers Docker no Cloud Run. Escalam até zero quando ociosas e suportam picos com custo otimizado.
                </p>
            </div>

            <!-- Pillar 3: Vertex AI & n8n -->
            <div class="interactive-card p-8 space-y-4 cursor-pointer" @click="selectedStack = 'vertex'" data-tilt>
                <div class="w-12 h-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-neon">
                    <i data-lucide="bot" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Vertex AI & Automação</h3>
                <p class="text-[#8B949E] text-sm leading-relaxed">
                    Integração com Gemini 2.0 Flash com segurança empresarial. Triagem de leads, geração de conteúdo SEO e automações n8n.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================================================
     5. FORMULÁRIO DE CONTATO DIRETO (INTERACTIVE BRIEFING)
     ========================================================================== -->
<section id="contato" class="py-24 relative reveal-on-scroll">
    <div class="max-w-4xl mx-auto px-6">
        
        <div class="interactive-card p-8 sm:p-12 border border-white/10 rounded-2xl relative" data-tilt>
            
            <div class="space-y-4 text-center max-w-xl mx-auto mb-10">
                <div class="badge-status">
                    <span class="badge-pulse-dot"></span>
                    <span>CANAL DIRETO ABERTO</span>
                </div>
                <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                    Vamos Construir Seu Próximo Sistema?
                </h2>
                <p class="text-[#8B949E] text-sm">
                    Envie os detalhes do seu projeto ou tire dúvidas sobre arquitetura, migração para Google Cloud ou automações com Vertex AI.
                </p>
            </div>

            <!-- Interactive Form with Alpine.js feedback & Honeypot Protection -->
            <form x-data="{ 
                      sent: false, 
                      name: '', 
                      phone: '',
                      email: '', 
                      message: '',
                      b_hp: '',
                      loading: false,
                      errorMessage: '',
                      submitForm() {
                          this.errorMessage = '';
                          if (this.name && this.email && this.message) {
                              this.loading = true;
                              fetch('/api/contact', {
                                  method: 'POST',
                                  headers: { 'Content-Type': 'application/json' },
                                  body: JSON.stringify({ 
                                      name: this.name, 
                                      phone: this.phone,
                                      email: this.email, 
                                      message: this.message,
                                      b_hp: this.b_hp
                                  })
                              })
                              .then(async (res) => {
                                  this.loading = false;
                                  const data = await res.json().catch(() => ({}));
                                  if (res.ok) {
                                      this.sent = true;
                                  } else {
                                      this.errorMessage = data.message || 'Ocorreu um erro ao enviar. Tente novamente mais tarde.';
                                  }
                              })
                              .catch(() => {
                                  this.loading = false;
                                  this.errorMessage = 'Não foi possível conectar ao servidor. Tente novamente.';
                              });
                          }
                      }
                  }" 
                  @submit.prevent="submitForm()" 
                  class="space-y-6">

                <!-- Campo Honeypot Oculto (Anti-Spam / Bots) -->
                <div style="display:none !important; position:absolute; left:-9999px;" aria-hidden="true">
                    <input type="text" x-model="b_hp" tabindex="-1" autocomplete="off" name="website_trap_field">
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#8B949E]">Seu Nome *</label>
                        <input type="text" x-model="name" required placeholder="Ex: Lucas Ferreira" maxlength="100"
                               class="w-full px-4 py-3 rounded-lg bg-obsidian/80 border border-white/10 text-white placeholder-white/20 focus:outline-none focus:border-neon transition-colors text-sm">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#8B949E]">WhatsApp / Telefone *</label>
                        <input type="tel" x-model="phone" required placeholder="(11) 99999-9999" maxlength="25"
                               class="w-full px-4 py-3 rounded-lg bg-obsidian/80 border border-white/10 text-white placeholder-white/20 focus:outline-none focus:border-neon transition-colors text-sm">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#8B949E]">E-mail Corporativo *</label>
                    <input type="email" x-model="email" required placeholder="lucas@suaempresa.com.br" maxlength="150"
                           class="w-full px-4 py-3 rounded-lg bg-obsidian/80 border border-white/10 text-white placeholder-white/20 focus:outline-none focus:border-neon transition-colors text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#8B949E]">O que você precisa desenvolver ou migrar? *</label>
                    <textarea x-model="message" rows="4" required placeholder="Descreva brevemente o projeto, portal, automação ou dúvida..." maxlength="3000"
                              class="w-full px-4 py-3 rounded-lg bg-obsidian/80 border border-white/10 text-white placeholder-white/20 focus:outline-none focus:border-neon transition-colors text-sm"></textarea>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                    <span class="text-xs font-mono text-[#8B949E]">
                        Tempo de resposta: <strong class="text-neon">&lt; 4 horas</strong>
                    </span>
                    <button type="submit" :disabled="loading" class="btn-magnetic-primary w-full sm:w-auto justify-center disabled:opacity-50" data-magnetic data-magnetic-strength="0.3">
                        <span x-text="loading ? 'Enviando...' : 'Enviar Mensagem'"></span>
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </div>

                <!-- Error Feedback Message -->
                <div x-show="errorMessage" x-transition class="p-4 rounded-lg bg-red-500/10 border border-red-500/30 text-center text-red-400 text-sm font-mono mt-4" style="display: none;" x-text="errorMessage">
                </div>

                <!-- Success Feedback Message -->
                <div x-show="sent" x-transition class="p-4 rounded-lg bg-neon/10 border border-neon/30 text-center text-neon text-sm font-mono mt-4" style="display: none;">
                    ✓ Mensagem recebida! Entraremos em contato imediatamente para o seu briefing técnico.
                </div>
            </form>

        </div>
    </div>
</section>

<?= $this->endSection() ?>