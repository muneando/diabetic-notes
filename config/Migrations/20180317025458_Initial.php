<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('done_notes', ['id' => false, 'primary_key' => ['']])
            ->addColumn('notes_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'notes_id',
                ]
            )
            ->create();

        $this->table('my_categories')
            ->addColumn('category_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('categories_type', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('unit', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('notes')
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('my_categories_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'my_categories_id',
                ]
            )
            ->addIndex(
                [
                    'users_id',
                ]
            )
            ->create();

        $this->table('numeric_value_notes', ['id' => false, 'primary_key' => ['']])
            ->addColumn('notes_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('value', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'notes_id',
                ]
            )
            ->create();

        $this->table('select_notes', ['id' => false, 'primary_key' => ['']])
            ->addColumn('notes_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('value', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'notes_id',
                ]
            )
            ->create();

        $this->table('string_value_notes', ['id' => false, 'primary_key' => ['']])
            ->addColumn('notes_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'notes_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('done_notes')
            ->addForeignKey(
                'notes_id',
                'notes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('notes')
            ->addForeignKey(
                'my_categories_id',
                'my_categories',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('numeric_value_notes')
            ->addForeignKey(
                'notes_id',
                'notes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('select_notes')
            ->addForeignKey(
                'notes_id',
                'notes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('string_value_notes')
            ->addForeignKey(
                'notes_id',
                'notes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('done_notes')
            ->dropForeignKey(
                'notes_id'
            );

        $this->table('notes')
            ->dropForeignKey(
                'my_categories_id'
            )
            ->dropForeignKey(
                'users_id'
            );

        $this->table('numeric_value_notes')
            ->dropForeignKey(
                'notes_id'
            );

        $this->table('select_notes')
            ->dropForeignKey(
                'notes_id'
            );

        $this->table('string_value_notes')
            ->dropForeignKey(
                'notes_id'
            );

        $this->dropTable('done_notes');
        $this->dropTable('my_categories');
        $this->dropTable('notes');
        $this->dropTable('numeric_value_notes');
        $this->dropTable('select_notes');
        $this->dropTable('string_value_notes');
        $this->dropTable('users');
    }
}
