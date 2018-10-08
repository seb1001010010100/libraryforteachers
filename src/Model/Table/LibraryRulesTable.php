<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LibraryRules Model
 *
 * @method \App\Model\Entity\LibraryRule get($primaryKey, $options = [])
 * @method \App\Model\Entity\LibraryRule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LibraryRule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LibraryRule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LibraryRule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LibraryRule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LibraryRule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LibraryRule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LibraryRulesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('library_rules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('overdue_daily_fine')
            ->requirePresence('overdue_daily_fine', 'create')
            ->notEmpty('overdue_daily_fine');

        return $validator;
    }
}
