
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Listado de Policias</h3>
            </div>
            <div class="panel-body">
            <?= $this->Html->link(__('Agregar Policias'), ['action' => 'add'], ["class"=>"btn btn-primary", 'escape' => false]) ?>
            <br/><br/>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('dni', 'DNI') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('station_id', 'Comisaria') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Creado') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified', 'Actualizado') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cops as $cop): ?>
                        <tr>
                            <td><?= h($cop->dni) ?></td>
                            <td><?= $cop->has('station') ? $cop->station->name : '' ?></td>
                            <td><?= h($cop->created) ?></td>
                            <td><?= h($cop->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $cop->id], ["class"=>"btn btn-success", 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i>'), ['action' => 'delete', $cop->id], ['confirm' => __('Esta seguro que desea eliminar el registro # {0}?', $cop->id), "class"=>"btn btn-danger", 'escape' => false]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('Primero')) ?>
                        <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                        <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





