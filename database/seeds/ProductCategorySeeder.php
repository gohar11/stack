<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
class ProductCategorySeeder extends Seeder
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


        $category = new Category;
        $category->category_title = 'Winter';
        $category->user_id = $user_id;
        $category->category_body = 'Best products found';
        $category->save();

        $category = new Category;
        $category->category_title = 'Summer';
        $category->user_id = $user_id;
        $category->category_body = 'Best products found';
        $category->save();

        $category = new Category;
        $category->category_title = 'Men';
        $category->user_id = $user_id;
        $category->category_body = 'Best products found';
        $category->save();

        $category = new Category;
        $category->category_title = 'Women';
        $category->user_id = $user_id;
        $category->category_body = 'Best products found';
        $category->save();

        $category = new Category;
        $category->category_title = 'Kids';
        $category->user_id = $user_id;
        $category->category_body = 'Best products found';
        $category->save();
    }
}
