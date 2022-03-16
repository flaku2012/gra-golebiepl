<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // users
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.pl',
            'password' => Hash::make('admin123'),
            'reset_password_token' => 'ttt',
        ]); 
            

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.pl',
            'password' => Hash::make('test123'),
            'reset_password_token' => 'tkl',
        ]);

        //end users

        // pigeonhawks

        DB::table('pigeon_hawks')->insert([
            'user_id' => 1,
            'name' => 'Gołebnik podstawowy',
        ]);

        DB::table('pigeon_hawks')->insert([
            'user_id' => 1,
            'name' => 'Gołebnik rozpłodowy',
        ]);

        DB::table('pigeon_hawks')->insert([
            'user_id' => 2,
            'name' => 'Gołebnik podstawowy',
        ]);

        DB::table('pigeon_hawks')->insert([
            'user_id' => 2,
            'name' => 'Gołebnik rozpłodowy',
        ]);

        // end pigeonhawks

        // pigeons

        //user1
        //gołębnik 1
        // ID 1 - matka
        DB::table('pigeons')->insert([
            'user_id' => 1,
            'pigeon_hawk_id' => 1,
            'pigeon_mother_id' => 5,
            'pigeon_father_id' => 5,
            'pigeon_partner_id' => 2,
            'sex' => 'f',
            'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
            'level_experience' => rand(4, 100),
            'level_potential' => rand( 1, 100),
            'odometr' => rand(1, 1000),
            'age' => rand(1, 365)
        ]);
        // ID 2 - ojciec
        DB::table('pigeons')->insert([
            'user_id' => 1,
            'pigeon_hawk_id' => 1,
            'pigeon_mother_id' => 5,
            'pigeon_father_id' => 5,
            'pigeon_partner_id' => 1,
            'sex' => 'm',
            'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
            'level_experience' => rand(4, 100),
            'level_potential' => rand( 1, 100),
            'odometr' => rand(1, 1000),
            'age' => rand(1, 365)
        ]);
        //ID 3 - córka
        DB::table('pigeons')->insert([
            'user_id' => 1,
            'pigeon_hawk_id' => 1,
            'pigeon_mother_id' => 1,
            'pigeon_father_id' => 2,
            'pigeon_partner_id' => 4,
            'sex' => 'f',
            'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
            'level_experience' => rand(4, 100),
            'level_potential' => rand( 1, 100),
            'odometr' => rand(1, 1000),
            'age' => rand(1, 365)
        ]);
        //ID 4 - partner córki
        DB::table('pigeons')->insert([
            'user_id' => 1,
            'pigeon_hawk_id' => 1,
            'pigeon_mother_id' => 5,
            'pigeon_father_id' => 5,
            'pigeon_partner_id' => 3,
            'sex' => 'm',
            'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
            'level_experience' => rand(4, 100),
            'level_potential' => rand( 1, 100),
            'odometr' => rand(1, 1000),
            'age' => rand(1, 365)
        ]);
        // for ($p1=1; $p1 <= 4; $p1++) 
        // { 
        //     DB::table('pigeons')->insert([
        //         'user_id' => 1,
        //         'pigeon_hawk_id' => 1,
        //         'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
        //         'level_experience' => rand(4, 100),
        //         'level_potential' => rand( 1, 100),
        //         'odometr' => rand(1, 1000),
        //         'age' => rand(1, 365)
        //     ]);
        // }
        //koniec gołębnik1

        //gołębnik 2
        for ($p2=1; $p2 <= 4; $p2++) 
        { 
            DB::table('pigeons')->insert([
                'user_id' => 1,
                'pigeon_hawk_id' => 2,
                'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
                'level_experience' => rand(4, 100),
                'level_potential' => rand( 1, 100),
                'odometr' => rand(1, 1000),
                'age' => rand(1, 365)
            ]);
        }

        //user2
        for ($p3=1; $p3 <= 4; $p3++) 
        { 
            DB::table('pigeons')->insert([
                'user_id' => 2,
                'pigeon_hawk_id' => 3,
                'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
                'level_experience' => rand(4, 100),
                'level_potential' => rand( 1, 100),
                'odometr' => rand(1, 1000),
                'age' => rand(1, 365)
            ]);
        }
        for ($p4=1; $p4 <= 4; $p4++) 
        { 
            DB::table('pigeons')->insert([
                'user_id' => 2,
                'pigeon_hawk_id' => 4,
                'name' => 'PL-'.rand(1, 10).'-'.rand(20, 500),
                'level_experience' => rand(4, 100),
                'level_potential' => rand( 1, 100),
                'odometr' => rand(1, 1000),
                'age' => rand(1, 365)
            ]);
        }

        // end pigeons



        
        // products
        DB::table('products')->insert([
            'name' => 'Owies 25kg',
            'price' => 10,
            'value' => 25,
            'category' => 'food',
            'interact_with_comfort' => '10',
            'interact_with_health' => '20',
        ]);

        DB::table('products')->insert([
            'name' => 'Mieszanka 25kg',
            'price' => 50,
            'value' => 25,
            'category' => 'food',
            'interact_with_comfort' => '50',
            'interact_with_health' => '80',
        ]);

        DB::table('products')->insert([
            'name' => 'poidło 5 litrów',
            'price' => 15,
            'value' => 5,
            'category' => 'waterbucket',
        ]);

        DB::table('products')->insert([
            'name' => 'Witamina C (15 tabletek)',
            'price' => 75,
            'value' => 15,
            'category' => 'medicines',
        ]);

        DB::table('products')->insert([
            'name' => 'Gryt 2mm 15kg',
            'price' => 12.55,
            'value' => 15,
            'category' => 'grit',
        ]);

        DB::table('products')->insert([
            'name' => 'Obrączka plastikowa (zestaw 10 szt.)',
            'price' => 4.50,
            'value' => 10,
            'category' => 'ring',
        ]);

        DB::table('products')->insert([
            'name' => 'Obrączka elektroniczna 1 szt.',
            'price' => 145,
            'value' => 1,
            'category' => 'ring',
        ]);

        DB::table('products')->insert([
            'name' => 'Maszyna do automatycznego uzupełniania wody',
            'description' => 'Urządzenie pozwala na autmatyczne uzupełnianie wody wieczorami, tak aby rano było poidła były uzupełnione do pełna.',
            'price' => 7415,
            'value' => 1,
            'category' => 'tool',
        ]);

        DB::table('products')->insert([
            'name' => 'Dodatkowe półki (zestaw 5 szt.)',
            'price' => 120,
            'value' => 5,
            'category' => 'construction',
        ]);

        // end products

        //storehouse

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 25
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 2,
            'quantity' => 25
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 3,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 4,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 5,
            'quantity' => 15
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 6,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 7,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 8,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 1,
            'product_id' => 9,
            'quantity' => 1
        ]);

        DB::table('store_houses')->insert([
            'user_id' => 2,
            'product_id' => 1,
            'quantity' => 50
        ]);

        //end storehouse

    }
}
