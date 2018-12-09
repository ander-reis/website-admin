@extends('layouts.admin')

@section('content')
    <?php
    $currentUrl = url()->current();
    ?>
    <link href="{{ asset('css/style-menu.css') }}" rel="stylesheet">
    <div id="hwpwrap">
        <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
            <div id="wpwrap">
                <div id="wpcontent">
                    <div id="wpbody">
                        <div id="wpbody-content">
                            <div class="wrap">
                                <h1>{{ $indmenu->name }}</h1>
                                <div id="nav-menus-frame">
                                    @if(request()->has('menu')  && !empty(request()->input("menu")))
                                        <div id="menu-settings-column" class="metabox-holder">
                                            <div class="clear"></div>
                                            <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
                                                <div id="side-sortables" class="accordion-container">
                                                    <ul class="outer-border">
                                                        <li class="control-section accordion-section  open add-page" id="add-page">
                                                            <h3 class="accordion-section-title hndle" tabindex="0"> Menu Personalizado</h3>
                                                            <div class="accordion-section-content">
                                                                <div class="inside">
                                                                    @component('admin.form-components._form_group',['field' => 'custom-menu-item-category'])
                                                                        {{ Form::label('custom-menu-item-category', 'Categoria', ['class' => 'control-label']) }}
                                                                        {{ Form::select('custom-menu-item-category', \App\Models\MenuCategorias::pluck('label', 'class_active'), null, ['style' => 'box-sizing: border-box', 'class' => 'form-control']) }}
                                                                    @endcomponent
                                                                    <div class="customlinkdiv" id="customlinkdiv">
                                                                        @component('admin.form-components._form_group_inline',['field' => 'custom-menu-item-name', 'class' => ''])
                                                                            {{ Form::label('custom-menu-item-name', 'Nome', ['class' => 'howto control-label']) }}
                                                                            {{ Form::text('custom-menu-item-name', null, ['class' => 'form-control', 'id' => 'custom-menu-item-name', 'placeholder' => 'Entre com o Nome', 'maxlength' => 100]) }}
                                                                        @endcomponent
                                                                        <p class="button-controls">
                                                                            <button class="btn btn-dark col-md-9" id="custom-menu-btn-name" onclick="addcustommenu()" disabled>Incluir</button>
                                                                            <span class="spinner" id="spincustomu"></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <div id="menu-management-liquid">
                                        <div id="menu-management">
                                            <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                                                <div class="menu-edit ">
                                                    <div id="nav-menu-header">
                                                        <div class="major-publishing-actions">
                                                            <label class="menu-name-label howto open-label" for="menu-name">
                                                                <strong><span>{{$indmenu->name}}</span></strong>
                                                            </label>
                                                            <div class="publishing-action">
                                                                <button type="button" id="save_menu_header" class="btn btn-dark menu-save" name="save_menu" onclick="getmenus()">Salvar</button>
                                                                <span class="spinner" id="spincustomu2"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="post-body">
                                                        <div id="post-body-content">
                                                            <h3>Menu</h3>
                                                            <div class="drag-instructions post-body-plain">
                                                                <p>
                                                                    Coloque cada item na ordem que preferir. Clique na seta à direita do item para exibir mais opções de configuração.
                                                                </p>
                                                            </div>
                                                            <ul class="menu ui-sortable" id="menu-to-edit">
                                                                @if(isset($menus))
                                                                    @foreach($menus as $m)
                                                                        <li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
                                                                            <dl class="menu-item-bar">
                                                                                <dt class="menu-item-handle @if($m->link == '#') bg-secondary text-white @endif">
                                                                                    <span class="item-title">
                                                                                        <span class="menu-item-title">
                                                                                            <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span>
                                                                                            <span style="color: transparent;">|{{$m->id}}|</span>
                                                                                            <span>{!! $m->fl_status_formatted !!}</span>
                                                                                        </span>
                                                                                    </span>
                                                                                    <span class="item-controls">
                                                                                        <span class="item-type">Link</span>
                                                                                        <span class="item-order hide-if-js">
                                                                                            <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up">
                                                                                                <abbr title="para cima">↑</abbr>
                                                                                            </a>
                                                                                            |
                                                                                            <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down">
                                                                                                <abbr title="para baixo">↓</abbr>
                                                                                            </a>
                                                                                        </span>
                                                                                        <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"></a>
                                                                                    </span>
                                                                                </dt>
                                                                            </dl>
                                                                            <div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">
                                                                                <input type="hidden" class="edit-menu-item-id" name="menuid_{{$m->id}}" value="{{$m->id}}" />
                                                                                <p class="description description-thin">
                                                                                    <label for="edit-menu-item-title-{{$m->id}}"> Nome
                                                                                        <br>
                                                                                        <input type="text" id="idlabelmenu_{{$m->id}}" class="widefat edit-menu-item-title" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}">
                                                                                    </label>
                                                                                </p>
                                                                                <p class="field-css-url description description-wide">
                                                                                    <label for="edit-menu-item-url-{{$m->id}}"> Url
                                                                                        <br>
                                                                                        <input type="text" id="url_menu_{{$m->id}}" class="widefat code edit-menu-item-url" id="url_menu_{{$m->id}}" value="{{$m->link}}" readonly>
                                                                                    </label>
                                                                                </p>
                                                                                <p class="field-move hide-if-no-js description description-wide">
                                                                                    <label>
                                                                                        <span>Mover</span>
                                                                                        <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">para cima</a>
                                                                                        <a href="{{ $currentUrl }}" class="menus-move-down" style="display: inline;">para baixo</a>
                                                                                        <a href="{{ $currentUrl }}" class="menus-move-left" style="display: none;"></a>
                                                                                        <a href="{{ $currentUrl }}" class="menus-move-right" style="display: none;"></a>
                                                                                        <a href="{{ $currentUrl }}" class="menus-move-top" style="display: none;">topo</a>
                                                                                    </label>
                                                                                </p>
                                                                                <div class="menu-item-actions description-wide submitbox">
                                                                                    @if($m->link == '#')
                                                                                        <a class="item-delete submitdelete deletion" id="delete-{{$m->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Excluir</a>
                                                                                        <span class="meta-sep hide-if-no-js"> | </span>
                                                                                    @endif
                                                                                    <a class="item-cancel submitcancel hide-if-no-js button-secondary" id="cancel-{{$m->id}}" href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancelar</a>
                                                                                    <span class="meta-sep hide-if-no-js"> | </span>
                                                                                    <a onclick="updateitem({{$m->id}})" class="button button-primary updatemenu" id="update-{{$m->id}}" href="javascript:void(0)">Atualizar item</a>
                                                                                </div>
                                                                            </div>
                                                                            <ul class="menu-item-transport"></ul>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div id="nav-menu-footer">
                                                        <div class="major-publishing-actions">
                                                            <button type="button" id="save_menu_header" class="btn btn-dark menu-save float-right" name="save_menu" onclick="getmenus()">Salvar</button>
                                                            <span class="spinner" id="spincustomu2"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script>
            var menus = {
                "oneThemeLocationNoMenus" : "",
                "moveUp" : "Move para cima",
                "moveDown" : "Mover para baixo",
                "moveToTop" : "Mover para o topo",
                "moveUnder" : "Mover para baixo de %s",
                "moveOutFrom" : "Mover para fora de %s",
                "under" : "Abaixo %s",
                "outFrom" : "mover para fora de %s",
                "menuFocus" : "%1$s. Element menu %2$d of %3$d.",
                "subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
            };
            var arraydata = [];
            var addcustommenur= '{{ route("admin.haddcustommenu") }}';
            var updateitemr= '{{ route("admin.hupdateitem")}}';
            var generatemenucontrolr= '{{ route("admin.hgeneratemenucontrol") }}';
            var deleteitemmenur= '{{ route("admin.hdeleteitemmenu") }}';
            var deletemenugr= '{{ route("admin.hdeletemenug") }}';
            var createnewmenur= '{{ route("admin.hcreatenewmenu") }}';
            var csrftoken="{{ csrf_token() }}";
            var menuwr = "{{ url()->current() }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrftoken
                }
            });

            var inputs = $('#custom-menu-item-name');
            // Chama a função de verificação quando as entradas forem modificadas

            // Usei o 'change', mas 'keyup' ou 'keydown' são também eventos úteis aqui
            inputs.on('keyup', verificarInput);

            function verificarInput() {
                var preenchidos = true;  // assumir que estão preenchidos
                inputs.each(function () {
                    // verificar um a um e passar a false se algum falhar
                    // no lugar do if pode-se usar alguma função de validação, regex ou outros
                    if (!this.value) {
                        preenchidos = false;
                        // parar o loop, evitando que mais inputs sejam verificados sem necessidade
                        return false;
                    }
                });
                // Habilite, ou não, o <button>, dependendo da variável:
                $('#custom-menu-btn-name').prop('disabled', !preenchidos);
            }
        </script>
        <script type="text/javascript" src="{{asset('js/menu/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/menu/scripts2.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/menu/menu.js')}}"></script>
    @endpush

    {{--@component('admin.menu-tree._modal_delete')--}}
    {{--@endcomponent--}}

@endsection