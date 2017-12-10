
<div class="row">
    <div class="col-md-6">
        <div class="panel">
        <?= $this->Form->create($station) ?>
            <div class="panel-heading">
                <h3 class="panel-title">Agregar Comisaria</h3>
            </div>
            <div class="panel-body">
                <h5 class="panel-title">Nombre</h5>
                <?php echo $this->Form->input('name', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <h2 class="panel-title">Ciudad</h2>
                <?php echo $this->Form->input('city', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <h2 class="panel-title">Provincia</h2>
                <?php echo $this->Form->input('province', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <h2 class="panel-title">Region</h2>
                <?php echo $this->Form->input('state', ['label'=>false, 'class'=>'form-control']); ?>
                <br>
                <?= $this->Form->button(__('Guardar'), ['class'=>'btn btn-primary btn-block']) ?>
                <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ["class"=>"btn btn-danger btn-block"]) ?>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>
