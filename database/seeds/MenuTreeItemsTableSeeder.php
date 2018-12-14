<?php

use Illuminate\Database\Seeder;

class MenuTreeItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuSort = new \App\Models\MenuItems();

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Convenções e Acordos',
            'link' => '#',
            'parent' => 0,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 0,
            'menu_custom' => 0
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Educação Básica',
            'link' => 'convencao-e-acordo/2',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1001
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Ensino Superior',
            'link' => 'convencao-e-acordo/1',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1002
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'PUC-SP',
            'link' => 'convencao-e-acordo/9',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1003
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Sesi',
            'link' => 'convencao-e-acordo/3',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1004
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Senai',
            'link' => 'convencao-e-acordo/4',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1004
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Senai Superior',
            'link' => 'convencao-e-acordo/5',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1005
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Senac',
            'link' => 'convencao-e-acordo/6',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1006
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Mackenzie',
            'link' => 'convencao-e-acordo/8',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1007
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Ensino Supletivo',
            'link' => 'convencao-e-acordo/7',
            'parent' => 1,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'convencao.*',
            'menu' => 1,
            'depth' => 1,
            'menu_custom' => 1008
        ]);

        factory(\App\Models\MenuItems::class)->create([
            'label' => 'Notícias',
            'link' => 'noticias',
            'parent' => 0,
            'sort' => $menuSort::getNextSortRoot(1),
            'class_active' => 'noticias.*',
            'menu' => 1,
            'depth' => 0,
            'menu_custom' => 0
        ]);
    }
}
