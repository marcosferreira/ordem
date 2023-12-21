<?php echo $this->extend('Layout/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo ' | ' . $title; ?>
<?php echo $this->endSection('title'); ?>

<?php echo $this->section('styles'); ?>
<?php echo $this->endSection('styles'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
    <div class="col-lg-4">
        <div class="block">
            <div class="text-center">
                <?php if ($user->thumbnail == null) : ?>
                    <img src="<?php echo base_url('assets/img/blank-profile.png'); ?>" alt="Usuário sem imagem" class="card-img-top" width="90%">
                <?php else : ?>
                    <img src="<?php echo base_url("users/img/$user->thumbnail"); ?>" alt="<?php echo esc('') ?>" class="card-img-top" width="90%">
                <?php endif; ?>

                <a href="<?php echo base_url("users/updateImage/$user->id"); ?>" class="btn btn-outline-primary btn-sm mt-3">Alterar imagem</a>
            </div>

            <hr class="border-secondary">

            <h5 class="card-title"><?php echo $user->name; ?></h5>
            <p class="card-text"><?php echo esc($user->email); ?></p>
            <p class="card-text">Criado <?php echo $user->created_at->humanize(); ?></p>
            <p class="card-text">Atualizado <?php echo $user->updated_at->humanize(); ?></p>
            <p class="card-text"><?php echo $user->active ? '<span class="text-success">Ativo</span>' : '<span class="text-danger">Inativo</span>'; ?></p>

            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url("users/edit/$user->id"); ?>">Editar usuário</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
            <a href="<?php echo base_url("users") ?>" class="btn btn-secondary">Voltar</a>
        </div> <!-- ./block -->

    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>