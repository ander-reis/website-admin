/* enable strict mode */
"use strict";


var redips = {};
var startPositions,		// remember initial positions of DIV elements
	pos = {},			// initial positions of DIV elements
	rde = REDIPS.drag;	// reference to the REDIPS.drag lib

// configuration
redips.configuration = function () {
	redips.components = 'tblComponents';// left table id (table containing components)
	redips.tableEditor = 'tblEditor';	// right table id (table editor)
	redips.tableEditorDivs = document.getElementById(redips.tableEditor).getElementsByTagName('DIV');	// live collection of DIV elements inside table editor
	redips.ajaxSave = window.location.origin + "/admin/ordem-noticias";	// save page (via AJAX)
	redips.markedColor = '#A9C2EA';		// marked cells background color
	// layout (HTML code) for component placed to the table editor
	redips.component =	`<table class="redips-nolayout cHeader"><tr><td class="hTitle">|</td></tr></table>`;
};

// initialization
redips.init = function () {
	// define reference to the REDIPS.drag and REDIPS.table object
	var rt = REDIPS.table,
		rd = REDIPS.drag;

	// configuration
	redips.configuration();
	// attach onmousedown event handler to tblEditor
	rt.onmousedown(redips.tableEditor, true);
	// selected cell background color
	rt.color.cell = redips.markedColor;
	// disable marking not empty table cells
	rt.mark_nonempty = false;
	// initialize REDIPS.drag library
	rd.init();
	// set drop mode as "single" - DIV element can be dropped only to the empty cells
	rd.dropMode = 'single';
	// event handler invoked on click on DIV element
	rd.event.clicked = function () {
		var div,	// DIV element reference
			i;		// loop variable
		// loop goes through all DIV elements inside table editor
		for (i = 0; i < redips.tableEditorDivs.length; i++) {
			// set reference to the DIV element
			div = redips.tableEditorDivs[i];
		}
	};
	// event handler invoked before DIV element is dropped to the table cell
	rd.event.droppedBefore = function (targetCell) {
		// set new width to the dropped DIV element
		var width = targetCell.offsetWidth;
		// set width and reset height value
		rd.obj.style.width = (width - 2) + 'px';
		rd.obj.style.height = '';
	};
	// event handler invoked in a moment when DIV element is dropped to the table
	rd.event.dropped = function (targetCell) {
		rt.mark(false, targetCell);
	};

	startPositions();

	// when DIV element is double clicked return it to the initial position
	rd.event.dblClicked = function () {
		// set dblclicked DIV id
		var id = rd.obj.id;

		// move DIV element to initial position
		rd.moveObject({
			id: id,			// DIV element id
			target: pos[id]	// target position
		});
	};
};

// save form
redips.save = function () {
	// declare local variables
	var tblEditor = document.getElementById(redips.tableEditor),
		divs = tblEditor.getElementsByTagName('DIV'),
		JSONobj = [],	// prepare JSON object
		json,			// json converted to the string
		component,		// component object
		div,			// current DIV element
		pos,			// component position
		i;				// loop variable

	// loop goes through each DIV element collected in table editor
	for (i = 0; i < divs.length; i++) {
		// set current DIV element
		div = divs[i];

		// filter only components
		if (div.className.indexOf('redips-drag') > -1) {
			// initialize component object
			component = {};

			// retira not-
			component.id_noticia = div.id.slice(4);

			// component position
			pos = REDIPS.drag.getPosition(div);	// get component position in editor table and remove first item from array (table index is not needed)
			pos.shift();						// remove first item from array (table index is not needed)
			component.ordem_noticia = pos[1];		// add position to the component

			// push values for DIV element as Array to the Array
			JSONobj.push(component);
		}
	}

	if(JSONobj.length < 4){
		toastr.info('Quantidade mínima de 4 notícias!')
		return;
	}

	// prepare query string in JSON format (only if array isn't empty)
	if (JSONobj.length > 0) {
		json = JSON.stringify(JSONobj);
	}

	// make ajax call and set redips.handler2 as callback function
	// REDIPS.drag.ajaxCall(redips.ajaxSave, redips.handler2, {method: 'POST', data: 'json=' + json});
	// REDIPS.drag.ajaxCall(redips.ajaxSave, myHandler, {method: 'POST', data: 'name1=value1&name2=value2'});
	$.ajax({
		url: redips.ajaxSave,
		method: 'post',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			json: json,
		},
		success: function (result) {
			toastr.success('Cadastrado com Sucesso!');
			setInterval(() => {
				window.location.reload();
			}, 1500);
		}, error: function (error) {
			toastr.error('Não foi possível realizar o cadastro.', 'Erro!');
		}
	});
};

// function scans DIV elements and saves their positions to the "pos" object
startPositions = function () {
	// define local varialbles
	var divs, id, i, position;
	// collect DIV elements from dragging area
	divs = document.getElementById('redips-drag').getElementsByTagName('div');
	// open loop for each DIV element
	for (i = 0; i < divs.length; i++) {
		// set DIV element id
		id = divs[i].id;
		// if element id is defined, then save element position
		if (id) {
			// set element position
			position = rde.getPosition(divs[i]);
			// if div has position (filter obj_new)
			if (position.length > 0) {
				pos[id] = position;
			}
		}
	}
};

// add onload event listener
if (window.addEventListener) {
	window.addEventListener('load', redips.init, false);
}
else if (window.attachEvent) {
	window.attachEvent('onload', redips.init);
}
