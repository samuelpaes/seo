<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/formularios_orcamento/credito_adicional_suplementar.js') }}"type="text/javascript"></script>
@extends('layouts.app')

@section('content')    
<style>
    @media (min-width: 992px) {
    .col-md-center {
        margin-left: auto;
        margin-right: auto;
    }
    }

    .outer {
    position: relative;
    margin: auto;
    width: 15px;
    margin-top: 0px;
    cursor: pointer;

    }

    .inner {
    width: inherit;
    text-align: center;
    }

    .label_remove { 
    font-size: .7em; 
    line-height: 3em;
    text-transform: uppercase;
    color: #000;
    transition: all .3s ease-in;
    opacity: 0;
    cursor: pointer;
    left:-42px;
    top:2px;
    }

    .inner:before, .inner:after {
    position: absolute;
    content: '';
    height: 1px;
    width: inherit;
    background: #000;
    left: 0;
    transition: all .3s ease-in;
    }

    .inner:before {
    top: 50%; 
    transform: rotate(45deg);  
    }

    .inner:after {  
    bottom: 50%;
    transform: rotate(-45deg);  
    }

    .outer:hover label {
    opacity: 1;
    }

    .outer:hover .inner:before,
    .outer:hover .inner:after {
    transform: rotate(0);
    }

    .outer:hover .inner:before {
    top: 0;
    }

    .outer:hover .inner:after {
    bottom: 0;
    }

/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width: auto; 
  height:15px;
  font-weight:normal;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  border-radius: 3px;
  position: absolute;
  top: 10;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #49cfed;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #49cfed;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 5px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style=" text-align:center"><b>CRÉDITO ADICIONAL SUPLEMENTAR</b></h4>
                                <div style="text-align:center">{{ $secretaria}}</div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="formulario_credito_adicional_suplementar" onmouseover="atualizarFormulario()" onwheel="atualizarFormulario()">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">    

                              
                                <div class="col-md-4 text-left">        
                                    <label style="padding:0px; margin:0px; width: auto; font-weight:normal">DATA DA SOLICITAÇÃO:</label>
                                    <input type="date" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="data" value="{{$data}}" class="form-control" id="data" style="display: inline-block; width:auto"></input>
                                </div>
                                <div class="col-md-4 text-right"></div>      
                                <div class="col-md-4 text-right">
                                    <label style=" padding:0px; margin:0px; display: inline-block; width: auto; font-weight:normal">PROCESSO:</label>
                                    <input class="form-control"  name="instrumento" id="instrumento" value="PROCESSO" type="hidden"></input>
                                    <input value="{{$numeroInstrumento[0]}}" type="number" id="numeroInstrumento" class="form-control" style="display: inline-block; width:150px;" ></input>
                                    /
                                    <select class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="anoInstrumento" id="anoInstrumento" style="display: inline-block; width:auto">
                                    
                                        
                                        
                                        <!--<option value="2019" <?php
if ($numeroInstrumento[1] == '2019')
    echo ' selected="selected"';
?> >2019</option>
                                        <option value="2018" <?php
if ($numeroInstrumento[1] == '2018')
    echo ' selected="selected"';
?> >2018</option>        
                                        <option value="2017" <?php
if ($numeroInstrumento[1] == '2017')
    echo ' selected="selected"';
?> >2017</option>-->
                                                            
                                    </select>
                                </div>        
                               <!-- <div class="col-md-4">
                                    <label  style="padding:0px; margin:0px; width: auto; font-weight:normal">INSTRUMENTO ADMINISTRATIVO:</label>
                                    <select  class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="instrumento" id="instrumento" style="display: inline-block; width:auto">
                                        <option selected></option>
                                        <option value="PROCESSO" <?php
if ($tipoInstrumento == 'PROCESSO')
    echo ' selected="selected"';
?> >PROCESSO</option>
                                        <option value="MEMORANDO"<?php
if ($tipoInstrumento == 'MEMORANDO')
    echo ' selected="selected"';
