<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'reservation_id'             =>  '1',
            'email'             =>  'test1',
            'password'             =>  'test1',

            
           
        ],
        [
            'name'        => 'test2',
            'lastname'             => 'test2',
            'firstname'             =>  'test2',    
            'birthdate'             => 'test2',
            'phone'             =>  'test2',
            'reservation_id'             =>  '2',
            'email'             =>  'test2',
            'password'             =>  'test1',
        ],
        [
            'name'        => 'test3',
            'lastname'             => 'test3',
            'firstname'             =>  'test3',    
            'birthdate'             => 'test3',
            'phone'             =>  'test3',
            'reservation_id'             =>  '3',
            'email'             =>  'test3',
            'password'             =>  'test1',
        ],
        [
            'name'        => 'test4',
            'lastname'             => 'test4',
            'firstname'             =>  'test4',    
            'birthdate'             => 'test4',
            'phone'             =>  'test4',
            'reservation_id'             =>  '4',
            'email'             =>  'test4',
            'password'             =>  'test1',
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