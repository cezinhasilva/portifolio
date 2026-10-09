<?= $this->extend('layouts/achadinhos') ?>

<?= $this->section('content') ?>
<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- BANNER ACOLHEDOR PRINCIPAL -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xs mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            
            <div class="flex-1 text-left">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-800 dark:bg-amber-950 dark:text-amber-200 text-xs sm:text-sm font-bold rounded-full mb-3 border border-amber-200 dark:border-amber-800">
                    <span class="material-symbols-outlined text-base">thumb_up</span> Produtos Testados & Aprovados
                </span>
                
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight mb-3">
                    Coisas Práticas para Facilitar o Seu Dia a Dia em Casa
                </h1>
                
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 font-medium leading-relaxed max-w-2xl mb-5">
                    Aqui você encontra utilidades simples, que não dão trabalho para usar e têm preço baixo. Escolha o que precisa e compre com tranquilidade na loja oficial.
                </p>

                <!-- CARD DE CONFIANÇA & WHATSAPP DIRETO -->
                <div class="bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800/80 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="size-11 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-2xl">support_agent</span>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 dark:text-white text-sm sm:text-base block">
                                Tem dúvida de como fazer o pedido pela internet?
                            </span>
                            <span class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 block">
                                Não se preocupe! Te ajudamos passo a passo no WhatsApp sem custo nenhum.
                            </span>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/5511985835183?text=Ol%C3%A1%2C%20gostaria%20de%20ajuda%20para%20comprar%20um%20produto%20da%20vitrine!" 
                       target="_blank" rel="noopener"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-3 rounded-lg text-sm sm:text-base shrink-0 shadow-sm transition-transform active:scale-95">
                        <span class="material-symbols-outlined text-xl">chat</span>
                        <span>Falar no WhatsApp</span>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <!-- SELEÇÃO DE CATEGORIAS SIMPLES & BUSCA -->
    <div class="flex flex-col gap-5 mb-8">
        
        <!-- BARRA DE BUSCA GRANDE E CLARA -->
        <form action="<?= site_url('achadinhos') ?>" method="GET" class="w-full">
            <?php if ($categoriaAtual !== 'todos'): ?>
                <input type="hidden" name="categoria" value="<?= esc($categoriaAtual) ?>">
            <?php endif; ?>
            <div class="relative flex items-center">
                <input type="text" name="q" value="<?= esc($busca) ?>" 
                       placeholder="Procurar um produto... (Ex: triturador, lâmpada, vassoura, organizador)"
                       class="w-full bg-white dark:bg-slate-900 text-base sm:text-lg px-5 py-4 pl-12 rounded-xl border-2 border-slate-300 dark:border-slate-700 focus:border-primary dark:focus:border-primary shadow-xs placeholder-slate-400">
                <span class="material-symbols-outlined text-slate-400 absolute left-4 text-2xl">search</span>
                
                <?php if (!empty($busca)): ?>
                    <a href="<?= site_url('achadinhos') ?>" class="absolute right-28 text-xs font-bold text-slate-500 hover:text-slate-800 bg-slate-100 px-2 py-1 rounded">
                        Limpar busca
                    </a>
                <?php endif; ?>

                <button type="submit" 
                        class="absolute right-2 bg-primary hover:bg-primary-hover text-white font-bold px-6 py-2.5 rounded-lg text-sm sm:text-base transition-colors">
                    Buscar
                </button>
            </div>
        </form>

        <!-- BOTÕES GRANDES DE CATEGORIAS -->
        <div>
            <span class="text-xs sm:text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider block mb-2">
                Escolha o que você procura:
            </span>
            <div class="flex flex-wrap items-center gap-2.5">
                <?php foreach ($categorias as $chave => $cat): ?>
                    <?php $ativo = ($categoriaAtual === $chave); ?>
                    <a href="<?= site_url('achadinhos?categoria=' . urlencode($chave)) ?>"
                       class="px-4 py-3 text-sm sm:text-base font-bold rounded-xl transition-all flex items-center gap-2 border-2 <?= $ativo ? 'bg-primary text-white border-primary shadow-sm scale-102' : 'bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 border-slate-200 dark:border-slate-800 hover:border-slate-400' ?>">
                        <span class="material-symbols-outlined text-xl"><?= esc($cat['icone']) ?></span>
                        <span><?= esc($cat['nome']) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- LISTA DE PRODUTOS (CARDS LIMPOS E ESPAÇOSOS) -->
    <?php if (!empty($produtos)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($produtos as $p): ?>
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-md transition-shadow">
                    
                    <!-- FOTO DO PRODUTO COM BADGE DE DESCONTO -->
                    <div class="relative w-full aspect-square bg-slate-100 dark:bg-slate-800 overflow-hidden border-b border-slate-200 dark:border-slate-800">
                        <?php if (!empty($p['image_url'])): ?>
                            <img src="<?= esc($p['image_url']) ?>" alt="<?= esc($p['title']) ?>"
                                 class="w-full h-full object-cover" loading="lazy" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-100 dark:bg-slate-800\'><span class=\'material-symbols-outlined text-6xl\'>inventory_2</span><span class=\'text-xs font-semibold mt-1\'>Foto Oficial</span></div>';">
                        <?php else: ?>
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                <span class="material-symbols-outlined text-6xl">inventory_2</span>
                                <span class="text-xs font-semibold mt-1">Foto Oficial</span>
                            </div>
                        <?php endif; ?>

                        <!-- SELO DE DESCONTO CLARO -->
                        <?php if (!empty($p['discount_percent']) && $p['discount_percent'] > 0): ?>
                            <span class="absolute top-3 left-3 bg-emerald-600 text-white text-xs sm:text-sm font-extrabold px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">savings</span>
                                Economize <?= (int) $p['discount_percent'] ?>%
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- INFORMAÇÕES DO PRODUTO -->
                    <div class="p-5 flex flex-col flex-grow justify-between gap-4">
                        
                        <div>
                            <!-- CATEGORIA -->
                            <span class="text-xs font-bold text-slate-500 dark:text-slate-400 block mb-1">
                                <?= esc($p['category']) ?>
                            </span>

                            <!-- TÍTULO -->
                            <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white leading-snug line-clamp-2" title="<?= esc($p['title']) ?>">
                                <?= esc($p['title']) ?>
                            </h2>

                            <!-- EXPLICAÇÃO SIMPLES -->
                            <?php if (!empty($p['description'])): ?>
                                <p class="text-sm text-slate-600 dark:text-slate-300 mt-2 line-clamp-2 leading-relaxed">
                                    <?= esc($p['description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- PREÇO E BOTÃO DE COMPRA -->
                        <div class="pt-3 border-t border-slate-100 dark:border-slate-800">
                            
                            <div class="mb-3">
                                <?php if (!empty($p['price_original']) && $p['price_original'] > $p['price_promo']): ?>
                                    <span class="text-xs sm:text-sm text-slate-500 line-through block">
                                        De R$ <?= number_format($p['price_original'], 2, ',', '.') ?>
                                    </span>
                                <?php endif; ?>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Por</span>
                                    <span class="text-2xl font-black text-primary">
                                        R$ <?= number_format($p['price_promo'], 2, ',', '.') ?>
                                    </span>
                                </div>
                            </div>

                            <!-- BOTÃO DE AÇÃO GRANDE E ACESSÍVEL -->
                            <a href="<?= site_url('achadinhos/go/' . $p['id']) ?>" 
                               target="_blank" rel="nofollow noopener"
                               class="w-full min-h-[52px] flex items-center justify-center gap-2 bg-primary hover:bg-primary-hover text-white font-bold text-sm sm:text-base rounded-xl px-4 shadow-sm transition-all hover:scale-101 active:scale-98">
                                <span>Ver Preço na Shopee</span>
                                <span class="material-symbols-outlined text-lg">open_in_new</span>
                            </a>

                            <!-- SELO DE TRANQUILIDADE -->
                            <div class="flex items-center justify-center gap-1.5 mt-2.5 text-[11px] font-semibold text-slate-500 dark:text-slate-400">
                                <span class="material-symbols-outlined text-xs text-emerald-600">verified</span>
                                <span>Loja Oficial • Pix ou Boleto</span>
                            </div>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <!-- QUANDO NÃO ENCONTRAR NADA -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-12 text-center max-w-lg mx-auto my-12">
            <div class="size-16 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 mx-auto flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">search_off</span>
            </div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">
                Nenhum produto encontrado
            </h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-6">
                Não localizamos nenhum produto com esse nome. Deseja ver todos os produtos disponíveis para sua casa?
            </p>
            <a href="<?= site_url('achadinhos') ?>" 
               class="inline-flex items-center gap-2 bg-primary text-white font-bold px-6 py-3 rounded-xl text-sm">
                <span>Ver Todos os Produtos</span>
            </a>
        </div>
    <?php endif; ?>

</div>
<?= $this->endSection() ?>