?> >MEMORANDO</option>                    
                                    </select>
                                </div>-->

                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row flex-nowrap">
                            
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-10">
                                
                                    <div class="col-lg-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
                                        <label class="container">Anulação
                                            <input type="checkbox" onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" value="Anulação" name="anulacao" id="chk_anulacao" style="display: inline-block;width:auto"
                                            <?php if ($anulacao === true) echo 'checked="checked"';?> />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
    
                                    <div class="col-lg-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
                                        <label class="container" style="text-align:left">Superávit Financeiro
                                            <input type="checkbox" onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" value="Superávit Financeiro" name="superavit" id="chk_superavit" style="display: inline-block;width:auto" 
                                            <?php if ($superavit === true)  echo 'checked="checked"';?> />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                
                                    <div class="col-lg-4">
                                        <label class="container" >Excesso de Arrecadação
                                            <input type="checkbox" onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" value="Excesso de Arrecadação" name="excesso" id="chk_excesso" style="display: inline-block;width:auto" 
                                            <?php if ($excesso === true) echo 'checked="checked"';?> />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                        </div>
                        <br>
                        <form method="get" action="{{route('orcamento_show')}}">
                            <div class="card" style="box-shadow: 2px 2px 5px #888888;">
                                <div style="display:none">
                                    <!--Superávit-->
                                    <table id="tabela_superavit3">
                                        <tr style="height:auto;">
                                        
                                        </tr>
                                    </table>
                                
                                
                                    <!--Excesso-->
                                    <table id="tabela_excesso3">
                                        <tr style="height:auto;">
                                        
                                        </tr>
                                    </table>
                                </div>
                                
                                
                                <input name="data" class="form-control" id="sup_data2" type="hidden"></input>
                                <input name="tipoInstrumento" class="form-control" id="sup_instrumento2" value="PROCESSO" type="hidden"></input>
                                <input name="numeroInstrumento" class="form-control" id="sup_numeroInstrumento2" type="hidden"></input>
                                <input name="tipo_anulacao" class="form-control" id="sup_tipo_anulacao" type="hidden"></input>
                                <input name="tipo_superavit" class="form-control" id="sup_tipo_superavit" type="hidden"></input>
                                <input name="tipo_excesso" class="form-control" id="sup_tipo_excesso" type="hidden"></input>
                                <input name="formulario" class="form-control" value="credito_adicional_suplementar" type="hidden"></input>
                                
                                <input name="unidade_orcamentaria" value="{{ Auth::user()->secretaria }}" id="unidade_orcamentaria" type="hidden"></input>
                                
                                
                                <div class="header">
                                    <h5 style="text-align:center" ><b>SUPLEMENTAÇÃO</b></h5>
                                </div>
                                <input id="identificador" class="form-control" value="" type="hidden"></input>
                                <div class="content">
                                    <div class="row flex-nowrap">
                                        
                                        <div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
                                            <span class="pull-center">
                                                <label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
                                                <input class="form-control" type="number" onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)"min="0" name="sup_codigo_dotacao[]" id="sup_codigo_dotacao" style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="R$ 0,00" name="sup_valor[]" style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="" name="sup_justificativa[]" style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="" name="sup_vinculo[]" style="display: inline-block; width:80px;"></input>
                                                <button value="suplementar" id="suplementar" align="center" name="acao" type="submit" class="btn btn-info btn-fill"   disabled>+</button>
                                            </span>
                                        </div>

                                    
                                        
                                        <div class="content table-responsive table-full-width" style="font-size:12px; align:center">
                                            <table class="table table-hover table-striped" id="tabela_suplementar" name="tabela_suplementar" style="font-size:98%; width:100%; display:block; overflow:auto;">
                                                <thead>
                                                    <tr style="height:100px">
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    @if ($mensagem <> "" and !empty($dotacoes_suplementacao))
                                                    <?php $i = 0;?>
                                                   @foreach($dotacoes_suplementacao as $dotacao)
                                                            
                                                    <tr style="height:80%;">
                                                        <td style="align:center;"><input name="sup_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
                                                        <td style="align:center;"><input name="sup_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;' id="classificacao_sup-{{$i}}">{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
                                                        <td style="align:center;"><input name="sup_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;' id="natureza_sup-{{$i}}">{{$dotacao['natureza_de_despesa']}}</div></input></td>
                                                        <input type="hidden" value="{{$i}}" name="sup_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
                                                        <td style="align:center;"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>    
                                                            <select class="form-control" name="sup_vinculo[{{$i}}]"  onclick="sup_atualizar_vinculo(this, {{$i}})"  onmouseout="sup_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="sup_atualizar_vinculo(this, {{$i}})" id="vinculo_sup-{{$i}}" onchange="incluirVinculoNovo(this, this)" style="width:auto; height:auto;position:relative; top:-5px; ">
                                                                <option selected></option>    
                                                                @foreach($dotacoes_suplementacao_vinculos as $j => $value)
                                                                    @foreach($value as $vinculo)
                                                                        @if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
                                                                            <option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"';?>>{{$vinculo['vinculo']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                                <option value="adicionar_vinculo-{{$i}}" >ADICIONAR +</option>
                                                            </select>
                                                        </td>
                                                        <td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='sup_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
                                                        <td style="align:center;"><input name="sup_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="sup_atualizar_valor(this, {{$i}})" onkeydown="sup_atualizar_valor(this, {{$i}})" onkeyup="sup_atualizar_valor(this, {{$i}})" onclick="sup_atualizar_valor(this, {{$i}})" onmouseout="sup_atualizar_valor(this, {{$i}})"  onmouseover="sup_atualizar_valor(this, {{$i}})" id="valor_sup-{{$i}}" class="form-control"></input></td>
                                                        <td style="align:center;"><textarea name='sup_justificativa[{{$i}}]' onkeyup="sup_atualizar_justificativa(this, {{$i}})"  onclick="sup_atualizar_justificativa(this, {{$i}})" onmouseout="sup_atualizar_justificativa(this, {{$i}})" onmouseover="sup_atualizar_justificativa(this, {{$i}})" class="form-control" id="justificativa_sup-{{$i}}" style="width:100%; height:40px; text-transform: uppercase;">{{$dotacao['justificativa']}}</textarea></td>
                                                        <td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_suplementar" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
                                                        <td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
                                                    </tr>
                                                    <?php 
                                                        $total_suplementar = $dotacao['dotacao'] + $total_suplementar; 
                                                        $i++;
                                                    ?>
                                                    @endforeach
                                                    <?php
                                                        $total_suplementar = 'R$ ' . number_format($total_suplementar, 2, ',', '.')
                                                    ?>
                                                   @endif
                                                        
                                                    <tr style="display : table-row;" height="10">
                                                        <td colspan="6"></td>
                                                        <td colspan="2"></td>
                                                    </tr>    
                                                </tbody>
                                            </table>  
                                        </div>
                                        <div class="footer">
                                            <hr>
                                            <div class="legend">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b><input id="valor_sup_total" class="form-control" style='font-size:12px; position:relative; top:4px;  padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                               </div>
                                        </div>    
                                    </div>
                                </div>            
                            </div>
                                
                            <div class="card" id="cardAnulacao" style="box-shadow: 2px 2px 5px #888888; display:none">
                                
                                
                                <input name="data" class="form-control" id="anl_data2" type="hidden"></input>
                                <input name="tipoInstrumento" class="form-control" id="anl_instrumento2" type="hidden" value="PROCESSO"></input>
                                <input name="numeroInstrumento" class="form-control" id="anl_numeroInstrumento2" type="hidden"></input>
                                
                                <input name="tipo_anulacao" class="form-control" id="anl_tipo_anulacao" type="hidden"></input>
                                <input name="tipo_superavit" class="form-control" id="anl_tipo_superavit" type="hidden"></input>
                                <input name="tipo_excesso" class="form-control" id="anl_tipo_excesso" type="hidden"></input>
                                
                                
                                
                                <div class="header">
                                    <h5 style="text-align:center" ><b>ANULAÇÃO</b></h5>
                                </div>
                                
                                <div class="content">
                                    <div class="row flex-nowrap">
                                        <div class="col-md-5">
                                        </div>
                                        
                                        <div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
                                            <span>
                                                <label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
                                                <input class="form-control"  onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)" min="0" type="number" name="anl_codigo_dotacao[]" id="anl_codigo_dotacao"style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="R$ 0,00" name="anl_valor[]" style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="" name="anl_recurso[]" style="display: inline-block; width:80px;"></input>
                                                <input class="form-control" type="hidden" placeholder="" name="anl_vinculo[]" style="display: inline-block; width:80px;"></input>
                                                <button value="anular" id="anular" align="left" name="acao" type="submit" class="btn btn-info btn-fill" disabled>+</button>
                                            </span>
                                        </div>
                                        <div class="col-md-5">
                                        </div>
                                            
                                        <div class="content table-responsive table-full-width" style="font-size:12px; align:center">
                                            <table class="table table-hover table-striped" id="tabela_anular" name="tabela_anular" style="font-size:98%; width:100%; display:block; overflow:auto;">
                                                <thead>
                                                    <tr style="height:100px">
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
                                                        <th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($mensagem <> "" and !empty($dotacoes_anulacao))
                                                    <?php
