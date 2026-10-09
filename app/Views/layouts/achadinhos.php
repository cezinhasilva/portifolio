<!DOCTYPE html>
<html class="light" lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= esc($titulo ?? 'Facilidades para Casa & Dia a Dia | Achados do Cezinha') ?></title>
    <meta name="description" content="<?= esc($meta_descricao ?? 'Produtos simples, prÃ¡ticos e fÃ¡ceis de usar para facilitar a sua vida em casa. Compras seguras e direto na loja oficial.') ?>" />
    
    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- FONTES ULTRA LEGÃVEIS (Inter + Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <!-- MATERIAL SYMBOLS -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ee4d2d", /* Laranja Oficial Shopee */
                        "primary-hover": "#d03b1d",
                        "whatsapp": "#25D366", /* Verde WhatsApp */
                        "whatsapp-hover": "#1ebd58",
                        "surface": "#ffffff",
                        "surface-soft": "#f8fafc",
                        "text-main": "#0f172a", /* Preto de alto contraste */
                        "text-muted": "#475569",
                    },
                    fontFamily: {
                        "sans": ["'Plus Jakarta Sans'", "'Inter'", "system-ui", "-apple-system", "sans-serif"],
                    },
                },
            },
        }
    </script>

    <style>
        :root {
            --font-scale: 1;
        }
        body {
            font-size: calc(1rem * var(--font-scale));
            line-height: 1.6;
        }
        /* Foco acessÃ­vel com borda destacada para teclado e leitor de tela */
        a:focus-visible, button:focus-visible, input:focus-visible {
            outline: 3px solid #ee4d2d !important;
            outline-offset: 2px !important;
        }
    </style>
</head>

<body class="bg-slate-50 dark:bg-slate-950 font-sans text-text-main dark:text-slate-100 min-h-screen flex flex-col transition-all duration-200">
    
    <!-- BARRA SUPERIOR DE ACESSIBILIDADE & CONFIANÃ‡A -->
    <div class="bg-slate-900 text-white text-xs sm:text-sm py-2.5 px-4 border-b border-slate-800">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-3">
            
            <!-- AVISO DE SEGURANÃ‡A -->
            <div class="flex items-center gap-2 font-medium">
                <span class="material-symbols-outlined text-emerald-400 text-lg">verified_user</span>
                <span>Site 100% Seguro â€¢ Links Diretos para a Loja Oficial Shopee</span>
            </div>

            <!-- CONTROLES DE ACESSIBILIDADE (AUMENTAR LETRA) -->
            <div class="flex items-center gap-2">
                <span class="text-slate-300 font-semibold hidden sm:inline">Tamanho da Letra:</span>
                <button type="button" onclick="changeFontSize(-0.1)" title="Diminuir tamanho da letra"
                        class="px-2.5 py-1 bg-slate-800 hover:bg-slate-700 rounded text-xs font-bold border border-slate-700 transition-colors">
                    A -
                </button>
                <button type="button" onclick="resetFontSize()" title="Tamanho normal da letra"
                        class="px-2.5 py-1 bg-slate-800 hover:bg-slate-700 rounded text-xs font-bold border border-slate-700 transition-colors">
                    PadrÃ£o
                </button>
                <button type="button" onclick="changeFontSize(0.1)" title="Aumentar tamanho da letra"
                        class="px-2.5 py-1 bg-slate-800 hover:bg-slate-700 rounded text-xs font-bold border border-slate-700 transition-colors">
                    A +
                </button>
            </div>

        </div>
    </div>

    <!-- CABEÃ‡ALHO PRINCIPAL LIMPO E CLARO -->
    <header class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 shadow-xs">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- LOGO / NOME DO SITE -->
            <a href="<?= site_url('achadinhos') ?>" class="flex items-center gap-3.5 group">
                <div class="size-12 rounded-xl bg-primary text-white flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-3xl">shopping_bag</span>
                </div>
                <div>
                    <span class="text-xl sm:text-2xl font-black tracking-tight text-slate-900 dark:text-white block leading-tight">
                        Achados do Cezinha
                    </span>
                    <span class="text-xs sm:text-sm font-semibold text-primary block">
                        Facilidades e Praticidade para Sua Casa
                    </span>
                </div>
            </a>

            <!-- AJUDA HUMANIZADA WHATSAPP NO TOPO -->
            <div class="flex items-center gap-3">
                <a href="https://wa.me/5511985835183?text=Ol%C3%A1%2C%20gostei%20de%20um%20produto%20na%20sua%20vitrine%20e%20gostaria%20de%20ajuda%20para%20comprar!" 
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-4 py-2.5 rounded-lg text-sm shadow-sm transition-all hover:scale-102">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                    <span>Ajuda no WhatsApp</span>
                </a>
            </div>

        </div>
    </header>

    <!-- CONTEÃšDO PRINCIPAL -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- RODAPÃ‰ EXPLICATIVO E ACOLHEDOR -->
    <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 mt-16 py-10 px-4">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-start justify-between gap-8">
            
            <div class="max-w-md">
                <div class="flex items-center gap-2 font-bold text-base text-slate-900 dark:text-white mb-2">
                    <span class="material-symbols-outlined text-primary">help</span>
                    <span>Como funciona comprar por aqui?</span>
                </div>
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                    VocÃª escolhe o produto que gostou, clica no botÃ£o e serÃ¡ direcionado com total seguranÃ§a para o aplicativo ou site oficial da <strong>Shopee</strong>. O pagamento Ã© feito direto na Shopee (por Pix ou Boleto) e vocÃª recebe tudo na sua casa com cÃ³digo de rastreamento.
                </p>
            </div>

            <div class="max-w-xs">
                <div class="flex items-center gap-2 font-bold text-base text-slate-900 dark:text-white mb-2">
                    <span class="material-symbols-outlined text-emerald-600">lock</span>
                    <span>Compra 100% Protegida</span>
                </div>
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                    NÃ³s selecionamos apenas vendedores confiÃ¡veis e produtos bem avaliados para garantir que vocÃª faÃ§a compras sem dor de cabeÃ§a.
                </p>
            </div>

            <div class="text-xs text-slate-500 flex flex-col gap-1">
                <span>Â© <?= date('Y') ?> Achados do Cezinha â€¢ Curadoria de Produtos Ãšteis</span>
                <span>Links de afiliado oficial Shopee.</span>
                <a href="<?= site_url('/') ?>" class="text-primary hover:underline font-semibold mt-2 inline-block">
                    Conhecer o site pessoal de Cezinha Silva â†’
                </a>
            </div>

        </div>
    </footer>

    <!-- SCRIPT DE ZOOM ACESSÃVEL (A+ / A-) -->
    <script>
        let currentScale = parseFloat(localStorage.getItem('cezinha_font_scale')) || 1.0;
        document.documentElement.style.setProperty('--font-scale', currentScale);

        function changeFontSize(delta) {
            currentScale = Math.min(Math.max(currentScale + delta, 0.85), 1.35);
            document.documentElement.style.setProperty('--font-scale', currentScale);
            localStorage.setItem('cezinha_font_scale', currentScale);
        }

        function resetFontSize() {
            currentScale = 1.0;
            document.documentElement.style.setProperty('--font-scale', currentScale);
            localStorage.setItem('cezinha_font_scale', currentScale);
        }
    </script>
</body>
</html>
