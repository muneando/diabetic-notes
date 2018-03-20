<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoneNotes Model
 *
 * @method \App\Model\Entity\DoneNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoneNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoneNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoneNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoneNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoneNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoneNote findOrCreate($search, callable $callback = null, $options = [])
 */
class DoneNotesTable extends Table
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

        $this->setTable('done_notes');
        $this->setDisplayField('notes_id');
        $this->setPrimaryKey('notes_id');
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
            ->integer('notes_id')
            ->allowEmpty('notes_id', 'create');

        return $validator;
    }
}