$i = 0;
?>
                                                   @foreach($dotacoes_anulacao as $dotacao)
                                                        
                                                    <tr style="height:80%;">
                                                        <td style="align:center;"><input name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
                                                        <td style="align:center;"><input name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;' id="classificacao_anl-{{$i}}">{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
                                                        <td style="align:center;"><input name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;' id="natureza_anl-{{$i}}">{{$dotacao['natureza_de_despesa']}}</div></input></td>
                                                        <input type="hidden" value="{{$i}}" name="anl_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
                                                        <td style="align:center;"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>    
                                                            <select class="form-control" name="anl_vinculo[{{$i}}]" onclick="anl_atualizar_vinculo(this, {{$i}})"  onmouseout="anl_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="anl_atualizar_vinculo(this, {{$i}})" id="vinculo_anl-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
                                                                <option selected></option>    
                                                                @foreach($dotacoes_anulacao_vinculos as $j => $value)
                                                                    @foreach($value as $vinculo)
                                                                        @if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
                                                                            <option value="{{$vinculo['vinculo']}}" <?php
if ($dotacao['vinculo'] == $vinculo['vinculo'])
    echo ' selected="selected"';
?>>{{$vinculo['vinculo']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
                                                        <td style="align:center;"><input name="anl_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_anl-{{$i}}" class="form-control"></input></td>
                                                        <td style="align:center;"><textarea name='anl_recurso[{{$i}}]' onkeypress="anl_atualizar_recurso(this, {{$i}})" onkeydown="anl_atualizar_recurso(this, {{$i}})" onkeyup="anl_atualizar_recurso(this, {{$i}})"  onclick="anl_atualizar_recurso(this, {{$i}})" onmouseout="anl_atualizar_recurso(this, {{$i}})" onmouseover="anl_atualizar_recurso(this, {{$i}})" id="recurso_anl-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
                                                        <td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_anular" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
                                                        <td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
                                                    </tr>
                                                    <?php
$total_anular = $dotacao['dotacao'] + $total_anular;
$i++;
?>
                                                   
                                                    @endforeach
                                                    <?php
$total_anular = 'R$ ' . number_format($total_anular, 2, ',', '.')?>
                                                   @endif
                                                    
                                                    <tr style="display : table-row;" height="10">
                                                        <td colspan="6"></td>
                                                        <td colspan="2"></td>
                                                    </tr>    
                                                </tbody>
                                            </table>  
                                        </div>
                                        <div class="footer">
                                            <hr>
                                            <div class="legend">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b><input id="valor_anl_total" class="form-control" style='font-size:12px; position:relative; top:4px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                               </div>
                                        </div>
                                    </div>
                                </div>            
                            </div>
                            
                            <div class="card" id="cardSuperavit" style="box-shadow: 2px 2px 5px #888888; display:none">
                                
                                <div class="header">
                                    <h5 style="text-align:center" ><b>SUPERÁVIT FINANCEIRO</b></h5>
                                </div>
                                <?php
$i = 0;
?>
                               <div class="content" >
                                    <div class="row flex-nowrap" >
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
                                            <span class="pull-center">
                                                <label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
                                                <input class="form-control"  onchange="ativarBotao(id)" placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_spt" style="display: inline-block; width:150px;"></input>
                                                <label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
                                                <input class="form-control" style="display: inline-block; width:450px; text-transform: uppercase;" onkeypress="ativarBotao(id)" onchange="ativarBotao(id)" id="recurso_spt"></input>
                                                <button value="superavit" type="button" onclick="addItemSuperavit()" id="superavit" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right" disabled>+</button>
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                </div>
                                <?php
$i++;
?>
                               
                                <div class="content table-responsive table-full-width" style=" font-size:12px;" >
                                    <table class="table table-hover table-striped" id="tabela_superavit" name="tabela_superavit" style='font-size:98%'>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
                                                <th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @if(!empty($superavit_valor_recurso))
                                            <?php
$i = 0;
?>
                                           @for($a = 0; $a < count($superavit_valor_recurso['valor']); $a++)                                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width:100px"><input value="{{$superavit_valor_recurso['valor'][$a]}}" id="valor_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['valor'][$a]}}</div></input></td>
                                                <td style="width:450px"><input value="{{$superavit_valor_recurso['recurso'][$a]}}" id="recurso_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['recurso'][$a]}}</div></input></td>
                                                <td style="width:20px"><button type="button" style="width:100%; color:#000" id="superavit" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
