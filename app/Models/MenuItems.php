<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_menu_items';

    /**
     * Retorna último id cadastrado
     *
     * @param $menu
     * @return int
     */
    public static function getNextSortRoot($menu){
        return self::where('menu', $menu)->max('sort') + 1;
    }

    /**
     * Cria link do menu
     *
     * @param $data
     */
    public function createLinkMenuPage($data)
    {
        $this->label = $data['txt_titulo'];
        $this->link = $data['url_pagina'];
        $this->class_active = $data['txt_classe'];
        $this->menu = 1;
        $this->sort = $this->getNextSortRoot(1);
        $this->menu_custom = $data['menu_custom'];
        $this->fl_status = $data['fl_status'];
        $this->save();
    }

    /**
     * Edita link do menu
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function editLinkMenuPage($data, $id)
    {
        $link_id = MenuItems::where('menu_custom', '=', $id)->first()->id;
        $menuitem = $this->findOrFail($link_id);
        $menuitem->label = $data['txt_titulo'];
        $menuitem->link = $data['url_pagina'];
        $menuitem->class_active = $data['txt_classe'];
        $menuitem->fl_status = $data['fl_status'];
        return $menuitem->save();
    }

    /**
     * Deleta link do menu
     *
     * @param $id
     */
    public function deleteLinkPage($id)
    {
        $link_id = MenuItems::where('menu_custom', '=', $id)->first()->id;
        $this->destroy($link_id);
    }

    /**
     * Retorna menuItems
     *
     * @param $id
     * @return mixed
     */
    public function getall($id) {
        return $this->where("menu", $id)->where('fl_status', '1')->orderBy("sort", "asc")->get();
    }

    /**
     * Mutators formata status da página no menu
     *
     * @return string
     */
    public function getFlStatusFormattedAttribute()
    {
        return $this->fl_status ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }
}
