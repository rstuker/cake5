<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Oldlog Entity
 *
 * @property int $id
 * @property string $controller
 * @property string $action
 * @property string $user_id
 * @property \Cake\I18n\DateTime $createdat
 *
 * @property \App\Model\Entity\User $user
 */
class Oldlog extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'controller' => true,
        'action' => true,
        'user_id' => true,
        'createdat' => true,
        'user' => true,
    ];
}