$i++;
?>
                                               
                                            @endfor
                                        @endif    
                                        </tbody>
                                    </table>  
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="legend">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <b><input id="valor_spt_total" class="form-control" style='font-size:12px; position:relative; top:4px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                
                            </div>
                            
                            <div class="card" id="cardExcessoArrecadacao" style="box-shadow: 2px 2px 5px #888888; display:none">
                                
                                <div class="header">
                                    <h5 style="text-align:center" ><b>EXCESSO DE ARRECADAÇÃO</b></h5>
                                </div>
                                <?php
$i = 0;
?>
                               <div class="content">
                                    <div class="row flex-nowrap">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
                                            <span class="pull-center">
                                                <label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
                                                <input class="form-control"  onchange="ativarBotao(id)" placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_exc" style="display: inline-block; width:150px;"></input>
                                                <label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
                                                <input class="form-control" style="display: inline-block; width:450px; text-transform: uppercase;" onkeypress="ativarBotao(id)" onchange="ativarBotao(id)" id="recurso_exc" ></input>
                                                <button value="excesso" type="button" onclick="addItemExcesso()" id="excesso" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right" disabled>+</button>
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                </div>
                                <?php
$i++;
?>
                               
                                <div class="content table-responsive table-full-width" style=" font-size:12px;" >
                                    <table class="table table-hover table-striped" id="tabela_excesso" name="tabela_excesso" style='font-size:98%'>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
                                                <th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($excesso_valor_recurso))
                                            <?php
