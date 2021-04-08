<?php
declare(strict_types=1);

namespace Gourmet\Aroma\Model\Table;

use Cake\Validation\Validator;

class ConfigurationsTable extends AbstractConfigurationsTable
{
    /**
     * {@inheritdoc}
     *
     * @param array $config List of options for this table
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->setTable('aroma_configurations');
        $this->setDisplayField('value');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('namespace', 'create')
            ->add('namespace', 'valid-namespace', ['rule' => ['custom', '@[a-z0-9\\\.]+@']])

            ->requirePresence('path')
            ->notEmptyString('path')

            ->requirePresence('value');

        return $validator;
    }
}
