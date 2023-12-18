<?php echo $this->extend('Layout/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo ' | ' . $title; ?>
<?php echo $this->endSection('title'); ?>

<?php echo $this->section('styles'); ?>
<?php echo $this->endSection('styles'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="block">
            <div class="table-responsive">
                <table id="ajaxTable" class="table table-striped table-sm" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>