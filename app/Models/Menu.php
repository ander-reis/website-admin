<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu.
 *
 * @package namespace App\Models;
 */
class Menu extends Model
{
    protected $table = 'tb_sinpro_menu';

    /**
     * Retona menu
     *
     * @param $menu_id
     * @return array
     */
    public static function get($menu_id)
    {
        $menuItem = new MenuItems;
        $menu_list = $menuItem->getall($menu_id);
        $roots = $menu_list->where('menu', (integer) $menu_id)->where('parent', 0);

        $items = self::tree($roots, $menu_list);
        return $items;
    }

    /**
     * Monta arvore do menu
     *
     * @param $items
     * @param $all_items
     * @return array
     */
    private static function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id);

            $data_arr[$i]['child'] = array();

            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }
}
