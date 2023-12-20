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
            <div class="title"><strong class="d-block"></strong><span class="d-block">Atualizar dados do usuário <b><?php echo $user->name; ?></b>.</span></div>
            <div class="block-body">
                <div id="response">

                </div>

                <?php echo form_open('/users', ['id' => 'form'], ['id' => "$user->id"]); ?>
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                        <a href="<?php echo base_url("users/edit/$user->id") ?>" class="btn btn-secondary">Voltar</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>