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

<div class="container">

	<div class="title">
		<h1>Cartão do Idoso</h1>
		<h2>Preencha o formulário abaixo</h2>
		<p> Assim que o cartão estiver pronto, será feito contato para agendamento da retirada do cartão</p>
	</div>

	<form  action="../config/database/form-idoso-db.php" method="post" enctype="multipart/form-data" class="form animate__animated animate__fadeIn">
		
		<div class="input-group">
			<input type="text" id="nome" name="nome-idoso" required class="input"/>
			<label for="nome" class="label-input">Nome do Idoso</label>
		</div>
		
		<div class="input-group">
			<label for="nasc-idoso" class="label-date">Data de Nascimento</label>
			<input type="date" name="nascimento-idoso" required class="input-date">
		</div>
		
		<div class="input-group">
			<label for="genero" class="label-select">Sexo</label>
			<select name="genero-idoso" id="genero-idoso" required class="select">
				<option value="selecione">Selecione...</option>
				<?php foreach($array_generos as $generos){
					echo "<option value='$generos'>$generos</option>";
				};?>
			</select>
		</div>
		
		<div class="input-group">
			<input type="text" name="endereco-idoso" required class="input">
			<label for="endereco" class="label-input">Endereço(RUA, AV)</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="numero-endereco-idoso" required class="input">
			<label for="numero" class="label-input">Número</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="complemento-idoso" class="input">
			<label for="complemento" class="label-input">Complemento(opcional)</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="bairro-idoso" required class="input">
			<label for="bairro" class="label-input">Bairro</label>
		</div>

		<div class="input-group">
			<input type="text" name="cep-idoso" required class="input">
			<label for="cep" class="label-input">CEP</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="cidade-idoso" required class="input">
			<label for="cidade" class="label-input">Cidade</label>
		</div>
		
		<div class="input-group">
			<label for="uf" class="label-select">
				UF(Unidade Federal)
			</label>
			<select name="uf-idoso" class="select" required>
				<option value="selecione">Selecione...</option>
				<?php foreach($estados as $uf){
					echo "<option value='$uf'>$uf</option>";
				}?>
			</select>
		</div>
		
		<div class="input-group">
			<input type="text" name="telefone-idoso" required class="input">
			<label for="telefone" class="label-input">Telefone</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="rg-idoso" required class="input">
			<label for="rg" class="label-input">RG</label>
		</div>

		<div class="input-group">
			<label for="data-expedicao" class="label-date">Data de Expedição</label>
			<input type="date" name="data-expedicao-idoso" required class="input-date">
		</div>
		
		<div class="input-group">
			<input type="text" name="expedido-idoso" required class="input">
			<label for="expedido-por" class="label-input">Expedido por</label>
		</div>
		
		<div class="input-group">
			<input type="text" name="cnh-idoso" class="input">
			<label for="cnh" class="label-input">CNH(Se for condutor)</label>
		</div>
		
		<div class="input-group">
			<label for="validade-cnh" class="label-date">Validade da CNH</label>
			<input type="date" name="validade-cnh-idoso" class="input-date">
		</div>
		
		<div class="input-group">
			<input type="text" name="email-idoso" class="input">
			<label for="email" class="label-input">Digite seu email(opcional)</label>
		</div>
		
		<div class="input-group">
			
			<div class="radio-input">
				
				<p>Representante: </p>
				
				<input type="radio" name="representante" class="input-radio" id="sim">
				<label for="sim">
					<span class="custom-radio"></span> Sim
				</label>
				
				<input type="radio" name="representante" class="input-radio" id="nao" checked>
				<label for="nao">
							<span class="custom-radio"></span> Não
					</label>
					
				</div>

		</div>

		<div class="input-group">			
			
			<div class="input-file-container">
				
				<div class="input-file">
					<input type="file" name="copia-rg-idoso" id="file-input" required placeholder="Cópia do RG" class="file" accept="image/*">
					<label for="copia-rg-idoso">Selecione(JPG, PNG ou PDF) a cópia do RG do idoso ou documento equivalente <strong>(OBRIGATÓRIO)</strong></label>
					<span id="file-name"></span>						
				</div>
								
			</div>
			
		</div>
		
		<div id="representante" class="animate__animated animate__fadeIn">
			
				<h1>Informações do Representante</h1>
				
					<div class="input-group" id="representante">
						<input type="text" name="nome-representante" class="input" />
						<label for="nome-representante" class="label-input">Nome do representante</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="email-representante" class="input" />
						<label for="email-representante" class="label-input">Email</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="endereco-representante" class="input" />
						<label for="endereco-representante" class="label-input">Endereço(RUA, AV)</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="numero-endereco-representante" class="input" />
						<label for="numero-representante" class="label-input">Nº</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="complemento-representante" class="input" />
						<label for="complemento-representante" class="label-input">Complemento</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="bairro-representante" class="input" />
						<label for="bairro-representante" class="label-input">Bairro</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="cep-representante" class="input">
						<label for="cep-representante" class="label-input">CEP</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="cidade-representante" class="input" />
						<label for="cidade-representante" class="label-input">Cidade</label>
					</div>
					
					<div class="input-group">
						<label for="uf-representante" class="label-select">
							UF(Unidade Federal)
						</label>
						<select name="uf-representante" class="select">
							<option value="" >Selecione...</option>
							<?php foreach($estados as $uf){
								echo "<option value='$uf'>$uf</option>";
							}?>
						</select>
					</div>

					<div class="input-group" id="representante">
						<input type="text" name="telefone-representante" class="input" />
						<label for="telefone-representante" class="label-input">Telefone</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="rg-representante" class="input">
						<label for="rg-representante" class="label-input">RG</label>
					</div>
					
					<div class="input-group" id="representante">
						<label for="" class="label-date">Data de Expedição</label>
						<input type="date" name="expedicao-representante" id="" class="input-date">
					</div>
					
					<div class="input-group">
						<input type="text" name="expedido-representante" class="input">
						<label for="expedido-por" class="label-input">Expedido por</label>
					</div>
					
					<div class="input-group" id="representante">
						<div class="input-file-container">

							<div class="input-file">
								<input type="file" name="copia-rg-representante" id="file-input" class="file" accept="image/*">
								<label for="copia-rg-representante">Selecione(JPG, PNG ou PDF)  a cópia do RG do representante ou documento equivalente <strong>(OBRIGATÓRIO)</strong></label>
								<span id="file-name"></span>						
							</div>
														
						</div>
					</div>
					
					<div class="input-group" id="representante">
						<div class="input-file-container">
							
							<div class="input-file">
								<input type="file" name="comprovante-representante" id="file-input" class="file" accept="image/*">
								<label for="">Selecione(JPG, PNG ou PDF) o comprovante de representante legal <strong>(OBRIGATÓRIO)</strong></label>
								<span id="file-name"></span>						
							</div>
							
						</div>
					</div>
					
				</div>

				<div class="buttons">
					<button type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
					<button type="submit">
						Enviar <i class="fas fa-paper-plane"></i>
					</button>
				</div>
				
			</div>			

		</form>
		
</div>

<div class="title">
	<p>Núcleo de Trânsito - Tel.:(19)3572-5310 - Email: nucleodetransito@leme.sp.gov.br</p>
	<p>R. Dr. Armando Sales de Oliveira, nº925 - CEP 13610-220 - Leme/SP</p>
	<p>Horário de atendimento: Das 8:00h ás 12:00h e das 13:00 às 16:00h</p>
</div>

<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>