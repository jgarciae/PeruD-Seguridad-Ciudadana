<!-- File: src/Template/Users/login.ctp -->



<div class="left">
    <div class="content">
        <?= $this->Flash->render('auth') ?>
        <div class="header">
          <?= $this->Html->image("new_logo.png", ["alt" => "Logo"])?>
            <p class="lead">Inicio de Sesión</p>
        </div>
        <?= $this->Form->create() ?>
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">DNI</label>
                <?= $this->Form->input('dni', ['label'=>false, 'class'=>'form-control underlined', 'placeholder'=>'Usuario', 'required']) ?>
            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Contraseña</label>
                <?= $this->Form->input('password', ['label'=>false, 'class'=>'form-control underlined', 'placeholder'=>'Contraseña', 'required']) ?>
            </div>
            <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                    <input type="checkbox">
                    <span>recordarme</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
            <br/>
            <div class="bottom">
                <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Olvido su contrseña?</a></span>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="right">
    <div class="overlay"></div>
    <div class="content text">
        <div class="logo text-center"></div>
        <h1 class="heading">Dashboard de Administración</h1>
        <p>by Apselom</p>
    </div>
</div>
<div class="clearfix"></div>
<?php
    phpinfo();
?>
