<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MyCategories Model
 *
 * @method \App\Model\Entity\MyCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\MyCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MyCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MyCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MyCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MyCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MyCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MyCategoriesTable extends Table
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

        $this->setTable('my_categories');
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
            ->scalar('category_name')
            ->maxLength('category_name', 45)
            ->requirePresence('category_name', 'create')
            ->notEmpty('category_name');

        $validator
            ->scalar('categories_type')
            ->maxLength('categories_type', 255)
            ->requirePresence('categories_type', 'create')
            ->notEmpty('categories_type');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->allowEmpty('value');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 45)
            ->allowEmpty('unit');

        return $validator;
    }
}
