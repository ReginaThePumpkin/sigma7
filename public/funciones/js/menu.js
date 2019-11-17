// JavaScript Document
$(document).ready(function(e) {
	
    $('#m_r_pacientes').on('click',function(){
		$('#m_recepcion, #m_r_pacientes').parent().addClass('active');
		$('#my_search').removeClass('hidden'); 
		$('#container').load("htmls/r_pacientes.php", function(response, status, xhr){ if(status=="success"){
			
			var tamP = $('#page-wrapper').height();
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
				},scroller: { loadingIndicator: true }, "iDisplayLength": 200, paging: true, 
				initComplete: function () { this.api().row( 100 ).scrollTo(); }, select: { style: 'single' }
			});
			$('#clickme').click(function(e) { oTableP.draw(); });
			window.setTimeout(function(){$('#clickme').click();},500);
			$('#top-search').keyup(function(e) { //alert(1);
                $('#clickme').click();
            });
			
			//para los fintros individuales por campo de texto
			oTableP.columns().every( function () {
				var that = this;
		 
				$( 'input', this.footer() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
				} );
			} );
			//fin filtros individuales por campo de texto
			
			$('.infoPrincipal').append( "<div style='border:1px solid red; text-align:right; height:50%;'><table id='ocultarFP' style='float:right;' width='' border='0' cellspacing='0' cellpadding='6'> <tr> <td> <button id='addPacientePrincipal' onClick='nuevoPaciente()' class='ui-button ui-widget ui-corner-all' title='Agregar un nuevo paciente'><span class='ui-icon ui-icon-plus'></span> <span class='ui-icon ui-icon-person'></span> </button></td> <td><select name='convenioP1' id='convenioP1'></select></td> </tr> </table></div>" );
		}});
	});//Fin menu recepcion pacientes

});