<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row flex-center">
    <div class="col-8 col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Novo Projeto</h4>
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li>
                                    <?= esc($error) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form action="<?= site_url('dashboard/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" class="input-block">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea id="description" name="description" class="input-block"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagem (JPG, PNG)</label>
                        <input type="file" id="image" name="image" class="input-block">
                    </div>
                    <button type="submit" class="paper-btn btn-primary">Salvar Projeto</button>
                    <a href="<?= site_url('dashboard') ?>" class="paper-btn">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>