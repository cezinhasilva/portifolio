<!DOCTYPE html>
<html class="light" lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= esc($titulo ?? 'Achadinhos Shopee | Casa Inteligente & Praticidade') ?></title>
    <meta name="description" content="<?= esc($meta_descricao ?? 'Os melhores achados e ofertas secretas da Shopee para transformar sua casa.') ?>" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&amp;family=Patrick+Hand&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.9.2/dist/paper.min.css">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ee4d2d", /* Laranja Shopee */
                        "secondary": "#25D366", /* Verde WhatsApp */
                        "background-light": "#fbf9f8",
                        "background-dark": "#1a1615",
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"],
                        "handwritten": ["Patrick Hand", "cursive"],
                        "sketchy": ["Gochi Hand", "cursive"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        .sketch-border {
            border: 2px solid #181311;
            border-radius: 255px 15px 225px 15px/15px 225px 15px 255px;
        }
        .sketch-border-sm {
            border: 2px solid #181311;
            border-radius: 4px 12px 6px 14px/10px 4px 12px 5px;
        }
        .paper-texture {
            background-color: #fbf9f8;
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .dark .paper-texture {
            background-color: #1a1615;
            background-image: radial-gradient(#2d2825 1px, transparent 1px);
        }
        .dark .sketch-border, .dark .sketch-border-sm {
            border-color: #443c38;
        }
    </style>
</head>

<body class="paper-texture font-display text-[#181311] dark:text-white transition-colors duration-300">
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            
            <!-- CABEÇALHO DEDICADO DE ACHADINHOS -->
            <div class="px-4 md:px-20 lg:px-40 flex justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[1140px] flex-1">
                    <header
                        class="flex flex-col sm:flex-row items-center justify-between gap-4 border-b-2 border-solid border-[#181311] dark:border-stone-700 px-6 py-4 sketch-border-sm bg-white/90 dark:bg-stone-900/90 shadow-sm">
                        
                        <!-- LOGO ACHADOS DO CEZINHA -->
                        <div class="flex items-center gap-3">
                            <a href="<?= site_url('achadinhos') ?>" class="flex items-center gap-3 group">
                                <div class="size-11 rounded-xl bg-primary text-white flex items-center justify-center sketch-border-sm group-hover:scale-105 transition-transform shadow-sm">
                                    <span class="material-symbols-outlined text-2xl">shopping_bag</span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h1 class="text-xl font-black italic tracking-tight text-sketchy leading-none text-primary">
                                            Achados do Cezinha
                                        </h1>
                                        <span class="bg-amber-100 text-amber-800 text-[10px] font-black px-1.5 py-0.5 rounded uppercase tracking-wider">Shopee</span>
                                    </div>
                                    <p class="text-[11px] font-bold text-stone-500 dark:text-stone-400">Curadoria de Casa Inteligente & Praticidade</p>
                                </div>
                            </a>
                        </div>

                        <!-- NAVEGAÇÃO E AÇÕES -->
                        <div class="flex items-center gap-4 sm:gap-6">
                            <!-- LINK DISCRETO PARA O PORTFÓLIO DE DEV -->
                            <a class="text-xs font-bold text-stone-600 dark:text-stone-300 hover:text-primary flex items-center gap-1 transition-colors"
                                href="<?= site_url('/') ?>" title="Ir para o site profissional de Desenvolvedor">
                                <span class="material-symbols-outlined text-base">code</span>
                                <span>Portfólio Dev</span>
                            </a>

                            <!-- BOTÃO GRUPO VIP WHATSAPP -->
                            <a href="https://chat.whatsapp.com" target="_blank" rel="noopener"
                                class="flex items-center gap-2 bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs font-black tracking-wide px-4 py-2.5 rounded-lg sketch-border-sm hover:scale-105 transition-all shadow-md">
                                <span class="material-symbols-outlined text-sm">notifications_active</span>
                                <span>Grupo VIP de Cupons</span>
                            </a>
                        </div>
                    </header>
                </div>
            </div>

            <!-- CONTEÚDO DA VITRINE -->
            <main class="flex-grow">
                <?= $this->renderSection('content') ?>
            </main>

            <!-- RODAPÉ DEDICADO DE AFILIADOS -->
            <footer class="px-4 md:px-20 lg:px-40 py-10 mt-12 border-t border-stone-300 dark:border-stone-800 flex flex-col items-center justify-center gap-4 text-center">
                <div class="flex items-center gap-2 text-stone-700 dark:text-stone-300 text-xs font-bold">
                    <span class="material-symbols-outlined text-primary text-base">verified_user</span>
                    <span>Programa Oficial de Afiliados Shopee Brasil</span>
                </div>
                <p class="text-xs text-stone-500 dark:text-stone-400 max-w-xl leading-relaxed">
                    Divulgação de Transparência: Este site contém links de afiliados. Ao comprar através deles, recebemos uma pequena comissão oficial da Shopee sem nenhum custo extra para você. Isso apoia a continuidade da curadoria e reviews no canal!
                </p>
                <div class="text-xs font-bold text-stone-400 mt-2">
                    <a href="<?= site_url('/') ?>" class="underline hover:text-primary">Voltar para cezinhasilva.com</a> • © <?= date('Y') ?> Achados do Cezinha
                </div>
            </footer>

        </div>
    </div>
</body>

</html>
