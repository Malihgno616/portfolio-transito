<?php 
  
$estados = array(
	'AC' => 'Acre',
	'AL' => 'Alagoas',
	'AP' => 'Amapá',
	'AM' => 'Amazonas',
	'BA' => 'Bahia',
	'CE' => 'Ceará',
	'DF' => 'Distrito Federal',
	'ES' => 'Espirito Santo',
	'GO' => 'Goiás',
	'MA' => 'Maranhão',
	'MS' => 'Mato Grosso do Sul',
	'MT' => 'Mato Grosso',
	'MG' => 'Minas Gerais',
	'PA' => 'Pará',
	'PB' => 'Paraíba',
	'PR' => 'Paraná',
	'PE' => 'Pernambuco',
	'PI' => 'Piauí',
	'RJ' => 'Rio de Janeiro',
	'RN' => 'Rio Grande do Norte',
	'RS' => 'Rio Grande do Sul',
	'RO' => 'Rondônia',
	'RR' => 'Roraima',
	'SC' => 'Santa Catarina',
	'SP' => 'São Paulo',
	'SE' => 'Sergipe',
	'TO' => 'Tocantins',
);

$array_generos = [
  "Masculino",
  "Feminino",
];

?>
<div class="title">
	<h1>Cartão do Idoso</h1>
	<p>Preencha o formulário abaixo</p>
	<p> Assim que o cartão estiver pronto, será feito contato para agendamento da retirada do cartão</p>
</div>

<div class="container">

	<form class="form animate__animated animate__fadeIn">


		<div class="input-group">
			<input type="text" id="nome" name="nome" required class="input"/>
			<label for="nome" id="label-input">Nome do Idoso</label>
		</div>
		
		<div class="input-group">
			<input type="date" name="nasc-idoso" required class="input-date">
			<label for="nasc-idoso" id="label-input">Data de Nascimento</label>
		</div>
		
		<div class="input-group">
			<select name="sexo" id="genero" required class="select">
				<option value="selecione">Selecione...</option>
				<?php foreach($array_generos as $generos){
					echo "<option value='$generos'>$generos</option>";
				};?>
			</select>
			<label for="genero" id="label-input">Sexo</label>
		</div>
	
		<div class="input-group">
			<input type="text" name="cep" required class="input">
			<label for="cep" id="label-input">CEP</label>
		</div>

		<div class="input-group">
			<input type="text" name="endereco" required class="input">
			<label for="endereco" id="label-input">Endereço(RUA, AV)</label>
		</div>

		<div class="input-group">
			<input type="text" name="complemento" class="input">
			<label for="complemento" id="label-input">Complemento(opcional)</label>
		</div>

		<div class="input-group">
			<input type="text" name="bairro" required class="input">
			<label for="bairro" id="label-input">Bairro</label>
		</div>

		<div class="input-group">
			<input type="text" name="numero" required class="input">
			<label for="numero" id="label-input">Número</label>
		</div>

		<div class="input-group">
			<input type="text" name="cidade" required class="input">
			<label for="cidade" id="label-input">Cidade</label>
		</div>

		<div class="input-group">
			<select name="uf" class="select">
				<option value="selecione">Selecione...</option>
				<?php foreach($estados as $uf){
					echo "<option value='$uf'>$uf</option>";
				}?>
			</select>
			<label for="uf" id="label-input">
				UF(Unidade Federal)
			</label>
		</div>

		<div class="input-group">
			<input type="text" name="telefone" required class="input">
			<label for="telefone" id="label-input">Telefone</label>
		</div>

		<div class="input-group">
			<input type="text" name="rg" required class="input">
			<label for="rg" id="label-input">RG</label>
		</div>

		<div class="input-group">
				<input type="date" name="data-expedicao" required class="input-date">
				<label for="data-expedicao" id="label-input">Data de Expedição</label>
		</div>

		<div class="input-group">
			<input type="text" name="expedido-por" required class="input">
			<label for="expedido-por" id="label-input">Expedido por</label>
		</div>

		<div class="input-group">
			<input type="text" name="cnh" class="input">
			<label for="cnh" id="label-input">CNH(Se for condutor)</label>
		</div>

		<div class="input-group">
			<input type="date" name="validade-cnh" class="input-date">
			<label for="validade-cnh" id="label-input">Validade da CNH</label>
		</div>

		<div class="input-group">
			<input type="text" name="email" class="input">
			<label for="email" id="label-input">Digite seu email(opcional)</label>
		</div>

		<div class="input-group">
			<label>Possui representante?</label>
			<br>
			<input type="radio" name="representante" class="input-radio">
			<label for="sim">Sim</label>
			<input type="radio" name="representante" class="input-radio" checked>
			<label for="nao">Não</label>
		</div>

	</form>

</div>
