<?php
							namespace SEO;

							use Illuminate\Database\Eloquent\Model;
							use Illuminate\Notifications\Notifiable;


							class SaldoDeDotacao.2020 extends Model
							{
								use Notifiable;
								protected $fillable = [
										'unidade_orcamentaria', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'codigo_dotacao', 'vinculo', 'dotacao', 'empenhado', 'saldo', 'reserva',
									];

							}