
	
	
	
	$(document).keypress(
		function(event){
			if (event.which == '13') {
			event.preventDefault();
		}
	});
		
	
	function addItemtransposicao(){
		
		
		///////////////////////////////////SUPERÁVIT////////////////////////////////////////////
		
		var recurso = document.getElementById('recurso_spt').value;
		var valor = document.getElementById('valor_spt').value;
		
		document.getElementById('recurso_spt').value = "";
		document.getElementById('valor_spt').value = "";
		
		recurso = recurso.toUpperCase();
		valor = valor.toUpperCase();
		
		var valor_temp = "";	
		var i = 0;

		var local=document.getElementById('tabela_transposicao');
		tblBody = local.tBodies[0];
		var newRow1 = tblBody.insertRow(-1);
		var newCell0 = newRow1.insertCell(0);
		newCell0.innerHTML = '<td></td>';
		var newCell1 = newRow1.insertCell(1);
		newCell1.innerHTML = '<td></td>';
		var newCell2 = newRow1.insertCell(2);
		newCell2.innerHTML = '<td></td>';
		var newCell3 = newRow1.insertCell(3);
		i = parseInt(newRow1.rowIndex);
		i = i-1;
		newCell3.innerHTML = '<td style="width:100px"><input value="'+valor+'" id="valor_spt-'+i+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor+'</div></input></td>';
		var newCell4 = newRow1.insertCell(4);
		newCell4.innerHTML = '<td style="width:450px"><input value="'+recurso+'" id="recurso_spt-'+i+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso+'</div></input></td>';
		var newCell5 = newRow1.insertCell(5);
		newCell5.innerHTML = '<td style="width:20px"><button type="button" style="width:100%; color:#000" id="transposicao" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>';
		var newCell6 = newRow1.insertCell(6);
		newCell6.innerHTML = '<td></td>';
		var newCell7 = newRow1.insertCell(7);
		newCell7.innerHTML = '<td></td>';
		
		
		var tabela_transposicao = $('#tabela_transposicao');
		var qtdLinhas = $("#tabela_transposicao tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		$("#tabela_transposicao3 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_transposicao3');
			tblBody = local.tBodies[0];
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="spt_valor[]"  id="spt_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';
			var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="spt_recurso[]"  id="spt_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
		
		$("#tabela_transposicao2 tr").remove(); 		// apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
						
			//tabela oculta para encaminhar ao show PHP
			var local=document.getElementById('tabela_transposicao2');
			tblBody = local.tBodies[0];
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="spt_valor[]"  id="spt_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';
			var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="spt_recurso[]"  id="spt_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
		
	
		
		
		///////////////////////////////////transferencia////////////////////////////////////////////
		

		var tabela_transferencia = $('#tabela_transferencia');
		var qtdLinhas = $("#tabela_transferencia tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		$("#tabela_transferencia3 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_transferencia3');
			tblBody = local.tBodies[0];				
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="exc_valor[]"  id="exc_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';				var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="exc_recurso[]"  id="exc_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
		
		$("#tabela_transferencia2 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_transferencia2');
			tblBody = local.tBodies[0];				
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="exc_valor[]"  id="exc_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';				var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="exc_recurso[]"  id="exc_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
				
		valor_total = document.getElementById('total_anular').value;
		valor_total = valor_total.replace("R$", "");
		valor_total = String(valor_total).split(".").join("").replace(",",".");
	
		valor = valor.replace("R$", "");
		valor = String(valor).split(".").join("").replace(",",".");
		
		valor_total = parseFloat(valor)+parseFloat(valor_total);
		valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
		document.getElementById('total_anular').value = valor_total;
	
		}
		
		function addItemtransferencia(){
		
			///////////////////////////////////transferencia////////////////////////////////////////////
			var recurso = document.getElementById('recurso_exc').value;
			var valor = document.getElementById('valor_exc').value;
			
			document.getElementById('recurso_exc').value = "";
			document.getElementById('valor_exc').value = "";
			
			recurso = recurso.toUpperCase();
			valor = valor.toUpperCase();
			var i = 0;	
				
			var local=document.getElementById('tabela_transferencia');
			tblBody = local.tBodies[0];
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input  value="'+valor+'" id="valor_exc-'+i+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor+'</div></input></td>';
			var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input value="'+recurso+'" id="recurso_exc-'+i+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso+'</div></input></td>';
			var newCell5 = newRow1.insertCell(5);
			newCell5.innerHTML = '<td style="width:20px"><button type="button" style="width:100%; color:#000" id="transferencia" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>';
			var newCell6 = newRow1.insertCell(6);
			newCell6.innerHTML = '<td></td>';
			var newCell7 = newRow1.insertCell(7);
			newCell7.innerHTML = '<td></td>';
			
			var tabela_transferencia = $('#tabela_transferencia');
			var qtdLinhas = $("#tabela_transferencia tbody tr").length;
			qtdLinhas = qtdLinhas-1;
			
			$("#tabela_transferencia3 tr").remove();	// apaga as linhas para não duplicar os valores		
			for(var j = 0; j<=qtdLinhas; j++)
			{	
				var valor2 = document.getElementById('valor_exc-'+j).value;
				var recurso2 = document.getElementById('recurso_exc-'+j).value;
				
				//tabela oculta para encaminhar a função suplementar
				var local=document.getElementById('tabela_transferencia3');
				tblBody = local.tBodies[0];				
				var newRow1 = tblBody.insertRow(-1);
				var newCell0 = newRow1.insertCell(0);
				newCell0.innerHTML = '<td></td>';
				var newCell1 = newRow1.insertCell(1);
				newCell1.innerHTML = '<td></td>';
				var newCell2 = newRow1.insertCell(2);
				newCell2.innerHTML = '<td></td>';
				var newCell3 = newRow1.insertCell(3);
				i = parseInt(newRow1.rowIndex);
				i = i-1;
				newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="exc_valor[]"  id="exc_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';				var newCell4 = newRow1.insertCell(4);
				newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="exc_recurso[]"  id="exc_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
			}
			
			$("#tabela_transferencia2 tr").remove();	// apaga as linhas para não duplicar os valores		
			for(var j = 0; j<=qtdLinhas; j++)
			{	
				var valor2 = document.getElementById('valor_exc-'+j).value;
				var recurso2 = document.getElementById('recurso_exc-'+j).value;
				
				//tabela oculta para encaminhar a função suplementar
				var local=document.getElementById('tabela_transferencia2');
				tblBody = local.tBodies[0];				
				var newRow1 = tblBody.insertRow(-1);
				var newCell0 = newRow1.insertCell(0);
				newCell0.innerHTML = '<td></td>';
				var newCell1 = newRow1.insertCell(1);
				newCell1.innerHTML = '<td></td>';
				var newCell2 = newRow1.insertCell(2);
				newCell2.innerHTML = '<td></td>';
				var newCell3 = newRow1.insertCell(3);
				i = parseInt(newRow1.rowIndex);
				i = i-1;
				newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="exc_valor[]"  id="exc_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';				var newCell4 = newRow1.insertCell(4);
				newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="exc_recurso[]"  id="exc_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
			}
					
		///////////////////////////////////SUPERÁVIT////////////////////////////////////////////
		
				
		var tabela_transposicao = $('#tabela_transposicao');
		var qtdLinhas = $("#tabela_transposicao tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		
		
		$("#tabela_transposicao3 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_transposicao3');
			tblBody = local.tBodies[0];
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px"><input type="hidden" value="'+valor2+'" name="spt_valor[]"  id="spt_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';
			var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px"><input type="hidden" value="'+recurso2+'" name="spt_recurso[]"  id="spt_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
		
		$("#tabela_transposicao2 tr").remove(); 		// apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
						
			//tabela oculta para encaminhar ao show PHP
			var local=document.getElementById('tabela_transposicao2');
			tblBody = local.tBodies[0];
			var newRow1 = tblBody.insertRow(-1);
			var newCell0 = newRow1.insertCell(0);
			newCell0.innerHTML = '<td></td>';
			var newCell1 = newRow1.insertCell(1);
			newCell1.innerHTML = '<td></td>';
			var newCell2 = newRow1.insertCell(2);
			newCell2.innerHTML = '<td></td>';
			var newCell3 = newRow1.insertCell(3);
			i = parseInt(newRow1.rowIndex);
			i = i-1;
			newCell3.innerHTML = '<td style="width:100px;"><input value="'+valor2+'" name="spt_valor[]"  id="spt_valor-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+valor2+'</div></input></td>';
			var newCell4 = newRow1.insertCell(4);
			newCell4.innerHTML = '<td style="width:450px;"><input value="'+recurso2+'" name="spt_recurso[]"  id="spt_recurso-'+j+'"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'+recurso2+'</div></input></td>';
		}
		
		valor_total = document.getElementById('total_anular').value;
		valor_total = valor_total.replace("R$", "");
		valor_total = String(valor_total).split(".").join("").replace(",",".");
	
		valor = valor.replace("R$", "");
		valor = String(valor).split(".").join("").replace(",",".");
		
		valor_total = parseFloat(valor)+parseFloat(valor_total);
		valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
		document.getElementById('total_anular').value = valor_total;
	}
		
		
	function ativarTipoCard()
	{
		
		
			if ($('#chk_remanejamento').is(':checked')) {
				document.getElementById('sup_tipo_remanejamento').value = "ok";
				//document.getElementById('anl_tipo_remanejamento').value = "ok";
				document.getElementById('cardRemanejamento').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_remanejamento').value = "";
				//document.getElementById('anl_tipo_remanejamento').value = "";
				document.getElementById('cardRemanejamento').style.display = "none";
			}
			
			if ($('#chk_transposicao').is(':checked')) {
				document.getElementById('sup_tipo_transposicao').value = "ok";
				//document.getElementById('anl_tipo_transposicao').value = "ok";
				document.getElementById('cardTransposicao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_transposicao').value = "";	
				//document.getElementById('anl_tipo_transposicao').value = "";	
				document.getElementById('cardTransposicao').style.display = "none";
			}
			
			if ($('#chk_transferencia').is(':checked')) {
				document.getElementById('sup_tipo_transferencia').value = "ok";
				//document.getElementById('anl_tipo_transferencia').value = "ok";
				document.getElementById('cardTransferencia').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_transferencia').value = "";
				//document.getElementById('anl_tipo_transferencia').value = "";
				document.getElementById('cardTransferencia').style.display = "none";
			}
		
	}
	
	function atualizarFormulario()
	{
		
		var screenWidth = screen.width;
		var screenHeight = screen.height;
		//ajuste de tela
		if(screenWidth < '1320')
		{
			//tela suplementar
			document.getElementById("tabela_suplementar").style.tableLayout = "";
			document.getElementById("tabela_suplementar").style.borderCollapse ="";
			document.getElementById("tabela_suplementar").style.width="";
			document.getElementById("tabela_suplementar").style.marginLeft="";
			document.getElementById("tabela_suplementar").style.marginRight="";
			document.getElementById("tabela_suplementar").style.textAlign="";
			document.getElementById("tabela_suplementar").style.paddingTop="";
			document.getElementById("tabela_suplementar").style.paddingBottom="";

			document.getElementById("tabela_suplementar").style.display="block";
			document.getElementById("tabela_suplementar").style.overflow="auto";

			//tela remanejar
			document.getElementById("tabela_remanejar").style.tableLayout = "";
			document.getElementById("tabela_remanejar").style.borderCollapse ="";
			document.getElementById("tabela_remanejar").style.width="";
			document.getElementById("tabela_remanejar").style.marginLeft="";
			document.getElementById("tabela_remanejar").style.marginRight="";
			document.getElementById("tabela_remanejar").style.textAlign="";
			document.getElementById("tabela_remanejar").style.paddingTop="";
			document.getElementById("tabela_remanejar").style.paddingBottom="";

			document.getElementById("tabela_remanejar").style.display="block";
			document.getElementById("tabela_remanejar").style.overflow="auto";

			//tela transpor
			document.getElementById("tabela_transpor").style.tableLayout = "";
			document.getElementById("tabela_transpor").style.borderCollapse ="";
			document.getElementById("tabela_transpor").style.width="";
			document.getElementById("tabela_transpor").style.marginLeft="";
			document.getElementById("tabela_transpor").style.marginRight="";
			document.getElementById("tabela_transpor").style.textAlign="";
			document.getElementById("tabela_transpor").style.paddingTop="";
			document.getElementById("tabela_transpor").style.paddingBottom="";

			document.getElementById("tabela_transpor").style.display="block";
			document.getElementById("tabela_transpor").style.overflow="auto";

			//tela transferir
			document.getElementById("tabela_transferir").style.tableLayout = "";
			document.getElementById("tabela_transferir").style.borderCollapse ="";
			document.getElementById("tabela_transferir").style.width="";
			document.getElementById("tabela_transferir").style.marginLeft="";
			document.getElementById("tabela_transferir").style.marginRight="";
			document.getElementById("tabela_transferir").style.textAlign="";
			document.getElementById("tabela_transferir").style.paddingTop="";
			document.getElementById("tabela_transferir").style.paddingBottom="";

			document.getElementById("tabela_transferir").style.display="block";
			document.getElementById("tabela_transferir").style.overflow="auto";
		}
		else{
			document.getElementById("tabela_suplementar").style.tableLayout = "fixed";
			document.getElementById("tabela_suplementar").style.borderCollapse ="collapse";
			document.getElementById("tabela_suplementar").style.width="100%";
			document.getElementById("tabela_suplementar").style.marginLeft="auto";
			document.getElementById("tabela_suplementar").style.marginRight="auto";
			document.getElementById("tabela_suplementar").style.textAlign="center";
			document.getElementById("tabela_suplementar").style.paddingTop="16";
			document.getElementById("tabela_suplementar").style.paddingBottom="16";

			document.getElementById("tabela_suplementar").style.display="";
			document.getElementById("tabela_suplementar").style.overflow="";

			//tebela remanejar
			document.getElementById("tabela_remanejar").style.tableLayout = "fixed";
			document.getElementById("tabela_remanejar").style.borderCollapse ="collapse";
			document.getElementById("tabela_remanejar").style.width="100%";
			document.getElementById("tabela_remanejar").style.marginLeft="auto";
			document.getElementById("tabela_remanejar").style.marginRight="auto";
			document.getElementById("tabela_remanejar").style.textAlign="center";
			document.getElementById("tabela_remanejar").style.paddingTop="16";
			document.getElementById("tabela_remanejar").style.paddingBottom="16";

			document.getElementById("tabela_remanejar").style.display="";
			document.getElementById("tabela_remanejar").style.overflow="";

			//tebela transpor
			document.getElementById("tabela_transpor").style.tableLayout = "fixed";
			document.getElementById("tabela_transpor").style.borderCollapse ="collapse";
			document.getElementById("tabela_transpor").style.width="100%";
			document.getElementById("tabela_transpor").style.marginLeft="auto";
			document.getElementById("tabela_transpor").style.marginRight="auto";
			document.getElementById("tabela_transpor").style.textAlign="center";
			document.getElementById("tabela_transpor").style.paddingTop="16";
			document.getElementById("tabela_transpor").style.paddingBottom="16";

			document.getElementById("tabela_transpor").style.display="";
			document.getElementById("tabela_transpor").style.overflow="";

			//tebela transferir
			document.getElementById("tabela_transferir").style.tableLayout = "fixed";
			document.getElementById("tabela_transferir").style.borderCollapse ="collapse";
			document.getElementById("tabela_transferir").style.width="100%";
			document.getElementById("tabela_transferir").style.marginLeft="auto";
			document.getElementById("tabela_transferir").style.marginRight="auto";
			document.getElementById("tabela_transferir").style.textAlign="center";
			document.getElementById("tabela_transferir").style.paddingTop="16";
			document.getElementById("tabela_transferir").style.paddingBottom="16";

			document.getElementById("tabela_transferir").style.display="";
			document.getElementById("tabela_transferir").style.overflow="";


		}
		//alert(screenHeight);
		//screenWidth = 1320
		//screenHeight = 825;
	
			if ($('#chk_remanejamento').is(':checked')) {
				document.getElementById('sup_tipo_remanejamento').value = "ok";
				//document.getElementById('anl_tipo_remanejamento').value = "ok";
				document.getElementById('cardRemanejamento').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_remanejamento').value = "";
				//document.getElementById('anl_tipo_remanejamento').value = "";
				document.getElementById('cardRemanejamento').style.display = "none";
			}
			
			if ($('#chk_transposicao').is(':checked')) {
				document.getElementById('sup_tipo_transposicao').value = "ok";
				//document.getElementById('anl_tipo_transposicao').value = "ok";
				document.getElementById('cardTransposicao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_transposicao').value = "";	
				//document.getElementById('anl_tipo_transposicao').value = "";	
				document.getElementById('cardTransposicao').style.display = "none";
			}
			
			if ($('#chk_transferencia').is(':checked')) {
				document.getElementById('sup_tipo_transferencia').value = "ok";
				//document.getElementById('anl_tipo_transferencia').value = "ok";
				document.getElementById('cardTransferencia').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_transferencia').value = "";
			//	document.getElementById('anl_tipo_transferencia').value = "";
				document.getElementById('cardTransferencia').style.display = "none";
			}  
			
		
			

		var tabela_suplementar = $('#tabela_suplementar');
		var qtdLinhas = $("#tabela_suplementar tbody tr").length;
		qtdLinhas = qtdLinhas - 1;

		for(var i = 0; i<=qtdLinhas; i++)
		{	
			if(document.getElementById('vinculo_sup-'+i) != null && document.getElementById('valor_sup-'+i) != null && document.getElementById('justificativa_sup-'+i) != null)
			{
				document.getElementById('sup_vinculo-['+i+']').value = document.getElementById('vinculo_sup-'+i).value;	
				document.getElementById('sup_valor-['+i+']').value = document.getElementById('valor_sup-'+i).value;	
				document.getElementById('sup_justificativa-['+i+']').value = document.getElementById('justificativa_sup-'+i).value;	
			}

		};
		
		var tabela_remanejar = $('#tabela_remanejar');
		var qtdLinhas = $("#tabela_remanejar tbody tr").length;
		qtdLinhas = qtdLinhas - 1;

		for(var i = 0; i<=qtdLinhas; i++)
		{	
			if(document.getElementById('vinculo_rmj-'+i) != null && document.getElementById('valor_rmj-'+i) != null && document.getElementById('recurso_rmj-'+i) != null)
			{
			
				document.getElementById('rmj_vinculo-['+i+']').value = document.getElementById('vinculo_rmj-'+i).value;	
				document.getElementById('rmj_valor-['+i+']').value = document.getElementById('valor_rmj-'+i).value;	
				document.getElementById('rmj_recurso-['+i+']').value = document.getElementById('recurso_rmj-'+i).value;	
			}

		};
		
		var tabela_transpor = $('#tabela_transpor');
		var qtdLinhas = $("#tabela_transpor tbody tr").length;
		qtdLinhas = qtdLinhas - 1;

		for(var i = 0; i<=qtdLinhas; i++)
		{	
			if(document.getElementById('vinculo_tnp-'+i) != null && document.getElementById('valor_tnp-'+i) != null && document.getElementById('recurso_tnp-'+i) != null)
			{
				document.getElementById('tnp_vinculo-['+i+']').value = document.getElementById('vinculo_tnp-'+i).value;	
				document.getElementById('tnp_valor-['+i+']').value = document.getElementById('valor_tnp-'+i).value;	
				document.getElementById('tnp_recurso-['+i+']').value = document.getElementById('recurso_tnp-'+i).value;	
			}
		};

		var tabela_transpor = $('#tabela_transferir');
		var qtdLinhas = $("#tabela_transferir tbody tr").length;
		qtdLinhas = qtdLinhas - 1;

		for(var i = 0; i<=qtdLinhas; i++)
		{	
			if(document.getElementById('vinculo_tnf-'+i) != null && document.getElementById('valor_tnf-'+i) != null && document.getElementById('recurso_tnf-'+i) != null)
			{
				document.getElementById('tnf_vinculo-['+i+']').value = document.getElementById('vinculo_tnf-'+i).value;	
				document.getElementById('tnf_valor-['+i+']').value = document.getElementById('valor_tnf-'+i).value;	
				document.getElementById('tnf_recurso-['+i+']').value = document.getElementById('recurso_tnf-'+i).value;	
			}
		};

		var tabela_remanejar = $('#tabela_remanejar');
			var qtdLinhas = $("#tabela_remanejar tbody tr").length;
		
			var valor_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_rmj-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#rmj_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_rmj-'+i).value;
					if(valor_temp == "")
					{
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	
					}
				}
			}
			
			var tabela_transpor = $('#tabela_transpor');
			var qtdLinhas = $("#tabela_transpor tbody tr").length;
		
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnp-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnp_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnp-'+i).value;
					if(valor_temp == "")
					{
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	
					}
				}
			}

			var tabela_transferir = $('#tabela_transferir');
			var qtdLinhas = $("#tabela_transferir tbody tr").length;
		
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnf-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnf_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnf-'+i).value;
					if(valor_temp == "")
					{
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	
					}
				}
			}
			
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			if(document.getElementById('total_anular') != null)
			{
				document.getElementById('total_anular').value = valor_total;
			}
			
			var tabela_suplementar = $('#tabela_suplementar');
			var qtdLinhas = $("#tabela_suplementar tbody tr").length;
		
			var valor_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_sup-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#sup_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_sup-'+i).value;
					if(valor_temp == "")
					{
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	
					}
				}
			}
			
			
			if(document.getElementById('total_suplementar2') != null)
			{
				document.getElementById('total_suplementar2').value = valor_total;
			}
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			if(document.getElementById('total_suplementar') != null)
			{
				document.getElementById('total_suplementar').value = valor_total;
			}
	
		
		
	}
	
	function validarFormulario(){
		
	
		var instrumento = document.getElementById('instrumento2').value;
		var numeroInstrumento = document.getElementById('numeroInstrumento2').value;
		var data = document.getElementById('data2').value;
		var tipo_suplementacao1 = document.getElementById('tipo_suplementacao1').value;
		var tipo_suplementacao2 = document.getElementById('tipo_suplementacao2').value;
		var tipo_suplementacao3 = document.getElementById('tipo_suplementacao3').value;
	
		//verifica se o valor a suplementar é compatível com a anular
		
		aAnular = document.getElementById('total_anular').value;
		aSuplementar = document.getElementById('total_suplementar').value;
		
		//verifica se todos os campos da tabela suplementar estão preenchidos
		var tabela_suplementar = $('#tabela_suplementar');
		var qtdLinhas = $("#tabela_suplementar tbody tr").length;
		var sup_vinculo_vazio = false;
		var sup_valor_vazio = false;
		var sup_justificativa_vazio = false;
		
		for(i=0; i<(qtdLinhas-1); i++)
		{
			if(document.getElementById('vinculo_sup-'+i).value == "")
			{
				sup_vinculo_vazio = true;
			}
			else
			{
				//document.getElementById('sup_vinculo-'+i).value = document.getElementById('vinculo_sup-'+i).value;
				sup_vinculo_vazio = false;
			}
			
			if(document.getElementById('valor_sup-'+i).value == "")
			{
				sup_valor_vazio = true;
			}
			else
			{
				//document.getElementById('sup_valor-'+i).value = document.getElementById('valor_sup-'+i).value;
				sup_valor_vazio = false;
			}
			
			if(document.getElementById('justificativa_sup-'+i).value == "")
			{
				sup_justificativa_vazio = true;
			}
			else
			{
				//document.getElementById('sup_justificativa-'+i).value = document.getElementById('justificativa_sup-'+i).value;
				sup_justificativa_vazio = false;
			}
			
		}
		
		
		
		//verifica se todos os campos da tabela anular estão preenchidos
		/*var tabela_anular = $('#tabela_anular');
		var qtdLinhas = $("#tabela_anular tbody tr").length;
		var anl_vinculo_vazio = false;
		var anl_valor_vazio = false;
		var anl_recurso_vazio = false;
		
		
		
		for(i=0; i<(qtdLinhas-1); i++)
		{
			if(document.getElementById('vinculo_anl-'+i).value == "")
			{
				anl_vinculo_vazio = true;
			}
			else
			{
				//document.getElementById('sup_vinculo-'+i).value = document.getElementById('vinculo_sup-'+i).value;
				anl_vinculo_vazio = false;
			}
			
			if(document.getElementById('valor_anl-'+i).value == "")
			{
				anl_valor_vazio = true;
			}
			else
			{
				//document.getElementById('sup_valor-'+i).value = document.getElementById('valor_sup-'+i).value;
				anl_valor_vazio = false;
			}
			
			if(document.getElementById('recurso_anl-'+i).value == "")
			{
				anl_recurso_vazio = true;
			}
			else
			{
				//document.getElementById('sup_justificativa-'+i).value = document.getElementById('justificativa_sup-'+i).value;
				anl_recurso_vazio = false;
			}
		
		}*/
		
		
		
		if(aAnular === aSuplementar && aAnular != "R$ 0,00" && aSuplementar != "R$ 0,00" && instrumento != "" && numeroInstrumento != "" && (tipo_suplementacao1 != "" || tipo_suplementacao2 != "" || tipo_suplementacao3 != "") && data !== "undefined-ed-0" && sup_justificativa_vazio == false && sup_valor_vazio == false && sup_vinculo_vazio == false /*&& anl_recurso_vazio == false && anl_valor_vazio == false && anl_vinculo_vazio == false*/)
		{
			$('#btnEnviar').trigger('click');
		}
		else if(aAnular == "R$ 0,00" || aSuplementar == "R$ 0,00")
		{
			document.getElementById("mensagem").value = "O Valor a Anular ou a Suplementar não pode ser R$ 0,00"; 
			$("#modalMensagemSemSucesso").modal();
		}
		else if(aAnular != aSuplementar )
		{
			document.getElementById("mensagem").value = "O Valor a ser Anulado é Diferente do Valor a ser Suplementado"; 
			$("#modalMensagemSemSucesso").modal();
		}
		else if(instrumento == "")
		{
			document.getElementById("mensagem").value = "O Tipo de Instrumento Administrativo deve ser informado!"; 
			$("#modalMensagemSemSucesso").modal();
		}
		else if(numeroInstrumento == "")
		{
			document.getElementById("mensagem").value = "O Número do Instrumento Administrativo deve ser informado!"; 
			$("#modalMensagemSemSucesso").modal();
		}
		else if(tipo_suplementacao1 == "" && tipo_suplementacao2 == "" && tipo_suplementacao3 == "")
		{
			document.getElementById("mensagem").value = "O Tipo de Suplementação deve ser informado!"; 
			$("#modalMensagemSemSucesso").modal();
		}
		else if(data === "undefined-ed-0")
		{
			document.getElementById("mensagem").value = "A data deve ser informada!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
		else if(sup_vinculo_vazio == true)
		{
			document.getElementById("mensagem").value = "Os vínculos a suplementar devem ser informados!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
		else if(sup_valor_vazio == true)
		{
			document.getElementById("mensagem").value = "Os valores a suplementar devem ser informados!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
		else if(sup_justificativa_vazio == true)
		{
			document.getElementById("mensagem").value = "As justificativas a suplementar devem ser informadas!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
			/*else if(anl_vinculo_vazio == true)
		{
			document.getElementById("mensagem").value = "Os vínculos a anular devem ser informados!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
		else if(anl_valor_vazio == true)
		{
			document.getElementById("mensagem").value = "Os valores a anular devem ser informados!"; 
			$("#modalMensagemSemSucesso").modal();
			
		}
		else if(anl_recurso_vazio == true)
		{
			document.getElementById("mensagem").value = "Os recursos a anular devem ser informadas!"; 
			$("#modalMensagemSemSucesso").modal();		
		}		*/
	}
		
	$(document).ready(function(){
		$(document).mousemove(function(event){
					
			var data = document.getElementById('data').value;
			var dia  = data.split("-")[0];
			var mes  = data.split("-")[1];
			var ano  = data.split("-")[2];
			data = ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-4);
			document.getElementById('sup_data2').value =document.getElementById('data').value;
			//document.getElementById('anl_data2').value =document.getElementById('data').value;
			
			var instrumento = document.getElementById('instrumento').value;
			document.getElementById('sup_instrumento2').value = instrumento;
			//document.getElementById('anl_instrumento2').value = instrumento;
				
			var numeroInstrumento = document.getElementById('numeroInstrumento').value;
			var anoInstrumento = document.getElementById('anoInstrumento').value;
			
			if(numeroInstrumento == "" || anoInstrumento =="")
				{
					
				}
			else{
				document.getElementById('sup_numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
			//	document.getElementById('anl_numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
				document.getElementById('numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
			}
			
			if(instrumento != "" && data != "")
			{
				document.getElementById('instrumento2').value = instrumento;
				document.getElementById('data2').value = data;
			}
			
			if (document.getElementById('tipo_suplementacao1') != null && document.getElementById('tipo_suplementacao2') != null && document.getElementById('tipo_suplementacao3') != null)
			{
				if ($('#chk_remanejamento').is(':checked')) 
				{
					document.getElementById('tipo_suplementacao1').value = "Remanejamento";		
					//document.getElementById('tipo_remanejamento').value = "ok";
					//document.getElementById('cardremanejamento').style.display = "";
				}
				else
				{
					document.getElementById('tipo_suplementacao1').value = "";	
					//document.getElementById('tipo_remanejamento').value = "";
					//document.getElementById('cardremanejamento').style.display = "none";	
				}
				
				if ($('#chk_transposicao').is(':checked')) {
					
					document.getElementById('tipo_suplementacao2').value = "Transposição";	
					//document.getElementById('tipo_transposicao').value = "ok";
					//document.getElementById('cardtransposicao').style.display = "";
				
				}
				else
				{
					document.getElementById('tipo_suplementacao2').value = "";	
					//document.getElementById('tipo_transposicao').value = "";	
					//document.getElementById('cardtransposicao').style.display = "none";
					
				}
				
				if ($('#chk_transferencia').is(':checked')) {
					document.getElementById('tipo_suplementacao3').value = "Transferência de Arrecadação";
					//document.getElementById('tipo_transferencia').value = "ok";
					//document.getElementById('cardtransferenciaArrecadacao').style.display = "";
					
				}
				else
				{
					document.getElementById('tipo_suplementacao3').value = "";	
					//document.getElementById('tipo_transferencia').value = "";
					//document.getElementById('cardtransferenciaArrecadacao').style.display = "none";
					
				}			
			}	
		});
	});

  function removerLinha(obj, id){
			
			
            // Capturamos a referência da TR (linha) pai do objeto
            var objTR = obj.parentNode.parentNode;	
            // Capturamos a referência da TABLE (tabela) pai da linha 		
			var objTable = objTR.parentNode;
			// Capturamos o índice da linha
            var indexTR = objTR.rowIndex;
			//alert(indexTR);
			// Chamamos o método de remoção de linha nativo do JavaScript, passando como parâmetro o índice da linha  
			id = id.slice(4);
			//alert(id);
			document.getElementById('tabela_'+id).deleteRow(indexTR);

			if(id == 'transposicao')
			{
				document.getElementById('tabela_transposicao2').deleteRow(indexTR);
				document.getElementById('tabela_transposicao3').deleteRow(indexTR);
			}
			else if(id == 'transferencia')
			{
				document.getElementById('tabela_transferencia2').deleteRow(indexTR);
				document.getElementById('tabela_transferencia3').deleteRow(indexTR);
			}
			
			document.getElementById("suplementar").click();
			
        } 
		
	
	
	function sup_atualizar_vinculo(x, y)
	{
		if(document.getElementById('sup_vinculo-['+y+']') != null)
		{
			document.getElementById('sup_vinculo-['+y+']').value = x.value;
		}
	}
	
	function sup_atualizar_justificativa(x, y)
	{
		if(document.getElementById('sup_justificativa-['+y+']') != null)
		{
			document.getElementById('sup_justificativa-['+y+']').value = x.value;
		}
	}
		
	function sup_atualizar_valor(x, y)
	{	
		$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		
			//nunca mais mexer pq eu demorei mais de 3 dias para conseguir fazer isto aqui
			var tabela_suplementar = $('#tabela_suplementar');
			var qtdLinhas = $("#tabela_suplementar tbody tr").length;
		
			var valor_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_sup-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#sup_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_sup-'+i).value;
					if(valor_temp == "")
					{
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	
					}
				}
			}
			
			
			
			document.getElementById('total_suplementar2').value = valor_total;
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			document.getElementById('total_suplementar').value = valor_total;
			document.getElementById('valor_sup_total').value = valor_total;
		
			
			document.getElementById('sup_valor-['+y+']').value = x.value;
	
			
	}
	
	function rmj_atualizar_valor(x, y)
	{	
		
		$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		
			//nunca mais mexer pq eu demorei mais de 3 dias para conseguir fazer isto aqui
			var tabela_ = $('#tabela_remanejar');
			var qtdLinhas = ($("#tabela_remanejar tbody tr").length)-1;
		
			var valor_total = 0;
			var valor_rmj_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
			
				if (document.getElementById('valor_rmj-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#rmj_codigo_dotacao').trigger(e);

					
				}
				else{
					valor_temp = document.getElementById('valor_rmj-'+i).value;
					
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						
						valor_total = parseFloat(valor_temp) + valor_total;	
						valor_rmj_total = parseFloat(valor_temp) + valor_rmj_total;
						document.getElementById("valor_rmj_total").value = valor_rmj_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}	
			}
			
			var tabela_transpor = $('#tabela_transpor');
			var qtdLinhas = $("#tabela_transpor tbody tr").length;
		
			var valor_tnp_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnp-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnp_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnp-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnp_total = parseFloat(valor_temp) + valor_tnp_total;
						document.getElementById("valor_tnp_total").value = valor_tnp_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}

			var tabela_transferir = $('#tabela_transferir');
			var qtdLinhas = $("#tabela_transferir tbody tr").length;
		
			valor_tnf_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnf-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnf_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnf-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnf_total = parseFloat(valor_temp) + valor_tnf_total;
						document.getElementById("valor_tnf_total").value = valor_tnf_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
			
			//document.getElementById('total_remanejar2').value = valor_total;
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			document.getElementById('total_anular').value = valor_total;
			document.getElementById('rmj_valor-['+y+']').value = x.value;
		
	}

	function rmj_atualizar_vinculo(x, y)
	{
		if(document.getElementById('rmj_vinculo-['+y+']') != null)
		{
			document.getElementById('rmj_vinculo-['+y+']').value = x.value;
		}
	}
	
	function rmj_atualizar_recurso(x, y)
	{
		if(document.getElementById('rmj_recurso-['+y+']') != null)
		{
			document.getElementById('rmj_recurso-['+y+']').value = x.value;
		}
	}

	function tnp_atualizar_valor(x, y)
	{	
		$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		
			//nunca mais mexer pq eu demorei mais de 3 dias para conseguir fazer isto aqui
			var tabela_transpor = $('#tabela_transpor');
			var qtdLinhas = $("#tabela_transpor tbody tr").length;
		
			var valor_total = 0;
			var valor_tnp_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnp-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnp_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnp-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnp_total = parseFloat(valor_temp) + valor_tnp_total;
						document.getElementById("valor_tnp_total").value = valor_tnp_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
			
			var tabela_transferir = $('#tabela_transferir');
			var qtdLinhas = $("#tabela_transferir tbody tr").length;
		
			var valor_tnf_total = 0 ;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnf-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnf_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnf-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnf_total = parseFloat(valor_temp) + valor_tnf_total;
						document.getElementById("valor_tnf_total").value = valor_tnf_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}

			var tabela_remanejar = $('#tabela_remanejar');
			var qtdLinhas = $("#tabela_remanejar tbody tr").length;
			
			var valor_rmj_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_rmj-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#rmj_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_rmj-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_rmj_total = parseFloat(valor_temp) + valor_rmj_total;
						document.getElementById("valor_rmj_total").value = valor_rmj_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
			
			//document.getElementById('total_transpor2').value = valor_total;
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			document.getElementById('total_anular').value = valor_total;
			document.getElementById('tnp_valor-['+y+']').value = x.value;		
	}

	function tnp_atualizar_recurso(x, y)
	{
		if(document.getElementById('tnp_recurso-['+y+']') != null)
		{
			document.getElementById('tnp_recurso-['+y+']').value = x.value;
		}
	}

	function tnp_atualizar_vinculo(x, y)
	{
		if(document.getElementById('tnp_vinculo-['+y+']') != null)
		{
			document.getElementById('tnp_vinculo-['+y+']').value = x.value;
		}
	}

	function tnf_atualizar_valor(x, y)
	{	
		$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		
			//nunca mais mexer pq eu demorei mais de 3 dias para conseguir fazer isto aqui
			var tabela_transferir = $('#tabela_transferir');
			var qtdLinhas = $("#tabela_transferir tbody tr").length;
		
			var valor_total = 0;
			var valor_tnf_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnf-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnf_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnf-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnf_total = parseFloat(valor_temp) + valor_tnf_total;
						document.getElementById("valor_tnf_total").value = valor_tnf_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}


			var tabela_remanejar = $('#tabela_remanejar');
			var qtdLinhas = $("#tabela_remanejar tbody tr").length;
		
			var valor_rmj_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_rmj-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#rmj_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_rmj-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_rmj_total = parseFloat(valor_temp) + valor_rmj_total;
						document.getElementById("valor_rmj_total").value = valor_rmj_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}

			var tabela_transpor = $('#tabela_transpor');
			var qtdLinhas = $("#tabela_transpor tbody tr").length;
		
			var valor_tnp_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_tnp-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; //choose the one you want
					e.keyCode = 13;
					$('#tnp_codigo_dotacao').trigger(e);
				}
				else{
					valor_temp = document.getElementById('valor_tnp-'+i).value;
					if(valor_temp == "")
					{
						valor_temp = 0.00;		
					}
					else{
						if (valor_temp.indexOf(',') == -1) 
						{
						} 
						else 
						{
							valor_temp = valor_temp.replace("R$", "");
							valor_temp = String(valor_temp).split(".").join("").replace(",",".");
						}
						valor_total = parseFloat(valor_temp) + valor_total;	

						valor_tnp_total = parseFloat(valor_temp) + valor_tnp_total;
						document.getElementById("valor_tnp_total").value = valor_tnp_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}

		//document.getElementById('total_transferir2').value = valor_total;
		valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
		document.getElementById('total_anular').value = valor_total;
		if(document.getElementById('tnf_valor-['+y+']') != null)
		{
			document.getElementById('tnf_valor-['+y+']').value = x.value;
		}
		
	}

	function tnf_atualizar_vinculo(x, y)
	{
		if(document.getElementById('tnf_vinculo-['+y+']') != null)
		{
			document.getElementById('tnf_vinculo-['+y+']').value = x.value;
		}
	}
	
	function tnf_atualizar_recurso(x, y)
	{
		if(document.getElementById('tnf_recurso-['+y+']') != null)
		{
			document.getElementById('tnf_recurso-['+y+']').value = x.value;
		}
	}

	function ativarBotao(x){
		
		if(x == "sup_codigo_dotacao")
		{
			if(document.getElementById("sup_codigo_dotacao") != null)
			{
				var valor = document.getElementById("sup_codigo_dotacao").value;
				if(valor != "")
				{
					document.getElementById("suplementar").disabled = false;
				}
				else{
					document.getElementById("suplementar").disabled = true;
				}
			}
		}
		else if(x == "rmj_codigo_dotacao")
		{
			//alert('oi');
			if(document.getElementById("rmj_codigo_dotacao") != null)
			{
				var valor = document.getElementById("rmj_codigo_dotacao").value;
				if(valor != "")
				{
					document.getElementById("remanejar").disabled = false;
				}
				else{
					document.getElementById("remanejar").disabled = true;
				}
			}
		}	
		else if(x == "tnp_codigo_dotacao")
		{
			//alert('oi');
			if(document.getElementById("tnp_codigo_dotacao") != null)
			{
				var valor = document.getElementById("tnp_codigo_dotacao").value;
				if(valor != "")
				{
					document.getElementById("transpor").disabled = false;
				}
				else{
					document.getElementById("transpor").disabled = true;
				}
			}
		}	
		else if(x == "tnf_codigo_dotacao")
		{
			//alert('oi');
			if(document.getElementById("tnf_codigo_dotacao") != null)
			{
				var valor = document.getElementById("tnf_codigo_dotacao").value;
				if(valor != "")
				{
					document.getElementById("transferir").disabled = false;
				}
				else{
					document.getElementById("transferir").disabled = true;
				}
			}
		}	
		

	}