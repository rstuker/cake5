<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OldlogsFixture
 */
class OldlogsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'controller' => 'Lorem ipsum dolor sit amet',
                'action' => 'Lorem ipsum dolor sit amet',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'createdat' => '2024-08-02 01:41:28',
            ],
        ];
        parent::init();
    }
}
