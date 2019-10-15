<?php


use Phinx\Seed\AbstractSeed;

class ShopSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $sql = 'TRUNCATE basket';
        $result = $this->adapter->query($sql);
        $sql = 'TRUNCATE products';
        $result = $this->adapter->query($sql);
        $products = [
            [
                'name' => 'Пельмени',
                'description' => 'Куриные',
                'price' => '22'
            ],
            [
                'name' => 'Пицца',
                'description' => 'С сыром',
                'price' => '12'
            ],
            [
                'name' => 'Пончики',
                'description' => 'Свежие',
                'price' => '34'
            ]
        ];
        $this->table('products')->insert($products)->save();


        $sql = 'TRUNCATE users';
        $this->adapter->query($sql);
        $users = [
            [
                'login' => 'admin',
                'pass' => 123
            ],
            [
                'login' => 'user',
                'pass' => 123
             ],

        ];
        $this->table('users')->insert($users)->save();
    }

}
