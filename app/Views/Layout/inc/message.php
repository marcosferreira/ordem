<?php if (session()->has('saved_successfully')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Tudo certo!</strong> <?php echo session('saved_successfully') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->has('info')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Informação!</strong> <?php echo session('info') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->has('warning')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Atenção!</strong> <?php echo session('warning') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Utilizado quando formulários forem interceptados por erros de backend, ou quando estamos houver debug do POST -->
<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo session('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Utilizado quando não for possível utilizar ajax request para gerar erros -->
<?php if (session()->has('errors_model')) : ?>
    <ul>
        <?php foreach ($errors_model as $error) : ?>
            <li class="text-danger">
                <?php echo $error; ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>