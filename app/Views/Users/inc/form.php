<div class="form-group">
    <label class="form-control-label">Nome completo</label>
    <input type="text" name="name" placeholder="Nome do usuário" class="form-control" value="<?php echo esc($user->name); ?>">
</div>
<div class="form-group">
    <label class="form-control-label">E-mail</label>
    <input type="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo esc($user->email); ?>">
</div>
<div class="form-group">
    <label class="form-control-label">Senha</label>
    <input type="password" name="password" placeholder="Senha de acesso" class="form-control" value="">
</div>
<div class="form-group">
    <label class="form-control-label">Confirmar senha</label>
    <input type="password" name="password_confirmation" placeholder="Confirme a senha de acesso" class="form-control" value="">
</div>

<div class="form-group">
    <div class="custom-control custom-checkbox">
        <input type="hidden" name="active" value="0">
        <input class="custom-control-input" id="checkActive" value="1" type="checkbox" name="active" id="active" <?php if ($user->active == true) : ?> checked <?php endif; ?>>
        <label class="custom-control-label" for="checkActive">Usuário ativo</label>
    </div>
</div>