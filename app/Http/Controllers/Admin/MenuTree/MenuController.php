<?php

namespace App\Http\Controllers\Admin\MenuTree;


use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItems;

/**
 * Class MenusController.
 *
 * @package namespace App\Http\Controllers;
 */
class MenuController extends Controller
{
    public function index()
    {
        $indmenu = Menu::all()->first();
        $menus = MenuItems::orderBy('sort', 'asc')->get();

        return view('admin.menu-tree.index', compact('indmenu', 'menus'));
    }

    public function deleteitemmenu()
    {
        $menuitem = MenuItems::find(request()->input("id"));

        $menuitem->delete();
    }

    public function updateitem()
    {
        $arraydata = request()->input("arraydata");
        if (is_array($arraydata)) {
            foreach ($arraydata as $value) {
                $menuitem = MenuItems::find($value['id']);
                $menuitem->label = $value['label'];
                $menuitem->link = $value['link'];
                //$menuitem->class_active = $value['class'];
                $menuitem->save();
            }
        } else {
            $menuitem = MenuItems::find(request()->input("id"));
            $menuitem->label = request()->input("label");
            $menuitem->link = request()->input("url");
            $menuitem->save();
        }
    }

    public function addcustommenu()
    {
        $menuitem = new MenuItems;
        $menuitem->label = request()->input("labelmenu");
        $menuitem->link = '#';
        $menuitem->class_active = request()->input("categorymenu");
        $menuitem->menu = request()->input("idmenu");
        $menuitem->sort = MenuItems::getNextSortRoot(request()->input("idmenu"));
        $menuitem->menu_custom = (request()->input('custommenu') == 0) ? 0 : 1;
        $menuitem->save();
        return response()->json(['success'=>'Data is successfully added']);
    }

    public function generatemenucontrol()
    {
        if (is_array(request()->input("arraydata"))) {
            foreach (request()->input("arraydata") as $value) {
                $menuitem = MenuItems::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
                $menuitem->save();
            }
        }
        echo json_encode(array("resp" => 1));
    }
}