$i = 0;
?>
                                           @for($a = 0; $a < count($excesso_valor_recurso['valor']); $a++)    
                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width:100px"><input value="{{$excesso_valor_recurso['valor'][$a]}}" id="valor_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['valor'][$a]}}</div></input></td>
                                                <td style="width:450px"><input value="{{$excesso_valor_recurso['recurso'][$a]}}" id="recurso_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['recurso'][$a]}}</div></input></td>
                                                <td style="width:20px"><button type="button" style="width:100%; color:#000" id="excesso" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
$i++;
?>
                                               
                                            @endfor
                                        @endif            
                                        </tbody>
                                    </table>  
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="legend">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
                                            </div>
                                            <div class="col-md-6">
                                                <b><input id="valor_exc_total" class="form-control" style='font-size:12px; position:relative; top:4px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>        
                        </form>
                        @if($mensagem <> '')
                        <form method="get" action="{{route('orcamento_criar_pdf')}}" target="_blank">
                        @csrf
                        @method('POST')    
                            <div class="row">
                        
                                <div class="col-md-4">
                                    <b>A Anular:</b>
                                    <input class="form-control" value="R$ 0,00" id="total_suplementar" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
                                </div>
                                <div class="col-md-4">
                                    <b>A Suplementar:</b>
                                    <input class="form-control" value="R$ 0,00" id="total_anular" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
                                </div>
                                <input class="form-control" value="R$ 0,00" name="total" id="total" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly type="hidden"></input>
                                <div class="col-md-4">
                                <!--Suplementação-->
                                
                                    <?php
