<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- SweetAlert2 para confirmações e notificações modernas -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ activeTab: 'achadinhos' }">

    <!-- CABEÇALHO DO PAINEL -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-white/10">
        <div>
            <div class="flex items-center gap-3">
                <span class="p-2.5 rounded-xl bg-neon/10 text-neon border border-neon/20">
                    <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                </span>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-display font-bold text-white tracking-tight">
                        Gestão da Vitrine & Acessos
                    </h1>
                    <p class="text-sm text-slate-400 mt-0.5">
                        Administração dos produtos da Shopee, links de afiliado e controle de usuários.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <a href="<?= site_url('achadinhos') ?>" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-200 border border-white/10 text-sm font-semibold transition-all hover:scale-102">
                <i data-lucide="eye" class="w-4 h-4 text-neon"></i>
                <span>Ver Vitrine Pública</span>
                <i data-lucide="external-link" class="w-3.5 h-3.5 opacity-60"></i>
            </a>
        </div>
    </div>

    <!-- MENSAGENS FLASH (FEEDBACK VISUAL) -->
    <?php if (session()->getFlashdata('message')): ?>
        <div class="mb-6 p-4 rounded-xl bg-neon/10 border border-neon/30 text-neon text-sm flex items-center justify-between animate-fade-in">
            <div class="flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                <span class="font-medium"><?= esc(session()->getFlashdata('message')) ?></span>
            </div>
            <button type="button" @click="$el.parentElement.remove()" class="text-neon/70 hover:text-neon">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- CARDS DE MÉTRICAS RÁPIDAS -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="p-5 rounded-2xl bg-carbine border border-white/10 flex items-center justify-between">
            <div>
                <span class="text-xs font-mono text-slate-400 uppercase tracking-wider block">Produtos na Vitrine</span>
                <span class="text-2xl font-bold font-display text-white mt-1 block"><?= count($achadinhos) ?></span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-cyan/10 border border-cyan/20 flex items-center justify-center text-cyan">
                <i data-lucide="package" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-carbine border border-white/10 flex items-center justify-between">
            <div>
                <span class="text-xs font-mono text-slate-400 uppercase tracking-wider block">Usuários no Sistema</span>
                <span class="text-2xl font-bold font-display text-white mt-1 block"><?= count($users) ?></span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-neon/10 border border-neon/20 flex items-center justify-center text-neon">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-carbine border border-white/10 flex items-center justify-between">
            <div>
                <span class="text-xs font-mono text-slate-400 uppercase tracking-wider block">Segurança de Acesso</span>
                <div class="flex items-center gap-1.5 mt-1">
                    <span class="w-2 h-2 rounded-full bg-neon animate-pulse"></span>
                    <span class="text-sm font-semibold text-emerald-400">Registro Fechado 🔒</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- NAVEGAÇÃO POR ABAS -->
    <div class="flex items-center gap-2 mb-6 border-b border-white/10 pb-2">
        <button type="button"
                @click="activeTab = 'achadinhos'"
                :class="activeTab === 'achadinhos' ? 'bg-neon/15 text-neon border-neon/30' : 'bg-transparent text-slate-400 hover:text-white border-transparent'"
                class="px-4 py-2.5 rounded-xl text-sm font-semibold border flex items-center gap-2 transition-all">
            <i data-lucide="layout-grid" class="w-4 h-4"></i>
            <span>Produtos da Vitrine</span>
            <span class="text-xs px-2 py-0.5 rounded-full bg-white/10 text-white font-mono"><?= count($achadinhos) ?></span>
        </button>

        <button type="button"
                @click="activeTab = 'usuarios'"
                :class="activeTab === 'usuarios' ? 'bg-neon/15 text-neon border-neon/30' : 'bg-transparent text-slate-400 hover:text-white border-transparent'"
                class="px-4 py-2.5 rounded-xl text-sm font-semibold border flex items-center gap-2 transition-all">
            <i data-lucide="user-check" class="w-4 h-4"></i>
            <span>Usuários do Sistema</span>
            <span class="text-xs px-2 py-0.5 rounded-full bg-white/10 text-white font-mono"><?= count($users) ?></span>
        </button>
    </div>

    <!-- ABA 1: PRODUTOS DA VITRINE -->
    <div x-show="activeTab === 'achadinhos'" class="transition-opacity duration-200">
        <div class="bg-carbine border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/10 bg-elevated/50 text-xs font-mono uppercase text-slate-400 tracking-wider">
                            <th class="py-4 px-4 w-14">ID</th>
                            <th class="py-4 px-4 w-20">Preview</th>
                            <th class="py-4 px-6 min-w-[280px]">Produto / Categoria</th>
                            <th class="py-4 px-4 w-32">Preço Promo</th>
                            <th class="py-4 px-4 w-44">Cadastrado em</th>
                            <th class="py-4 px-4 w-32 text-center">Link Shopee</th>
                            <th class="py-4 px-4 w-24 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm">
                        <?php if (empty($achadinhos)): ?>
                            <tr>
                                <td colspan="7" class="py-16 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i data-lucide="package-open" class="w-12 h-12 stroke-[1.2] opacity-40 mb-3 text-slate-400"></i>
                                        <p class="text-base font-semibold text-slate-300">Nenhum produto cadastrado na vitrine.</p>
                                        <p class="text-xs text-slate-500 mt-1">Dispare a automação do n8n para importar ofertas automaticamente.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($achadinhos as $item): ?>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    
                                    <!-- ID -->
                                    <td class="py-4 px-4 font-mono text-xs text-slate-500">
                                        #<?= esc($item['id']) ?>
                                    </td>

                                    <!-- PREVIEW DA IMAGEM -->
                                    <td class="py-4 px-4">
                                        <div class="w-14 h-14 rounded-xl bg-elevated border border-white/10 overflow-hidden relative flex items-center justify-center shrink-0">
                                            <?php if (!empty($item['image_url'])): ?>
                                                <img src="<?= esc($item['image_url']) ?>"
                                                     alt="<?= esc($item['title']) ?>"
                                                     loading="lazy"
                                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                                     onerror="this.onerror=null; this.src='https://placehold.co/100x100/15181D/00E599?text=Sem+Foto';" />
                                            <?php else: ?>
                                                <div class="flex flex-col items-center justify-center text-slate-500">
                                                    <i data-lucide="image-off" class="w-5 h-5"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <!-- TÍTULO & CATEGORIA -->
                                    <td class="py-4 px-6">
                                        <div class="flex flex-col gap-1">
                                            <span class="font-medium text-white line-clamp-2 leading-snug group-hover:text-neon transition-colors" title="<?= esc($item['title']) ?>">
                                                <?= esc($item['title']) ?>
                                            </span>
                                            <div class="flex items-center gap-2 mt-0.5">
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-white/5 text-slate-400 border border-white/5">
                                                    <?= esc($item['category'] ?? 'Casa & Cozinha') ?>
                                                </span>
                                                <?php if (!empty($item['discount_percent']) && (int)$item['discount_percent'] > 0): ?>
                                                    <span class="text-[11px] font-bold text-emerald-400">
                                                        -<?= (int)$item['discount_percent'] ?>% OFF
                                                    </span>
                                                <?php endif; ?>
                                                <?php if (!empty($item['clicks_count']) && (int)$item['clicks_count'] > 0): ?>
                                                    <span class="text-[11px] font-mono text-cyan flex items-center gap-0.5">
                                                        <i data-lucide="mouse-pointer-click" class="w-3 h-3"></i>
                                                        <?= (int)$item['clicks_count'] ?> cliques
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- PREÇO -->
                                    <td class="py-4 px-4 whitespace-nowrap">
                                        <span class="font-mono font-bold text-base text-neon">
                                            R$ <?= number_format((float)$item['price_promo'], 2, ',', '.') ?>
                                        </span>
                                        <?php if (!empty($item['price_original']) && (float)$item['price_original'] > (float)$item['price_promo']): ?>
                                            <span class="block text-xs font-mono text-slate-500 line-through">
                                                R$ <?= number_format((float)$item['price_original'], 2, ',', '.') ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- DATA DE CADASTRO -->
                                    <td class="py-4 px-4 whitespace-nowrap text-xs font-mono text-slate-400">
                                        <div class="flex items-center gap-1.5">
                                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-500"></i>
                                            <span>
                                                <?= !empty($item['created_at']) ? date('d/m/Y H:i', strtotime($item['created_at'])) : '—' ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- BOTÃO COM LINK DO PRODUTO -->
                                    <td class="py-4 px-4 text-center whitespace-nowrap">
                                        <?php if (!empty($item['affiliate_url'])): ?>
                                            <a href="<?= esc($item['affiliate_url']) ?>"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-orange-500/10 hover:bg-orange-500/20 text-orange-400 border border-orange-500/20 text-xs font-semibold transition-all hover:scale-105"
                                               title="Abrir página oficial do produto na Shopee">
                                                <i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>
                                                <span>Shopee</span>
                                                <i data-lucide="arrow-up-right" class="w-3 h-3 opacity-60"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-xs text-slate-600">—</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- REMOVER ITEM (COM MODAL MODERNO) -->
                                    <td class="py-4 px-4 text-right whitespace-nowrap">
                                        <button type="button"
                                                onclick="confirmarRemocao(<?= (int)$item['id'] ?>, '<?= esc(addslashes($item['title'])) ?>')"
                                                class="inline-flex items-center justify-center p-2 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 transition-all hover:scale-110"
                                                title="Excluir produto da vitrine">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ABA 2: USUÁRIOS CADASTRADOS (GESTÃO DE ACESSO) -->
    <div x-show="activeTab === 'usuarios'" class="transition-opacity duration-200" style="display: none;">
        <div class="bg-carbine border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
            <div class="p-5 border-b border-white/10 bg-elevated/40 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i data-lucide="shield" class="w-4 h-4 text-neon"></i>
                        Usuários com Acesso ao Painel
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Lista completa de administradores e usuários cadastrados na base de segurança.
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs font-mono text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1.5 rounded-lg">
                    <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                    <span>Novos Registros Públicos Bloqueados</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/10 bg-elevated/50 text-xs font-mono uppercase text-slate-400 tracking-wider">
                            <th class="py-4 px-4 w-16">ID</th>
                            <th class="py-4 px-6">Usuário</th>
                            <th class="py-4 px-6">E-mail</th>
                            <th class="py-4 px-4">Grupo / Papel</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-4">Cadastrado em</th>
                            <th class="py-4 px-4">Último Acesso</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm">
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="7" class="py-12 text-center text-slate-500">
                                    Nenhum usuário localizado na base de autenticação.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $u): ?>
                                <tr class="hover:bg-white/[0.02] transition-colors">
                                    <td class="py-4 px-4 font-mono text-xs text-slate-500">
                                        #<?= esc($u['id']) ?>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-white flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-lg bg-neon/10 border border-neon/20 text-neon flex items-center justify-center font-mono text-xs font-bold">
                                            <?= strtoupper(substr($u['username'] ?? 'U', 0, 1)) ?>
                                        </div>
                                        <span><?= esc($u['username']) ?></span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-xs text-slate-300">
                                        <?= esc($u['email'] ?? 'Sem e-mail registrado') ?>
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap">
                                        <?php if (!empty($u['groups'])): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-neon/15 text-neon border border-neon/30">
                                                <?= esc($u['groups']) ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-white/5 text-slate-400 border border-white/10">
                                                user
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap">
                                        <?php if ((int)($u['active'] ?? 1) === 1): ?>
                                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-400">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                Ativo
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-rose-400">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                                Inativo
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-xs font-mono text-slate-400">
                                        <?= !empty($u['created_at']) ? date('d/m/Y H:i', strtotime($u['created_at'])) : '—' ?>
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-xs font-mono text-slate-400">
                                        <?= !empty($u['last_active']) ? date('d/m/Y H:i', strtotime($u['last_active'])) : 'Nunca' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- SCRIPT DE CONFIRMAÇÃO ELEGANTE COM SWEETALERT2 -->
<script>
    function confirmarRemocao(id, titulo) {
        Swal.fire({
            title: 'Remover da Vitrine?',
            html: `Deseja realmente remover o produto <br><b class="text-neon">"${titulo}"</b>?<br><span class="text-xs text-slate-400 mt-2 block">Essa ação não pode ser desfeita.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#2A303C',
            confirmButtonText: 'Sim, remover agora',
            cancelButtonText: 'Cancelar',
            background: '#15181D',
            color: '#F8FAFC',
            iconColor: '#F59E0B',
            customClass: {
                popup: 'border border-white/10 rounded-2xl shadow-2xl p-6',
                title: 'font-display font-bold text-xl text-white',
                confirmButton: 'px-5 py-2.5 rounded-xl font-bold text-sm shadow-md',
                cancelButton: 'px-5 py-2.5 rounded-xl font-medium text-sm text-slate-300 border border-white/10'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Redireciona com feedback suave
                window.location.href = '<?= site_url("dashboard/achadinhos/delete/") ?>' + id;
            }
        });
    }

    // Inicializa os ícones do Lucide após renderização
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
<?= $this->endSection() ?>