<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mediums Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\HasMany $Books
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\HasMany $Types
 *
 * @method \App\Model\Entity\Medium get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medium|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medium|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medium findOrCreate($search, callable $callback = null, $options = [])
 */
class MediumsTable extends Table
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

        $this->setTable('mediums');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Books', [
            'foreignKey' => 'medium_id'
        ]);
        $this->hasMany('Types', [
            'foreignKey' => 'medium_id'
        ]);
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
