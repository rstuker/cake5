<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provincia $provincia
 */

use chillerlan\QRCode\QRCode;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Provincia'), ['action' => 'edit', $provincia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Provincia'), ['action' => 'delete', $provincia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provincias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Provincia'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <img width="200" height="200" src="<?= $imgSrc ?>" alt="QR Code" />
    <?php

    //$options = new QRCode;
    // pr($options);
    // $text = $this->Qrcode->formatter()->formatText($provincia->Provincia);
    // echo $this->QrCode->image($text, array()); //$optionalOptions);

    ?>
    <div class="column column-80">
        <div class="provincias view content">
            <h3><?= h($provincia->Provincia) ?></h3>
            <table>
                <tr>
                    <th><?= __('Provincia') ?></th>
                    <td><?= h($provincia->Provincia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($provincia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fechalog') ?></th>
                    <td><?= h($provincia->fechalog) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Zonas') ?></h4>
                <?php if (!empty($provincia->zonas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Zona') ?></th>
                            <th><?= __('Nrodezona') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Provincia Id') ?></th>
                            <th><?= __('Fechalog') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($provincia->zonas as $zona) : ?>
                        <tr>
                            <td><?= h($zona->id) ?></td>
                            <td><?= h($zona->zona) ?></td>
                            <td><?= h($zona->nrodezona) ?></td>
                            <td><?= h($zona->descripcion) ?></td>
                            <td><?= h($zona->provincia_id) ?></td>
                            <td><?= h($zona->fechalog) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Zonas', 'action' => 'view', $zona->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Zonas', 'action' => 'edit', $zona->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Zonas', 'action' => 'delete', $zona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zona->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
