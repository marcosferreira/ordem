<?php echo $this->extend('Layout/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo ' | ' . $title; ?>
<?php echo $this->endSection('title'); ?>

<?php echo $this->section('styles'); ?>
<?php echo $this->endSection('styles'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
    <div class="block">
        <div class="text-center">
            <?php if ($user->thumbnail == null) : ?>
                <img src="<?php echo base_url('assets') ?>/img/blank-profile.png" alt="" width="180">
            <?php else : ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>