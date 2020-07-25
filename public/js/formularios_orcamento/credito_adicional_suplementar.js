
	
	
	
	$(document).keypress(
		function(event){
			if (event.which == '13') {
			event.preventDefault();
		}
	});
		
	
	function addItemSuperavit(){
		
		
		///////////////////////////////////SUPERÁVIT////////////////////////////////////////////
		
		var recurso = document.getElementById('recurso_spt').value;
		var valor = document.getElementById('valor_spt').value;
		
		
		document.getElementById('recurso_spt').value = "";
		document.getElementById('valor_spt').value = "";
		
		recurso = recurso.toUpperCase();
		valor = valor.toUpperCase();
		
		var valor_temp = "";	
		var i = 0;

		var local=document.getElementById('tabela_superavit');
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
		newCell5.innerHTML = '<td style="width:20px"><button type="button" style="width:100%; color:#000" id="superavit" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>';
		var newCell6 = newRow1.insertCell(6);
		newCell6.innerHTML = '<td></td>';
		var newCell7 = newRow1.insertCell(7);
		newCell7.innerHTML = '<td></td>';
		
		
		var tabela_superavit = $('#tabela_superavit');
		var qtdLinhas = $("#tabela_superavit tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		$("#tabela_superavit3 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_superavit3');
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
		
		$("#tabela_superavit2 tr").remove(); 		// apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
						
			//tabela oculta para encaminhar ao show PHP
			var local=document.getElementById('tabela_superavit2');
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
		
	
		
		
		///////////////////////////////////EXCESSO////////////////////////////////////////////
		

		var tabela_excesso = $('#tabela_excesso');
		var qtdLinhas = $("#tabela_excesso tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		$("#tabela_excesso3 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_excesso3');
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
		
		$("#tabela_excesso2 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_excesso2');
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

		var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_spt_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_spt-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_spt-'+i).value;
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
							
							valor_spt_total = parseFloat(valor_temp) + valor_spt_total;
							document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_spt_total = 0.00;
				document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}

			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_exc_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_exc-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_exc-'+i).value;
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
							
							valor_exc_total = parseFloat(valor_temp) + valor_exc_total;
							document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_exc_total = 0.00;
				document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}
	
		}
		
		function addItemExcesso(){
		
			///////////////////////////////////EXCESSO////////////////////////////////////////////
			var recurso = document.getElementById('recurso_exc').value;
			var valor = document.getElementById('valor_exc').value;
			
			document.getElementById('recurso_exc').value = "";
			document.getElementById('valor_exc').value = "";
			
			recurso = recurso.toUpperCase();
			valor = valor.toUpperCase();
			var i = 0;	
				
			var local=document.getElementById('tabela_excesso');
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
			newCell5.innerHTML = '<td style="width:20px"><button type="button" style="width:100%; color:#000" id="excesso" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>';
			var newCell6 = newRow1.insertCell(6);
			newCell6.innerHTML = '<td></td>';
			var newCell7 = newRow1.insertCell(7);
			newCell7.innerHTML = '<td></td>';
			
			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			qtdLinhas = qtdLinhas-1;
			
			$("#tabela_excesso3 tr").remove();	// apaga as linhas para não duplicar os valores		
			for(var j = 0; j<=qtdLinhas; j++)
			{	
				var valor2 = document.getElementById('valor_exc-'+j).value;
				var recurso2 = document.getElementById('recurso_exc-'+j).value;
				
				//tabela oculta para encaminhar a função suplementar
				var local=document.getElementById('tabela_excesso3');
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
			
			$("#tabela_excesso2 tr").remove();	// apaga as linhas para não duplicar os valores		
			for(var j = 0; j<=qtdLinhas; j++)
			{	
				var valor2 = document.getElementById('valor_exc-'+j).value;
				var recurso2 = document.getElementById('recurso_exc-'+j).value;
				
				//tabela oculta para encaminhar a função suplementar
				var local=document.getElementById('tabela_excesso2');
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
		
				
		var tabela_superavit = $('#tabela_superavit');
		var qtdLinhas = $("#tabela_superavit tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		
		
		$("#tabela_superavit3 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_superavit3');
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
		
		$("#tabela_superavit2 tr").remove(); 		// apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
						
			//tabela oculta para encaminhar ao show PHP
			var local=document.getElementById('tabela_superavit2');
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

		var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_spt_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_spt-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_spt-'+i).value;
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
							
							valor_spt_total = parseFloat(valor_temp) + valor_spt_total;
							document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_spt_total = 0.00;
				document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}

			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_exc_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_exc-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_exc-'+i).value;
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
							
							valor_exc_total = parseFloat(valor_temp) + valor_exc_total;
							document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_exc_total = 0.00;
				document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}
	}
		
		
	function ativarTipoCard()
	{
		
		
			if ($('#chk_anulacao').is(':checked')) {
				document.getElementById('sup_tipo_anulacao').value = "ok";
				document.getElementById('anl_tipo_anulacao').value = "ok";
				document.getElementById('cardAnulacao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_anulacao').value = "";
				document.getElementById('anl_tipo_anulacao').value = "";
				document.getElementById('cardAnulacao').style.display = "none";
			}
			
			if ($('#chk_superavit').is(':checked')) {
				document.getElementById('sup_tipo_superavit').value = "ok";
				document.getElementById('anl_tipo_superavit').value = "ok";
				document.getElementById('cardSuperavit').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_superavit').value = "";	
				document.getElementById('anl_tipo_superavit').value = "";	
				document.getElementById('cardSuperavit').style.display = "none";
			}
			
			if ($('#chk_excesso').is(':checked')) {
				document.getElementById('sup_tipo_excesso').value = "ok";
				document.getElementById('anl_tipo_excesso').value = "ok";
				document.getElementById('cardExcessoArrecadacao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_excesso').value = "";
				document.getElementById('anl_tipo_excesso').value = "";
				document.getElementById('cardExcessoArrecadacao').style.display = "none";
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
			document.getElementById("tabela_anular").style.tableLayout = "";
			document.getElementById("tabela_anular").style.borderCollapse ="";
			document.getElementById("tabela_anular").style.width="";
			document.getElementById("tabela_anular").style.marginLeft="";
			document.getElementById("tabela_anular").style.marginRight="";
			document.getElementById("tabela_anular").style.textAlign="";
			document.getElementById("tabela_anular").style.paddingTop="";
			document.getElementById("tabela_anular").style.paddingBottom="";

			document.getElementById("tabela_anular").style.display="block";
			document.getElementById("tabela_anular").style.overflow="auto";

			
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
			document.getElementById("tabela_anular").style.tableLayout = "fixed";
			document.getElementById("tabela_anular").style.borderCollapse ="collapse";
			document.getElementById("tabela_anular").style.width="100%";
			document.getElementById("tabela_anular").style.marginLeft="auto";
			document.getElementById("tabela_anular").style.marginRight="auto";
			document.getElementById("tabela_anular").style.textAlign="center";
			document.getElementById("tabela_anular").style.paddingTop="16";
			document.getElementById("tabela_anular").style.paddingBottom="16";

			document.getElementById("tabela_anular").style.display="";
			document.getElementById("tabela_anular").style.overflow="";

		}

		//copia os dados da tabela
		var tabela_superavit = $('#tabela_superavit');
		var qtdLinhas = $("#tabela_superavit tbody tr").length;
		qtdLinhas = qtdLinhas-1;
	
		$("#tabela_superavit3 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar à função suplementar
			var local=document.getElementById('tabela_superavit3');
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

		$("#tabela_superavit2 tr").remove(); // apaga as linhas para não duplicar os valores
		for(var j = 0; j<=qtdLinhas; j++)
		{
			
			var valor2 = document.getElementById('valor_spt-'+j).value;
			var recurso2 = document.getElementById('recurso_spt-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_superavit2');
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

		var tabela_excesso = $('#tabela_excesso');
		var qtdLinhas = $("#tabela_excesso tbody tr").length;
		qtdLinhas = qtdLinhas-1;
		
		$("#tabela_excesso3 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_excesso3');
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

		$("#tabela_excesso2 tr").remove();	// apaga as linhas para não duplicar os valores		
		for(var j = 0; j<=qtdLinhas; j++)
		{	
			var valor2 = document.getElementById('valor_exc-'+j).value;
			var recurso2 = document.getElementById('recurso_exc-'+j).value;
			
			//tabela oculta para encaminhar a função suplementar
			var local=document.getElementById('tabela_excesso2');
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
			
			if ($('#chk_anulacao').is(':checked')) {
				document.getElementById('sup_tipo_anulacao').value = "ok";
				document.getElementById('anl_tipo_anulacao').value = "ok";
				document.getElementById('cardAnulacao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_anulacao').value = "";
				document.getElementById('anl_tipo_anulacao').value = "";
				document.getElementById('cardAnulacao').style.display = "none";
			}
			
			if ($('#chk_superavit').is(':checked')) {
				document.getElementById('sup_tipo_superavit').value = "ok";
				document.getElementById('anl_tipo_superavit').value = "ok";
				document.getElementById('cardSuperavit').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_superavit').value = "";	
				document.getElementById('anl_tipo_superavit').value = "";	
				document.getElementById('cardSuperavit').style.display = "none";
			}
			
			if ($('#chk_excesso').is(':checked')) {
				document.getElementById('sup_tipo_excesso').value = "ok";
				document.getElementById('anl_tipo_excesso').value = "ok";
				document.getElementById('cardExcessoArrecadacao').style.display = "";
			}
			else{
				document.getElementById('sup_tipo_excesso').value = "";
				document.getElementById('anl_tipo_excesso').value = "";
				document.getElementById('cardExcessoArrecadacao').style.display = "none";
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
		
		var tabela_anular = $('#tabela_anular');
		var qtdLinhas = $("#tabela_anular tbody tr").length;
		qtdLinhas = qtdLinhas - 1;

		for(var i = 0; i<=qtdLinhas; i++)
		{		
			if(document.getElementById('vinculo_anl-'+i) != null && document.getElementById('valor_anl-'+i) != null && document.getElementById('recurso_anl-'+i) != null)
			{
				document.getElementById('anl_vinculo-['+i+']').value = document.getElementById('vinculo_anl-'+i).value;	
				document.getElementById('anl_valor-['+i+']').value = document.getElementById('valor_anl-'+i).value;	
				document.getElementById('anl_recurso-['+i+']').value = document.getElementById('recurso_anl-'+i).value;	
			}
		};
		
		////////////////////////////////////////////////////////////////////////////////////////////

			var tabela_anular = $('#tabela_anular');
			var qtdLinhas = $("#tabela_anular tbody tr").length;
			
			var valor_total = 0;
			var valor_temp = 0;
			for(var i =0; i<qtdLinhas; i++)
			{		
				if (document.getElementById('valor_anl-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; 
					e.keyCode = 13;
					$('#anl_codigo_dotacao').trigger(e);
				}
				else{
					
					valor_temp = document.getElementById('valor_anl-'+i).value;
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
					}
				}
			}
			
			
			var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_temp = 0;
			
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_spt-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; 
					e.keyCode = 13;
					
				}
				else{
					valor_temp = document.getElementById('valor_spt-'+i).value;
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
			
			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_temp = 0;
				
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_exc-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; 
					e.keyCode = 13;
					
					
				}
				else{
					valor_temp = document.getElementById('valor_exc-'+i).value;
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
			if(document.getElementById('total_anular') != null){
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
			if(document.getElementById('total') != null){
				document.getElementById('total').value = valor_total;
			}
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			if(document.getElementById('total_suplementar') != null)
			{
				document.getElementById('total_suplementar').value = valor_total;
			}
	

			var tabela_suplementar = $('#tabela_suplementar');
			var qtdLinhas = $("#tabela_suplementar tbody tr").length;
			
			var valor_sup_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_sup-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_sup-'+i).value;
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
							
							valor_sup_total = parseFloat(valor_temp) + valor_sup_total;
							document.getElementById("valor_sup_total").value = valor_sup_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_sup_total = 0.00;
				document.getElementById("valor_sup_total").value = valor_sup_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}


			var tabela_anular = $('#tabela_anular');
			var qtdLinhas = $("#tabela_anular tbody tr").length;
			
			var valor_anl_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_anl-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_anl-'+i).value;
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
							
							valor_anl_total = parseFloat(valor_temp) + valor_anl_total;
							document.getElementById("valor_anl_total").value = valor_anl_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_anl_total = 0.00;
				document.getElementById("valor_anl_total").value = valor_anl_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}
		
			var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_spt_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_spt-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_spt-'+i).value;
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
							
							valor_spt_total = parseFloat(valor_temp) + valor_spt_total;
							document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_spt_total = 0.00;
				document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}

			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_exc_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_exc-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_exc-'+i).value;
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
							
							valor_exc_total = parseFloat(valor_temp) + valor_exc_total;
							document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_exc_total = 0.00;
				document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}

			
		
	}
	
	function validarFormulario(){


		/*PARA O FUTURO
		//verifica se há anulação suficiente para as suplementação considerando as classificações e ações
		var natureza = "";
		var classificacao = "";
		var valor ="";
		var valor_temp ="";
		var tabela_suplementar = $('#tabela_suplementar');
		var qtdLinhas = $("#tabela_suplementar tbody tr").length;
		var dados_suplementar = new Array();
	
		for(var i =0; i<(qtdLinhas-1); i++)
		{	
			
			classificacao = document.getElementById('classificacao_sup-'+i).innerHTML;
			natureza = document.getElementById('natureza_sup-'+i).innerHTML;
			valor = document.getElementById('valor_sup-'+i).value;
		
			classificacao = classificacao.substr(12);
			natureza = natureza.substr(-12, 1);
			valor = valor.replace("R$", "");
			valor = String(valor).split(".").join("").replace(",",".");
			valor = parseFloat(valor);	
			var verifica=false;
			
			if(dados_suplementar.length == 0)
			{
				dados_suplementar[i] = new Array();
				dados_suplementar[i][0] = classificacao;
				dados_suplementar[i][1] = natureza;
				dados_suplementar[i][2] = valor;
			}
			else{
				for(j=0; j<dados_suplementar.length; j++)
				{
					alert(dados_suplementar[j][0] +' e '+classificacao);
					if(dados_suplementar[j][0] == classificacao)
					{
						verifica=true;
						dados_suplementar[j][2] = valor + dados_suplementar[j][2];
					}
					else
					{
						//verifica=false;
					}
				};
				if (verifica == false)
				{
					dados_suplementar[i] = new Array();
					dados_suplementar[i][0] = classificacao;
					dados_suplementar[i][1] = natureza;
					dados_suplementar[i][2] = valor;
				}
				else
				{
				}
			}
		};
		
		//verifica se há anulação suficiente para as anllementação considerando as classificações e ações
		var natureza = "";
		var classificacao = "";
		var valor ="";
		var valor_temp ="";
		var tabela_anular = $('#tabela_anular');
		var qtdLinhas = $("#tabela_anular tbody tr").length;
		var dados_anular = new Array();
			
		for(var i =0; i<(qtdLinhas-1); i++)
		{			
			classificacao = document.getElementById('classificacao_anl-'+i).innerHTML;
			natureza = document.getElementById('natureza_anl-'+i).innerHTML;	
			valor = document.getElementById('valor_anl-'+i).value;
				
			classificacao = classificacao.substr(12);
			natureza = natureza.substr(-12, 1);
			valor = valor.replace("R$", "");
			valor = String(valor).split(".").join("").replace(",",".");
			valor = parseFloat(valor);	
			var verifica=false;
					
			if(dados_anular.length == 0)
			{
				dados_anular[i] = new Array();
				dados_anular[i][0] = classificacao;
				dados_anular[i][1] = natureza;
				dados_anular[i][2] = valor;
			}
			else{
				for(j=0; j<dados_anular.length; j++)
				{
					alert(dados_anular[j][0] +' e '+classificacao);
					if(dados_anular[j][0] == classificacao)
					{
						verifica=true;
						dados_anular[j][2] = valor + dados_anular[j][2];
					}
					else
					{
						//verifica=false;
					}
				};
				if (verifica == false)
				{
					dados_anular[i] = new Array();
					dados_anular[i][0] = classificacao;
					dados_anular[i][1] = natureza;
					dados_anular[i][2] = valor;
				}
				else
				{
				}
			}
		};
		*/
	
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
			if(document.getElementById('vinculo_sup-'+i) != null && document.getElementById('valor_sup-'+i) != null && document.getElementById('justificativa_sup-'+i) != null)
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
			
		}
		
		
		
		//verifica se todos os campos da tabela anular estão preenchidos
		var tabela_anular = $('#tabela_anular');
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
		
		}
		
		
		
		if(aAnular === aSuplementar && aAnular != "R$ 0,00" && aSuplementar != "R$ 0,00" && instrumento != "" && numeroInstrumento != "" && (tipo_suplementacao1 != "" || tipo_suplementacao2 != "" || tipo_suplementacao3 != "") && data !== "undefined-ed-0" && sup_justificativa_vazio == false && sup_valor_vazio == false && sup_vinculo_vazio == false && anl_recurso_vazio == false && anl_valor_vazio == false && anl_vinculo_vazio == false)
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
			else if(anl_vinculo_vazio == true)
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
		}		
	}
		
	$(document).ready(function(){
		$(document).mousemove(function(event){
					
			var data = document.getElementById('data').value;
			var dia  = data.split("-")[0];
			var mes  = data.split("-")[1];
			var ano  = data.split("-")[2];
			data = ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-4);
			document.getElementById('sup_data2').value =document.getElementById('data').value;
			document.getElementById('anl_data2').value =document.getElementById('data').value;
			
			var instrumento = document.getElementById('instrumento').value;
			//alert(instrumento);
			document.getElementById('sup_instrumento2').value = instrumento;
			document.getElementById('anl_instrumento2').value = instrumento;
				
			var numeroInstrumento = document.getElementById('numeroInstrumento').value;
			var anoInstrumento = document.getElementById('anoInstrumento').value;
			
			if(numeroInstrumento == "" || anoInstrumento =="")
				{
					
				}
			else{
				document.getElementById('sup_numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
				document.getElementById('anl_numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
				document.getElementById('numeroInstrumento2').value = numeroInstrumento + "/" + anoInstrumento;
			}
			
			if(document.getElementById('instrumento2') != null)
			{
			document.getElementById('instrumento2').value = instrumento;
			}
			else{
			}

			if(document.getElementById('data2') != null)
			{
			document.getElementById('data2').value = data;
			}
			else{
			}

			if(document.getElementById('tipo_suplementacao1') != null && document.getElementById('tipo_suplementacao2') != null && document.getElementById('tipo_suplementacao3') != null)
			{
				if ($('#chk_anulacao').is(':checked')) {
				
					document.getElementById('tipo_suplementacao1').value = "Anulação";		
					//document.getElementById('tipo_anulacao').value = "ok";
					document.getElementById('cardAnulacao').style.display = "";
					
					
				}
				else{
					document.getElementById('tipo_suplementacao1').value = "";	
					//document.getElementById('tipo_anulacao').value = "";
					document.getElementById('cardAnulacao').style.display = "none";
				
				}
				
				if ($('#chk_superavit').is(':checked')) {
					
					document.getElementById('tipo_suplementacao2').value = "Superávit Financeiro";	
					//document.getElementById('tipo_superavit').value = "ok";
					document.getElementById('cardSuperavit').style.display = "";
				
				}
				else{
					document.getElementById('tipo_suplementacao2').value = "";	
					//document.getElementById('tipo_superavit').value = "";	
					document.getElementById('cardSuperavit').style.display = "none";
					
				}
				
				if ($('#chk_excesso').is(':checked')) {
					document.getElementById('tipo_suplementacao3').value = "Excesso de Arrecadação";
					//document.getElementById('tipo_excesso').value = "ok";
					document.getElementById('cardExcessoArrecadacao').style.display = "";
					
				}
				else{
					document.getElementById('tipo_suplementacao3').value = "";	
					//document.getElementById('tipo_excesso').value = "";
					document.getElementById('cardExcessoArrecadacao').style.display = "none";
					
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
			id = id.replace("rem_","");
			document.getElementById('tabela_'+id).deleteRow(indexTR);
			
		
			
			//atualizar tabelas superavit
			if(id == 'superavit')
			{
				var i = -1;
				$('#tabela_'+id+' > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","valor_spt-"+i)
				});
				var i = -1;
				$('#tabela_'+id+' > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","recurso_spt-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'2 > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","spt_valor-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'2 > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","spt_recuro-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'3 > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","spt_valor-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'3 > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","spt_reurso-"+i)
				});
			}
			//atualizar tabelas excesso
			else if(id == 'excesso')
			{
				var i = -1;
				$('#tabela_'+id+' > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","valor_exc-"+i)
				});
				var i = -1;
				$('#tabela_'+id+' > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","recurso_exc-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'2 > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","exc_valor-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'2 > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","exc_recuro-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'3 > tbody  > tr td:nth-child(4) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","exc_valor-"+i)
				});
				var i = -1;
				$('#tabela_'+id+'3 > tbody  > tr td:nth-child(5) > input').each(function() 
				{
					i=i+1;
					$(this).attr("id","exc_reurso-"+i)
				});
			}
			
			var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_spt_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_spt-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_spt-'+i).value;
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
							
							valor_spt_total = parseFloat(valor_temp) + valor_spt_total;
							document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_spt_total = 0.00;
				document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}

			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_exc_total = 0;
			var valor_temp = 0;
			if(qtdLinhas>0)
			{
				for(var i =0; i<qtdLinhas; i++)
				{	
					if (document.getElementById('valor_exc-'+i) == null)
					{	
						var e = jQuery.Event("keypress");
						e.which = 13; 
						e.keyCode = 13;
						
					}
					else{
						valor_temp = document.getElementById('valor_exc-'+i).value;
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
							
							valor_exc_total = parseFloat(valor_temp) + valor_exc_total;
							document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
						}
					}
					
				}
			}
			else{
				valor_exc_total = 0.00;
				document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			}
			
	} 
		
	
	
	function sup_atualizar_vinculo(x, y)
	{

		//verifica se esta sendo feita a inclusao de um vínculo inédito
		var indice = x.value.replace("adicionar_vinculo-", "");
		var controle = x.value;
		controle = controle.replace(/[0-9]/g, '');
		controle = controle.replace('-','');
		
		if(controle == "adicionar_vinculo")
		{
			document.getElementById('identificador').value = indice;
			$("#modalAdicionarVinculo").modal({
			show: true
			});
		}
		//se não atualiza com os existentes
		else{
			if(document.getElementById('sup_vinculo-['+y+']') != null)
			{
				document.getElementById('sup_vinculo-['+y+']').value = x.value;
			}
		}
	}

	function addVinculoNovo()
{
	var tesouro = document.getElementById("01.000.0000");
	var estado = document.getElementById("02.000.0000");
	var fundos = document.getElementById("03.000.0000");
	var indireta = document.getElementById("04.000.0000");
	var uniao = document.getElementById("05.000.0000");
	var outras = document.getElementById("06.000.0000");
	var credito = document.getElementById("07.000.0000");

	
	var identificador = document.getElementById('identificador').value;

	//var select = document.getElementById("sup_vinculo["+identificador+"]");
	
	var select = document.getElementById("vinculo_sup-"+identificador);
	var option = document.createElement("option");
	


  	if(tesouro.checked) {
		option.text = "01.000.0000";
		option.value = "01.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(estado.checked) {
		option.text = "02.000.0000";
		option.value = "02.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(fundos.checked) {
		option.text = "03.000.0000";
		option.value = "03.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(indireta.checked) {
		option.text = "04.000.0000";
		option.value = "04.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(uniao.checked) {
		option.text = "05.000.0000";
		option.value = "05.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(outras.checked) {
		option.text = "06.000.0000";
		option.value = "06.000.0000";
		select.add(option, select[1]);
  	} 
	else {
 	}

	if(credito.checked) {
		option.text = "07.000.0000";
		option.value = "07.000.0000";
		select.add(option, select[1]);
  	} 
	else {
	 }
	 
	 select.selectedIndex = "1";
}
	
	function sup_atualizar_justificativa(x, y)
	{
		document.getElementById('sup_justificativa-['+y+']').value = x.value;
	}
	
	function anl_atualizar_vinculo(x, y)
	{
		document.getElementById('anl_vinculo-['+y+']').value = x.value;
	}
	
	function anl_atualizar_recurso(x, y)
	{
		document.getElementById('anl_recurso-['+y+']').value = x.value;
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
			var valor_sup_total = 0;
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

						valor_sup_total = parseFloat(valor_temp) + valor_sup_total;
						document.getElementById("valor_sup_total").value = valor_sup_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
			
			
			
			document.getElementById('total').value = valor_total;
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			document.getElementById('total_suplementar').value = valor_total;
			document.getElementById('valor_sup_total').value = valor_total;

			document.getElementById('sup_valor-['+y+']').value = x.value;
	
			
	}
	
	function anl_atualizar_valor(x, y)
	{
		$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		var tabela_anular = $('#tabela_anular');
		var qtdLinhas = $("#tabela_anular tbody tr").length;
			
		var valor_total = 0;
		var valor_anl_total = 0;
		var valor_temp = 0;
		for(var i =0; i<qtdLinhas; i++)
		{		
			if (document.getElementById('valor_anl-'+i) == null)
			{	
				var e = jQuery.Event("keypress");
				e.which = 13; 
				e.keyCode = 13;
				$('#anl_codigo_dotacao').trigger(e);
			}
			else{	
				valor_temp = document.getElementById('valor_anl-'+i).value;
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
						
					valor_anl_total = parseFloat(valor_temp) + valor_anl_total;
					document.getElementById("valor_anl_total").value = valor_anl_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
				}
			}
		}
			
			
			var tabela_superavit = $('#tabela_superavit');
			var qtdLinhas = $("#tabela_superavit tbody tr").length;
			
			var valor_spt_total = 0;
			var valor_temp = 0;
			
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_spt-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; 
					e.keyCode = 13;
					
				}
				else{
					valor_temp = document.getElementById('valor_spt-'+i).value;
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

						valor_spt_total = parseFloat(valor_temp) + valor_spt_total;
						document.getElementById("valor_spt_total").value = valor_spt_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
			
			var tabela_excesso = $('#tabela_excesso');
			var qtdLinhas = $("#tabela_excesso tbody tr").length;
			
			var valor_temp = 0;
			var valor_exc_total = 0;
				
			for(var i =0; i<qtdLinhas; i++)
			{	
				if (document.getElementById('valor_exc-'+i) == null)
				{	
					var e = jQuery.Event("keypress");
					e.which = 13; 
					e.keyCode = 13;
					
					
				}
				else{
					valor_temp = document.getElementById('valor_exc-'+i).value;
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
						
						valor_exc_total = parseFloat(valor_temp) + valor_exc_total;
						document.getElementById("valor_exc_total").value = valor_exc_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
					}
				}
			}
					
			valor_total = valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			document.getElementById('total_anular').value = valor_total;
			
			
			if(document.getElementById('anl_valor-['+y+']') != null)
			{
				document.getElementById('anl_valor-['+y+']').value = x.value;
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
		else if(x == "anl_codigo_dotacao")
		{
			//alert('oi');
			if(document.getElementById("anl_codigo_dotacao") != null)
			{
				var valor = document.getElementById("anl_codigo_dotacao").value;
				if(valor != "")
				{
					document.getElementById("anular").disabled = false;
				}
				else{
					document.getElementById("anular").disabled = true;
				}
			}
		}	
		else if(x == "valor_spt" || x == "recurso_spt")
		{	
			if(document.getElementById("valor_spt") != null)
			{
				var valor = document.getElementById("valor_spt").value;
				var recurso = document.getElementById("recurso_spt").value;
				//alert(recurso);
				if(valor != "" && recurso != "")
				{
					document.getElementById("superavit").disabled = false;
				}
				else{
					document.getElementById("superavit").disabled = true;
				}
			}
		}	
		else if(x == "valor_exc" || x == "recurso_exc")
		{	//alert('oi');
			if(document.getElementById("valor_exc") != null)
			{
				var valor = document.getElementById("valor_exc").value;
				var recurso = document.getElementById("recurso_exc").value;
				//alert(recurso);
				if(valor != "" && recurso != "")
				{
					document.getElementById("excesso").disabled = false;
				}
				else{
					document.getElementById("excesso").disabled = true;
				}
			}
		}	

	}