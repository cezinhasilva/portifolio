<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Gerenciar Vitrine de Achadinhos</h1>
        <a href="<?= site_url('achadinhos') ?>" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded shadow">Ver Vitrine</a>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Preço</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($achadinhos as $a): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $a['id'] ?></td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            <?= esc($a['title']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ <?= number_format($a['price_promo'], 2, ',', '.') ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="<?= site_url('dashboard/achadinhos/delete/' . $a['id']) ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja remover este produto da vitrine?');">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($achadinhos)): ?>
                    <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum achadinho cadastrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>