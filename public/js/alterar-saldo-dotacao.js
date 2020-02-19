
var dotacao ='';
var empenhado = '';
var reserva = '';
var saldo = '';

var dotacao_anterior = '';
var	empenhado_anterior = '';
var	reserva_anterior = '';
var	saldo_anterior = '';

function alterar(x)
{
	dotacao_anterior = document.getElementById('dotacao-'+x).value;
	empenhado_anterior = document.getElementById('empenhado-'+x).value;
	reserva_anterior = document.getElementById('reserva-'+x).value;
	saldo_anterior = document.getElementById('saldo-'+x).value;

	document.getElementById('dotacao-'+x).disabled = false;
	document.getElementById('dotacao-'+x).style.background = "#fff";
	document.getElementById('dotacao-'+x).style.textAlign = "center";
	document.getElementById('dotacao-'+x).style.removeProperty('border');

	document.getElementById('empenhado-'+x).disabled = false;
	document.getElementById('empenhado-'+x).style.background = "#fff";
	document.getElementById('empenhado-'+x).style.textAlign = "center";
	document.getElementById('empenhado-'+x).style.removeProperty('border');
	
	document.getElementById('reserva-'+x).disabled = false;
	document.getElementById('reserva-'+x).style.background = "#fff";
	document.getElementById('reserva-'+x).style.textAlign = "center";
	document.getElementById('reserva-'+x).style.removeProperty('border');
	
	document.getElementById('codigo_vinculo-'+x).disabled = false;
	document.getElementById('codigo_dotacao-'+x).disabled = false;
	document.getElementById('salvar-'+x).style.removeProperty('display');
	document.getElementById('cancelar-'+x).style.removeProperty('display');
	document.getElementById('alterar-'+x).style.display = "none";
}

function cancelar(x)
{
	document.getElementById('dotacao-'+x).value = dotacao_anterior;
	document.getElementById('empenhado-'+x).value = empenhado_anterior;
	document.getElementById('reserva-'+x).value = reserva_anterior;
	document.getElementById('saldo-'+x).value = saldo_anterior;
	
	document.getElementById('dotacao-'+x).disabled = true;
	document.getElementById('dotacao-'+x).style.background = "none";
	document.getElementById('dotacao-'+x).style.textAlign = "right";
	document.getElementById('dotacao-'+x).style.border = "none";

	document.getElementById('empenhado-'+x).disabled = true;
	document.getElementById('empenhado-'+x).style.background = "none";
	document.getElementById('empenhado-'+x).style.textAlign = "right";
	document.getElementById('empenhado-'+x).style.border = "none";
	
	document.getElementById('reserva-'+x).disabled = true;
	document.getElementById('reserva-'+x).style.background = "none";
	document.getElementById('reserva-'+x).style.textAlign = "right";
	document.getElementById('reserva-'+x).style.border = "none";

	document.getElementById('saldo-'+x).disabled = true;
	document.getElementById('saldo-'+x).style.background = "none";
	document.getElementById('saldo-'+x).style.textAlign = "right";
	document.getElementById('saldo-'+x).style.border = "none";
	
	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');
}

function salvar(x)
{
	saldo = document.getElementById('saldo-'+x).value;
	saldo = saldo.replace("R$", "");
	
	if (saldo.includes("-") == true)
	{
		
		$("#modalSaldoNegativo").modal({
		show: true
		});
		
	}
	else
	{
	document.getElementById('dotacao-'+x).readOnly = true;
	document.getElementById('dotacao-'+x).style.background = "none";
	document.getElementById('dotacao-'+x).style.textAlign = "right";
	document.getElementById('dotacao-'+x).style.border = "none";


	document.getElementById('empenhado-'+x).readOnly = true;
	document.getElementById('empenhado-'+x).style.background = "none";
	document.getElementById('empenhado-'+x).style.textAlign = "right";
	document.getElementById('empenhado-'+x).style.border = "none";

	
	document.getElementById('reserva-'+x).readOnly = true;
	document.getElementById('reserva-'+x).style.background = "none";
	document.getElementById('reserva-'+x).style.textAlign = "right";
	document.getElementById('reserva-'+x).style.border = "none";


	document.getElementById('saldo-'+x).readOnly = true;
	document.getElementById('saldo-'+x).style.background = "none";
	document.getElementById('saldo-'+x).style.textAlign = "right";
	document.getElementById('saldo-'+x).style.border = "none";

	
	document.getElementById('dotacao-'+x).value = dotacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('empenhado-'+x).value = empenhado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('reserva-'+x).value = reserva.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('saldo-'+x).value = saldo.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	
	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');
	
	document.getElementById('atualizar').style.display = '';
	
	}
}