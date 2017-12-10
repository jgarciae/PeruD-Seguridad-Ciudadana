

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Listado de Comisarias</h3>
            </div>
            <div class="panel-body">
            <?= $this->Html->link(__('Agregar Comisarias'), ['action' => 'add'], ["class"=>"btn btn-primary", 'escape' => false]) ?>
            <br/><br/>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Ciudad') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Provincia') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Región') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Creado') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Actualizado') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stations as $station): ?>
                        <tr>
                            <td><?= h($station->name) ?></td>
                            <td><?= h($station->city) ?></td>
                            <td><?= h($station->province) ?></td>
                            <td><?= h($station->state) ?></td>
                            <td><?= h($station->created) ?></td>
                            <td><?= h($station->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $station->id], ["class"=>"btn btn-success", 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i>'), ['action' => 'delete', $station->id], ['confirm' => __('Esta seguro que desea eliminar el registro # {0}?', $station->id), "class"=>"btn btn-danger", 'escape' => false]) ?>
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




