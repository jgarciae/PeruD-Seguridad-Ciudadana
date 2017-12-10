
<div class="row">
    <div class="col-md-6">
        <div class="panel">
        <?= $this->Form->create($cop) ?>
            <div class="panel-heading">
                <h3 class="panel-title">Agregar Policia</h3>
            </div>
            <div class="panel-body">
                <h5 class="panel-title">DNI</h5>
                <?php echo $this->Form->input('dni', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <h2 class="panel-title">Contraseña</h2>
                <?php echo $this->Form->input('password', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <h2 class="panel-title">Comisaria</h2>
                <?php echo $this->Form->input('station_id', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <?= $this->Form->button(__('Guardar'), ['class'=>'btn btn-primary btn-block']) ?>
                <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ["class"=>"btn btn-danger btn-block"]) ?>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>
