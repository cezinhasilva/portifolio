<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-8">
        <h3>Meus Projetos</h3>
    </div>
    <div class="col-4 text-right">
        <a href="<?= site_url('dashboard/create') ?>" class="paper-btn btn-primary">Novo Projeto</a>
    </div>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="row">
    <?php if (empty($projects)): ?>
        <div class="col-12">
            <div class="alert alert-warning">Nenhum projeto encontrado.</div>
        </div>
    <?php else: ?>
        <?php foreach ($projects as $project): ?>
            <div class="col-4 col">
                <div class="card">
                    <img src="<?= base_url($project['image_path']) ?>" alt="Imagem do Projeto"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?= esc($project['title']) ?>
                        </h4>
                        <p class="card-text">
                            <?= esc(substr($project['description'], 0, 100)) ?>...
                        </p>
                        <button class="btn-small">Editar</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>