<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Oldlogs Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Oldlog newEmptyEntity()
 * @method \App\Model\Entity\Oldlog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Oldlog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Oldlog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Oldlog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Oldlog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Oldlog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Oldlog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Oldlog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Oldlog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Oldlog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Oldlog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Oldlog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Oldlog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Oldlog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Oldlog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Oldlog> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OldlogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('oldlogs');
        $this->setDisplayField('controller');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('controller')
            ->maxLength('controller', 30)
            ->requirePresence('controller', 'create')
            ->notEmptyString('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 30)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 36)
            ->notEmptyString('user_id');

        $validator
            ->dateTime('createdat')
            ->notEmptyDateTime('createdat');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
