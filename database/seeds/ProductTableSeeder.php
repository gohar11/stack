<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\Role;
use Illuminate\Support\Facades\DB;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role = $role->getUsersFromRole(['superadmin']);
        $user_id = $role['users'][0]['id'];


        $category1 = Category::where('id',1)->first();
        $category2 = Category::where('id',2)->first();
        $category3 = Category::where('id',3)->first();
        $category4 = Category::where('id',4)->first();
        $category5 = Category::where('id',5)->first();

        $product = new Product;
        $product->product_title = 'Product A';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';

        $product->save();
        $product->category()->attach($category1);
        $product->category()->attach($category5);
        $product->category()->attach($category4);

        $product = new Product;
        $product->product_title = 'Product B';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';
        $product->save();
        $product->category()->attach($category2);
        $product->category()->attach($category1);

        $product = new Product;
        $product->product_title = 'Product C';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';
        $product->save();
        $product->category()->attach($category3);
        $product->category()->attach($category1);

        $product = new Product;
        $product->product_title = 'Product D';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';
        $product->save();
        $product->category()->attach($category4);
        $product->category()->attach($category2);

        $product = new Product;
        $product->product_title = 'Product E';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';
        $product->save();
        $product->category()->attach($category5);
        $product->category()->attach($category1);

        $product = new Product;
        $product->product_title = 'Product F';
        $product->user_id = $user_id;
        $product->product_body = 'All sizes are available.';
        $product->save();
        $product->category()->attach($category1);
        $product->category()->attach($category4);
    }
}
