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

//    public function createnewmenu()
//    {
//        $menu = new Menus();
//        $menu->name = request()->input("menuname");
//        $menu->save();
//        return json_encode(array("resp" => $menu->id));
//    }

    public function deleteitemmenu()
    {
        $menuitem = MenuItems::find(request()->input("id"));

        $menuitem->delete();
    }

//    public function deletemenug()
//    {
//        $menus = new MenuItems();
//        $getall = $menus->getall(request()->input("id"));
//        if (count($getall) == 0) {
//            $menudelete = Menus::find(request()->input("id"));
//            $menudelete->delete();
//
//            return json_encode(array("resp" => "you delete this item"));
//        } else {
//            return json_encode(array("resp" => "You have to delete all items first", "error" => 1));
//
//        }
//    }

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
            //$menuitem->class_active = request()->input("class");
            $menuitem->save();
        }
    }

    public function addcustommenu()
    {
        $menuitem = new MenuItems;
        $menuitem->label = request()->input("labelmenu");
//        $menuitem->link = (request()->input("linkmenu")) ? request()->input('linkmenu') : '#';
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
//        $menu = Menu::find(request()->input("idmenu"));
//        $menu->name = request()->input("menuname");
//        $menu->save();
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
