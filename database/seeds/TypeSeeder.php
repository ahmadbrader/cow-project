<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Product;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'PO'
        ]);
        
        Type::create([
            'name' => 'Bali'
        ]);

        Type::create([
            'name' => 'Limosin'
        ]);

        Type::create([
            'name' => 'Simental'
        ]);

        Type::create([
            'name' => 'Brahman'
        ]);

        Type::create([
            'name' => 'Brangus'
        ]);

        Product::create([
            'name' => 'Yoyoy',
            'weight' => 240,
            'type_id' => 1,
            'description' => 'Sapi dari amerika'

        ]);

        Product::create([
            'name' => 'Yoyoy 2',
            'weight' => 260,
            'type_id' => 1,
            'description' => 'Sapi dari amerika'

        ]);

        Product::create([
            'name' => 'A',
            'weight' => 210,
            'type_id' => 2,
            'description' => 'Sapi dari amerika'

        ]);

        Product::create([
            'name' => 'A 2',
            'weight' => 340,
            'type_id' => 2,
            'description' => 'Sapi dari amerika'

        ]);
    }
}