$i = 0;
?>
                                       @foreach($dotacoes_suplementacao as $dotacao)
                                        <tr style="height:auto;">
                                            <td style="width:100px"><input name="sup_unidade_executora[{{$i}}]" class="form-control" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
                                            <td style="width:150px"><input name="sup_classificacao_funcional[{{$i}}]" class="form-control" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
                                            <td style="width:110px"><input name="sup_natureza_despesa[{{$i}}]" class="form-control" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
                                            <td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" class="form-control" name='sup_codigo_dotacao[]' type="hidden"></input></td>
                                            <td style="width:110px"><input class="form-control" name="sup_vinculo[{{$i}}]" class="form-control" id="sup_vinculo-[{{$i}}]" type="hidden"></input></td>
                                            <td style="width:200px"><input name="sup_justificativa[{{$i}}]" id='sup_justificativa-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
                                            <td style="width:200px"><input name="sup_valor[{{$i}}]" id='sup_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
                                            <td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
                                        </tr>
                                        <?php
$i++;
?>
                                       @endforeach
                                    
                                <!--Anulação-->
                                    <?php
$i = 0;
?>
                                   @foreach($dotacoes_anulacao as $dotacao)
                                        <tr style="height:auto;">
                                            <td style="width:100px"><input class="form-control" name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
                                            <td style="width:150px"><input class="form-control" name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
                                            <td style="width:110px"><input class="form-control" name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
                                            <td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' type="hidden"></input></td>
                                            <td style="width:110px"><input class="form-control" name="anl_vinculo[{{$i}}]" id="anl_vinculo-[{{$i}}]" type="hidden"></input></td>
                                            <td style="width:200"><input name="anl_recurso[{{$i}}]" id='anl_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
                                            <td style="width:200"><input name="anl_valor[{{$i}}]" id='anl_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
                                            <td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
                                        </tr>
                                    <?php
$i++;
?>
                                   @endforeach
                                
                                    <div>
                                        <!--Superávit-->
                                        <table id="tabela_superavit2" style="display:none">
                                            <tr style="height:auto;">
                                            </tr>
                                        </table>
                                
                                        <!--Excesso-->
                                        <table id="tabela_excesso2" style="display:none">
                                            <tr style="height:auto;">
                                            </tr>
                                        </table>
                                    </div>                            
                                    
                                    <input name="secretaria" value="{{ Auth::user()->secretaria }}" class="form-control" id="secretaria" type="hidden"></input>
                                    <input name="formulario_codigo" value="{{ $formulario_codigo }}" class="form-control" id="formulario_codigo" type="hidden"></input>
                                    <input name="tipo_alteracao" type="hidden" value="CRÉDITO ADICIONAL SUPLEMENTAR"></input>
                                    <input name="instrumento" class="form-control" id="instrumento2" type="hidden"  value="PROCESSO"></input>
                                    <input name="numeroInstrumento" class="form-control" id="numeroInstrumento2" type="hidden"></input>
                                    <input name="data" class="form-control" id="data2" type="hidden"></input>
                                    <input name="tipo_suplementacao1" class="form-control" id="tipo_suplementacao1" type="hidden"></input>
                                    <input name="tipo_suplementacao2" class="form-control" id="tipo_suplementacao2" type="hidden"></input>
                                    <input name="tipo_suplementacao3" class="form-control" id="tipo_suplementacao3" type="hidden"></input>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            <button type="submit" id="btnEnviar" style="display:none; background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-left"></button>    
                                            <button type="button" data-dismiss="modal" onclick="validarFormulario()" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Enviar</button>    
                                        </div>
									    <div class="col-md-1"></div>
									    <div class="col-md-2">
                                            <button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>                                    
                                        </div>
									    <div class="col-md-2"></div>
								    </div>
                                </div>
                            </div>    
                        </form>
                        @endif
                    </div>
                
                
                    @if ($mensagem_dotacao <> "")
                    <script>
                        $(document).ready(function()
                        {
                            $('#modalMensagemDotacao').modal({
                                show: true,
                            })
                        });
                    </script>
                    @endif
                                
                </div>
            </div>
                        
        </div>    
    </div>            
