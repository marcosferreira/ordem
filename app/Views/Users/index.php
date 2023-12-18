<?php echo $this->extend('Layout/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo ' | '.$title; ?>
<?php echo $this->endSection('title'); ?>

<?php echo $this->section('styles'); ?>
<?php echo $this->endSection('styles'); ?>

<?php echo $this->section('content'); ?>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection('scripts'); ?>