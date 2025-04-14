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
		<h2>Preencha o formulário abaixo</h2>
		<p> Assim que o cartão estiver pronto, será feito contato para agendamento da retirada do cartão</p>
	</div>

	<form class="grid grid-cols-3 gap-4 max-w-300 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn" action="../config/database/form-idoso-db.php" method="post" enctype="multipart/form-data">
		
		<div class="relative mb-5">
			<input type="text" name="nome" id="nome-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " />
			<label for="nome" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome do idoso</label>
		</div>
		
		<div class="relative mb-5">
			<input type="date" name="nascimento-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " >
			<label for="nasc-idoso" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data de Nascimento</label>
		</div>
		
		<div class="relative mb-5">
			<select name="genero-idoso" id="genero-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer">
				<option value="selecione">Selecione...</option>
				<?php foreach($array_generos as $generos){
					echo "<option value='$generos'>$generos</option>";
				};?>
			</select>
			<label for="genero" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sexo</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="endereco-idoso" id="nome-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " />
			<label for="nome" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA, AV)</label>
		</div>

		<div class="relative mb-5">
			<input type="text" name="numero-endereco-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " >
			<label for="endereco" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="complemento-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " >
			<label for="endereco" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento(opcional)</label>
		</div>	
		
		<div class="relative mb-5">
			<input type="text" name="bairro-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="bairro" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
		</div>

		<div class="relative mb-5">
			<input type="text" name="cep-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="cep" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="cidade-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="cidade" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
		</div>
		
		<div class="relative mb-5">
				<select name="uf-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
				<option value="selecione">Selecione...</option>
				<?php foreach($estados as $uf){
					echo "<option value='$uf'>$uf</option>";
				}?>
			</select>
			<label for="uf" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">UF(Unidade Federal)</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="telefone-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="telefone" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="rg-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="rg" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
		</div>

		<div class="relative mb-5">
			<input type="date" name="data-expedicao-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="data-expedicao" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data de Expedição</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="expedido-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="expedido-por" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido por</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="cnh-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="cnh" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CNH(Se for condutor)</label>
		</div>
		
		<div class="relative mb-5">
			<input type="date" name="validade-cnh-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="validade-cnh" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Validade da CNH</label>
		</div>
		
		<div class="relative mb-5">
			<input type="text" name="email-idoso" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
			<label for="email" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Digite seu email(opcional)</label>
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

				<div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
					<button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
					<button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="submit">
						Enviar <i class="fas fa-paper-plane"></i>
					</button>
				</div>
							
			</div>			

		</form>

<div class="title">
	<p>Núcleo de Trânsito - Tel.:(19)3572-5310 - Email: nucleodetransito@leme.sp.gov.br</p>
	<p>R. Dr. Armando Sales de Oliveira, nº925 - CEP 13610-220 - Leme/SP</p>
	<p>Horário de atendimento: Das 8:00h ás 12:00h e das 13:00 às 16:00h</p>
</div>

<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>