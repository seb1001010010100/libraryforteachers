<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Media
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\LoansTable|\Cake\ORM\Association\HasMany $Loans
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsToMany $Authors
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('book_title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Mediums', [
            'foreignKey' => 'medium_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Loans', [
            'foreignKey' => 'book_id'
        ]);
        $this->belongsToMany('Authors', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'authors_books'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'books_categories'
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
            ->scalar('book_title')
            ->requirePresence('book_title', 'create')
            ->notEmpty('book_title');

        $validator
            ->date('date_of_publication')
            ->requirePresence('date_of_publication', 'create')
            ->notEmpty('date_of_publication');

        $validator
            ->scalar('image')
            ->allowEmpty('image');


        $validator
            ->scalar('Tag')
            ->requirePresence('Tag', 'create')
            ->notEmpty('Tag');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['medium_id'], 'Mediums'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
}
