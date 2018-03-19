<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $datetime = date('Y-m-d H:i:s');
        $data = [
            [
                'id' => '1',
                'email' => 'admin@sample.com',
                'password' => $this->setPassword('testtest'),
                'created' => $datetime,
                'modified' => $datetime,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    /**
     * ハッシュ化されたパスワードを返却する
     * @param $value
     * @return bool|string
     */
    protected function setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
