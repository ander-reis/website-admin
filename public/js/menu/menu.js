var arraydata = [];

function getmenus() {
    arraydata = [];
    $("#spinsavemenu").show()

    var cont = 0;
    $("#menu-to-edit li").each(function (index) {
        var dept = 0;
        for (var i = 0; i < $("#menu-to-edit li").length; i++) {

            var n = $(this).attr("class").indexOf("menu-item-depth-" + i);
            if (n != -1) {
                dept = i;
            }
        }
        ;
        var textoiner = $(this).find(".item-edit").text();
        var id = this.id.split("-");
        var textoexplotado = textoiner.split("|");
        var padre = 0;
        if (!!textoexplotado[textoexplotado.length - 2] && textoexplotado[textoexplotado.length - 2] != id[2]) {
            padre = textoexplotado[textoexplotado.length - 2]
        }
        arraydata.push({
            depth: dept,
            id: id[2],
            parent: padre,
            sort: cont
        })
        cont++;
    });
    updateitem();
    actualizarmenu();
}

function addcustommenu() {
    $("#spincustomu").show();
    $.ajax({
        type: 'POST',
        url: addcustommenur,
        data: {
            labelmenu: $("#custom-menu-item-name").val(),
            // linkmenu: $("#custom-menu-item-url").val(),
            categorymenu: $("#custom-menu-item-category").val(),
            // idmenu : $("#idmenu").val()
            idmenu: '1'
        },
        dataType: '',
        success: function (response) {
            window.location = "";
        },
        complete: function () {
            $("#spincustomu").hide();
        }
    });
}

function updateitem(id) {
    id = 0;
    if (id) {
        var label = $("#idlabelmenu_" + id).val()
        var clases = $("#clases_menu_" + id).val()
        var url = $("#url_menu_" + id).val()
        var data = {
            label: label,
            clases: clases,
            url: url,
            id: id
        }
    } else {
        var arr_data = [];
        $('.menu-item-settings').each(function (k, v) {
            var id = $(this).find(".edit-menu-item-id").val();
            var label = $(this).find(".edit-menu-item-title").val();
            var clases = $(this).find(".edit-menu-item-classes").val();
            var url = $(this).find(".edit-menu-item-url").val();
            arr_data.push({
                id: id,
                label: label,
                class: clases,
                link: url
            });
        });

        var data = {arraydata: arr_data};
    }
    $.ajax({
        data: data,
        url: updateitemr,
        type: 'POST',
        beforeSend: function (xhr) {
            if (id) {
                $("#spincustomu2").show();
            }
        },
        success: function (response) {
        },
        complete: function () {
            if (id) {
                $("#spincustomu2").hide();
            }
        }
    });
}

function actualizarmenu() {

    $.ajax({
        dataType: "json",
        data: {
            arraydata: arraydata,
            menuname: $("#menu-name").val(),
            idmenu: $("#idmenu").val()
        },

        url: generatemenucontrolr,
        type: 'POST',
        beforeSend: function (xhr) {
            $("#spincustomu2").show();
        },
        success: function (response) {
            console.log("salvo com sucesso");
        },
        complete: function () {
            $("#spincustomu2").hide();
        }
    });
}

function deleteitem(id) {
    $.ajax({
        dataType: "json",
        data: {
            id: id
        },
        url: deleteitemmenur,
        type: 'POST',
        success: function (response) {

        }
    });
}