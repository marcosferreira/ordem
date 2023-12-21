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

                <?php echo form_open('', ['id' => 'form'], ['id' => "$user->id"]); ?>
                <?php echo $this->include('Users/inc/form'); ?>
                <div class="form-group">
                    <input type="submit" value="Salvar" id="btn-save" class="btn btn-primary">
                    <a href="<?php echo base_url("users/show/$user->id") ?>" class="btn btn-secondary">Voltar</a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('users/update'); ?>',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#response').html('');
                    $('#btn-save').val('Por favor aguarde');
                },
                success: function(response) {
                    $('#btn-save').val('Salvar');
                    $('#btn-save').removeAttr('disabled');

                    $('[name=csrf_service_order]').val(response.csrf_token);

                    if (response.error) {
                        // Existem erros de validação
                        $('#response').html('<div class="alert alert-danger">' + response.error + '</div>');

                        if (response.errors_model) {
                            $.each(response.errors_model, function(key, value) {
                                $('#response').append(`
                                    <ul class="list-unstyled">
                                        <li class="text-danger">
                                            ${value}
                                        </li>
                                    </ul>
                                `);
                            });
                        }
                        return;
                    }

                    if (response.info) {
                        $('#response').html('<div class="alert alert-primary">' + response.info + '</div>');
                    } else {
                        // Tudo certo com a atualização do usuário
                        // Podemos agora redirecioná-lo tranquilamente
                        window.location.href = "<?php echo base_url("users/show/$user->id"); ?>";
                    }
                },
                error: function() {
                    alert("Não foi possível processar a solicitação, por favor entre em contato com o suporte técnico.");
                }
            });
        });

        $("#form").submit(function() {
            $(this).find(":submit").attr("disabled", "disabled");
        });
    });
</script>
<?php echo $this->endSection('scripts'); ?>