<?= $this->extend('layouts/achadinhos') ?>

<?= $this->section('content') ?>
<div class="px-4 md:px-20 lg:px-40 flex flex-1 justify-center py-6">
    <div class="layout-content-container flex flex-col max-w-[1140px] flex-1">
        
        <!-- HERO BANNER -->
        <div class="relative bg-white/70 dark:bg-stone-900/80 p-6 md:p-10 sketch-border-sm shadow-sm mb-10 overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col gap-4 text-left max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 text-primary text-xs font-black uppercase tracking-wider sketch-border-sm w-fit">
                        <span class="material-symbols-outlined text-sm">verified</span> Curadoria Oficial Shopee
                    </div>
                    <h1 class="text-3xl md:text-5xl font-black italic tracking-tight text-[#181311] dark:text-white leading-tight">
                        Achadinhos da Shopee: <span class="text-primary underline decoration-wavy">Casa & Praticidade</span>
                    </h1>
                    <p class="text-base md:text-lg font-medium text-stone-700 dark:text-stone-300">
                        Gadgets inteligentes, utilidades de cozinha e soluções práticas de organização com preços que cabem no bolso. Produtos testados, com cupons ativos e links diretos e seguros.
                    </p>
                    
                    <!-- BOTOES DE ACAO E COMUNIDADE -->
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="https://whatsapp.com" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 bg-[#25D366] text-white px-5 py-3 rounded-lg font-bold text-sm tracking-wide sketch-border-sm hover:scale-105 transition-transform shadow-md">
                            <span class="material-symbols-outlined text-lg">chat</span>
                            <span>Grupo VIP de Ofertas</span>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 bg-[#FF0000] text-white px-5 py-3 rounded-lg font-bold text-sm tracking-wide sketch-border-sm hover:scale-105 transition-transform shadow-md">
                            <span class="material-symbols-outlined text-lg">play_circle</span>
                            <span>Assistir Reviews no YouTube</span>
                        </a>
                    </div>
                </div>

                <div class="hidden md:flex flex-col items-center justify-center p-6 bg-amber-50 dark:bg-stone-800 sketch-border rotate-2 text-center max-w-[240px]">
                    <span class="material-symbols-outlined text-5xl text-primary mb-2">bolt</span>
                    <span class="text-lg font-black italic text-sketchy">Cupons Relâmpago</span>
                    <span class="text-xs text-stone-600 dark:text-stone-300 mt-1">Atualizado diariamente direto pelo nosso robô de ofertas com IA.</span>
                </div>
            </div>
        </div>

        <!-- FILTROS E BUSCA -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
            <!-- CATEGORIAS -->
            <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                <?php foreach ($categorias as $chave => $cat): ?>
                    <?php $ativo = ($categoriaAtual === $chave); ?>
                    <a href="<?= site_url('achadinhos?categoria=' . urlencode($chave)) ?>"
                       class="px-4 py-2 text-xs md:text-sm font-bold sketch-border-sm transition-all flex items-center gap-1.5 <?= $ativo ? 'bg-[#181311] text-white dark:bg-white dark:text-[#181311] scale-105' : 'bg-white dark:bg-stone-800 text-stone-700 dark:text-stone-200 hover:border-primary' ?>">
                        <span class="material-symbols-outlined text-sm"><?= esc($cat['icone']) ?></span>
                        <span><?= esc($cat['nome']) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- CAMPO DE BUSCA -->
            <form action="<?= site_url('achadinhos') ?>" method="GET" class="w-full md:w-72">
                <?php if ($categoriaAtual !== 'todos'): ?>
                    <input type="hidden" name="categoria" value="<?= esc($categoriaAtual) ?>">
                <?php endif; ?>
                <div class="relative flex items-center">
                    <input type="text" name="q" value="<?= esc($busca) ?>" placeholder="Buscar achadinho..."
                           class="w-full bg-white dark:bg-stone-800 text-sm px-4 py-2.5 pr-10 sketch-border-sm border-2 border-[#181311] dark:border-stone-700 focus:outline-none focus:border-primary">
                    <button type="submit" class="absolute right-2 text-stone-500 hover:text-primary">
                        <span class="material-symbols-outlined text-lg">search</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- GRID DE PRODUTOS -->
        <?php if (!empty($produtos)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($produtos as $p): ?>
                    <div class="bg-white dark:bg-stone-900 sketch-border-sm flex flex-col justify-between overflow-hidden group hover:-translate-y-1 transition-all duration-200 shadow-sm">
                        
                        <!-- IMAGEM COM BADGES -->
                        <div class="relative w-full aspect-square bg-stone-100 dark:bg-stone-800 overflow-hidden border-b-2 border-[#181311] dark:border-stone-700">
                            <?php if (!empty($p['image_url'])): ?>
                                <img src="<?= esc($p['image_url']) ?>" alt="<?= esc($p['title']) ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex flex-col items-center justify-center text-stone-400">
                                    <span class="material-symbols-outlined text-5xl">shopping_bag</span>
                                </div>
                            <?php endif; ?>

                            <!-- BADGE DESCONTO -->
                            <?php if (!empty($p['discount_percent']) && $p['discount_percent'] > 0): ?>
                                <span class="absolute top-2 left-2 bg-primary text-white text-xs font-black px-2.5 py-1 sketch-border-sm shadow-sm">
                                    🔥 <?= (int) $p['discount_percent'] ?>% OFF
                                </span>
                            <?php endif; ?>

                            <!-- BADGE YOUTUBE SE HOUVER VÍDEO -->
                            <?php if (!empty($p['youtube_short_url'])): ?>
                                <a href="<?= esc($p['youtube_short_url']) ?>" target="_blank" rel="noopener"
                                   class="absolute bottom-2 right-2 bg-black/80 hover:bg-red-600 text-white p-1.5 rounded-full flex items-center justify-center transition-colors" title="Ver review em vídeo">
                                    <span class="material-symbols-outlined text-sm">play_arrow</span>
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- CONTEUDO -->
                        <div class="p-4 flex flex-col flex-grow justify-between gap-3">
                            <div>
                                <span class="text-[11px] font-bold text-stone-500 uppercase tracking-wider block mb-1">
                                    <?= esc($p['category']) ?>
                                </span>
                                <h3 class="text-sm font-black text-[#181311] dark:text-white leading-snug line-clamp-2" title="<?= esc($p['title']) ?>">
                                    <?= esc($p['title']) ?>
                                </h3>
                                <?php if (!empty($p['description'])): ?>
                                    <p class="text-xs text-stone-600 dark:text-stone-400 mt-1 line-clamp-2">
                                        <?= esc($p['description']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <!-- PREÇO E CTA -->
                            <div class="pt-2 border-t border-dashed border-stone-200 dark:border-stone-800">
                                <div class="flex items-baseline gap-2 mb-3">
                                    <?php if (!empty($p['price_original']) && $p['price_original'] > $p['price_promo']): ?>
                                        <span class="text-xs text-stone-400 line-through">
                                            R$ <?= number_format($p['price_original'], 2, ',', '.') ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="text-lg font-black text-primary">
                                        R$ <?= number_format($p['price_promo'], 2, ',', '.') ?>
                                    </span>
                                </div>

                                <a href="<?= site_url('achadinhos/go/' . $p['id']) ?>" target="_blank" rel="nofollow noopener"
                                   class="w-full flex items-center justify-center gap-2 bg-[#181311] hover:bg-primary dark:bg-stone-800 dark:hover:bg-primary text-white text-xs font-black uppercase tracking-wider py-2.5 px-4 sketch-border-sm transition-colors">
                                    <span>Ver na Shopee</span>
                                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <!-- EMPTY STATE ELEGANTE -->
            <div class="bg-white/80 dark:bg-stone-900 p-12 sketch-border-sm text-center flex flex-col items-center justify-center gap-4 my-8">
                <div class="size-16 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">shopping_cart_checkout</span>
                </div>
                <h3 class="text-xl font-black italic">Nenhum achadinho encontrado no momento!</h3>
                <p class="text-sm text-stone-600 dark:text-stone-400 max-w-md">
                    Nosso robô inteligente está vasculhando os melhores cupons e novidades da Shopee agora mesmo. Entre no grupo VIP para receber em primeira mão!
                </p>
                <a href="https://whatsapp.com" target="_blank" rel="noopener"
                   class="bg-primary text-white px-6 py-3 rounded-lg font-bold text-sm tracking-wide sketch-border-sm hover:scale-105 transition-transform">
                    Entrar no Grupo VIP
                </a>
            </div>
        <?php endif; ?>

        <!-- BANNER DE RASTREIO E CONFIANÇA -->
        <div class="mt-14 p-6 bg-stone-100 dark:bg-stone-800/50 sketch-border-sm text-xs text-stone-600 dark:text-stone-400 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-2xl text-primary">security</span>
                <span><strong>Compra Segura:</strong> Ao clicar nos botões, você é redirecionado diretamente para o aplicativo ou site oficial da Shopee Brasil.</span>
            </div>
            <div class="text-right italic">
                Cezinha Silva © Achadinhos & Tecnologia
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