</div>
</div>
    </div>    
</div>

@endsection        
    
    
    
<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagemSemSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  class="modal fade">
    <div class="modal-dialog" role="document">
        
        <div class="alert alert-danger" style="border-radius: 5px; width:auto; white-space: nowrap;">
            <button type="button" aria-hidden="true" data-toggle="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b><input class="form-control" value="" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
    
    </div>
</div>

<!-- Modal Mensagem Dotação-->
<div class="modal"  id="modalMensagemDotacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  class="modal fade" >
    <div class="modal-dialog" role="document"  class="modal fade">
        
        <div class="alert alert-danger" style="border-radius: 5px; width:auto;">
            <button type="button" aria-hidden="true" data-toggle="modal"  data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem_dotacao}} </span>
         </div>
    
    </div>
</div>

<!-- ADICIONAR VÍNCULO -->
<div id="modalAdicionarVinculo" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Adicionar Vínculo</h5>
            </div>
                        
            <div class="modal-body">            
                <label class="container">01.000.0000 - TESOURO
                    <input type="checkbox" id="01.000.0000">
                    <span class="checkmark"></span>
                </label>
                <label class="container">02.000.0000 - ESTADO
                    <input type="checkbox" id="02.000.0000">
                    <span class="checkmark"></span>
                </label>
                    <label class="container">03.000.0000 - FUNDOS ESPECIAIS DE DESPESAS
                    <input type="checkbox" id="03.000.0000">
                <span class="checkmark"></span>
                </label>
                <label class="container">04.000.0000 - ADMINISTRAÇÃO INDIRETA
                    <input type="checkbox" id="04.000.0000">
                    <span class="checkmark"></span>
                </label>
                <label class="container">05.000.0000 - UNIÃO
                    <input type="checkbox" id="05.000.0000">
                    <span class="checkmark"></span>
                </label>
                <label class="container">06.000.0000 - OUTRAS
                    <input type="checkbox" id="06.000.0000">
                    <span class="checkmark"></span>
                </label>
                <label class="container">07.000.0000 - OPERAÇÃO DE CRÉDITO
                    <input type="checkbox" id="07.000.0000">
                    <span class="checkmark"></span>
                </label>
            </div>
                    
            <div class="modal-footer">    
            <button type="button" data-dismiss="modal" onclick="addVinculoNovo()" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Adicionar</button>    
            </div>
        
        </div>
        
    </div>
</div>

<script>
                    $(document).ready(function()
                    {
                                            
                        var foco = <?php
echo json_encode($acao);
?>;
                        
                        if(foco == 'suplementar'){
                            //$("#sup_codigo_dotacao").focus();
                            document.getElementById('cardSuplementacao').style.display = "";
                            document.getElementById("sup_codigo_dotacao").focus({preventScroll:false});
                        }
                        else if(foco == 'anular')
                        {
                            //$("#anl_codigo_dotacao").focus();
                            document.getElementById('cardAnulacao').style.display = "";
                            document.getElementById("anl_codigo_dotacao").focus({preventScroll:false});
                        }
                        //alert(foco);
                    });

document.addEventListener('DOMContentLoaded', function() 
    {
        var exercicio = new Date().getFullYear()
        
        
        var i;
        var j = 0;
        for (i = exercicio+1; i > (exercicio-3); i--) 
        {
            var select = document.getElementById("anoInstrumento");
            var option = document.createElement("option");
            j = j+1;
            option.text = i;
            option.value = i;
            select.add(option, select[j]);
            select.selectedIndex = "1";
        }
    }, false);
</script>
</script>