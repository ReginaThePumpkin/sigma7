// JavaScript Document
$(document).ready(function(e) {
	
    $('#m_r_pacientes').on('click',function(){
		$('#my_search').removeClass('hidden'); 
		$('#container').load("htmls/r_pacientes.php", function(response, status, xhr){ if(status=="success"){
			
			var tamP = $('#referencia').height() - (($('#my_nav').height() - $('#my_footer').height()) * 5);
			var oTableP = $('#dataTablePrincipal').DataTable({
				serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: true, "scrollX": true,
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: true,
				"aoColumns": [
					{"bSortable":false}, {"bSortable":false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": false },
					{"bSortable":false}, {"bSortable":false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": false },
					{"bSortable":false}, {"bSortable":false },{ "bSortable": false }, { "bSortable": false }
				],
				"sDom": '<"filtro1Principal">r<"data_tPrincipal"t><"infoPrincipal"iS>', 
				deferRender: true, select: true, "processing": true,
				"sAjaxSource": "datatable-serverside/pacientes.php",
				"fnServerParams": function (aoData, fnCallback) { 
					var de = $('#top-search').val(), cv = $('#convenioP1').val(); 
					aoData.push( {"name": "nombre", "value": de } ); 
					aoData.push( {"name": "convenio", "value": cv } ); 
				},
				"oLanguage": {
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
					"sInfo": "PACIENTES FILTRADOS: _END_",
					"sInfoEmpty": "NINGÚN PACIENTE FILTRADO.", "sInfoFiltered": " TOTAL DE PACIENTES: _MAX_", "sSearch": "",
					"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
				},scroller: { loadingIndicator: true }, "iDisplayLength": 2000, paging: true, 
				initComplete: function () { this.api().row( 200 ).scrollTo(); }, select: { style: 'single' }
			});
			$('#clickme').click(function(e) { oTableP.draw(); });
			window.setTimeout(function(){$('#clickme').click();},500);
			
			//para los fintros individuales por campo de texto
			oTableP.columns().every( function () {
				var that = this;
		 
				$( 'input', this.footer() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
				} );
			} );
			//fin filtros individuales por campo de texto
		}});
	});

});