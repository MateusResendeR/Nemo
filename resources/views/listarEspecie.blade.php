<!doctype html>
@extends('layouts.principal')
@section('title','Listar Tanques')
@section('conteudo')
	<div>
		<form action="/adicionar/especie/{{$piscicultura_id}}" method="get" >
			<input type="submit" value="Nova Especie" />
		</form>
	</div>	

	<div>
		<table class="table">
			<tr>
				<th>Especies</th>
				<th>Ações</th>
			</tr>
			@foreach ($listaEspecies as $EspeciePeixe)
			<tr>
				<td><li>Nome: {{ $EspeciePeixe->nome}}<br>Tempo de desenvolvimento: {{ $EspeciePeixe->tempo_desenvolvimento}} meses<br>
    	 				  Tipo de ração: {{ $EspeciePeixe->tipo_racao}} <br/>Temperatura ideal da água: {{ $EspeciePeixe->temperatura_ideal_agua}} graus,
    	              Quantidade de peixes por volume: {{ $EspeciePeixe->quantidade_por_volume}}<br/></li></td>
				<td>
					<a href="/editar/tanque/{{$id}}/especie/{{$EspeciePeixe->id}}">Editar</a><br>
					<a href="/remover/tanque/{{$id}}/especie/{{$EspeciePeixe->id}}">Remover</a><br>
					<a href="/povoar/tanque/{{$id}}/especie/{{$EspeciePeixe->id}}">Adicionar ao tanque</a><br/>
				</td>
			</tr>
			@endforeach		
		</table>
	</div>
@stop
