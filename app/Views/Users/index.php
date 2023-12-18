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
<script>
    const DATA_TABLES_PT_BR = {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registro",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ Resultado por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisa",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último",
        },
        "oAria": {
            "sSortAscending": "Ordenar colunas de forma ascendente",
            "sSortDescending": "Ordenar colunas de forma descendente",
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha",
            }
        },
    };
    new DataTable('#ajaxTable', {
        oLanguage: DATA_TABLES_PT_BR,
        ajax: '<?php echo base_url('users/getUsers'); ?>',
        columns: [{
                data: 'imagem'
            },
            {
                data: 'nome'
            },
            {
                data: 'email'
            },
            {
                data: 'ativo'
            },
        ]
    });
</script>
<?php echo $this->endSection('scripts'); ?>