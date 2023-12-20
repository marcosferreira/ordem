<?php echo $this->extend('Layout/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo ' | ' . $title; ?>
<?php echo $this->endSection('title'); ?>

<?php echo $this->section('styles'); ?>
<?php echo $this->endSection('styles'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
    <div class="col-lg-6">
        <div class="block">
            <div class="title"><strong class="d-block"></strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
            <div class="block-body">
                <form action="<?php echo base_url("users/edit/$user->id") ?>" method="post">
                    <div class="form-group">
                        <label class="form-control-label">Nome</label>
                        <input type="text" name="name" placeholder="Nome do usuário" class="form-control" value="<?php echo $user->name; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">E-mail</label>
                        <input type="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>