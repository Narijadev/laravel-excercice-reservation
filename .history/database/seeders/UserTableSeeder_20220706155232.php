<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon as Carbon;

class UserTableSeeder extends Seeder
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
            'name'        => 'test1',
            'lastname'             => 'test1',
            'firstname'             =>  'test1',    
            'birthdate'             => 'test1',
            'phone'             =>  'test1',
            'reservation_id'             =>  'test1',
            'email'             =>  'test1',
        ],
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
            'name'        => 'test1',
            'lastname'             => 'test1',
            'firstname'             =>  'test1',    
            'birthdate'             => 'test1',
            'phone'             =>  'test1',
            'reservation_id'             =>  'test1',
            'email'             =>  'test1',
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
