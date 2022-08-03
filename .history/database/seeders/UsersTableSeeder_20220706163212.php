<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name'        => 'test1',
            'lastname'             => 'test1',
            'firstname'             =>  'test1',    
            'birthdate'             => 'test1',
            'phone'             =>  'test1',
            'reservation_id'             =>  'test1',
            'email'             =>  'test1',
           
        ],
        [
            'name'        => 'test2',
            'lastname'             => 'test2',
            'firstname'             =>  'test2',    
            'birthdate'             => 'test2',
            'phone'             =>  'test2',
            'reservation_id'             =>  'test2',
            'email'             =>  'test2',
        ],
        [
            'name'        => 'test3',
            'lastname'             => 'test3',
            'firstname'             =>  'test3',    
            'birthdate'             => 'test3',
            'phone'             =>  'test3',
            'reservation_id'             =>  'test3',
            'email'             =>  'test3',
        ],
        [
            'name'        => 'test4',
            'lastname'             => 'test4',
            'firstname'             =>  'test4',    
            'birthdate'             => 'test4',
            'phone'             =>  'test4',
            'reservation_id'             =>  'test4',
            'email'             =>  'test4',
        ],
            
        ];

      /* foreach ($articles as $article_data) {
            $article = Article::create($article_data);

            //event(new ArticleCreated($article));
        }

        Schema::enableForeignKeyConstraints();*/
        DB::table('users')->insert($users);
        
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}