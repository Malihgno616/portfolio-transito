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
<div class="texto-format">
  <h1>Informações do Beneficiário</h1>
</div>

<div class="container">
  <form action="../pages/infos-medicas.php" method="get" class="form animate__animated animate__fadeIn" enctype="multipart/form-data">
    <div class="input-group">
      <input type="text" name="nome-beneficiario" required class="input">
      <label for="beneficiario" id="label-input">Nome do Beneficiário</label>
    </div>

    <div class="input-group">
      <input type="date" name="nascimento-beneficiario" required class="input-date">
      <label for="nascimento-beneficiario" id="label-input">Data de Nascimento</label>
    </div>

    <div class="input-group">
      <select name="genero-beneficiario" required id="genero-deficiente" class="select">
        <option value="selecione">Selecione</option>
        <?php foreach ($array_generos as $genero) {
          echo "<option value='$genero'>$genero</option>";
        } ?>
      </select>
      <label for="genero-beneficiario" id="label-input">Sexo</label>
    </div>

    <div class="input-group">
      <input type="text" name="endereco-beneficiario" required class="input">
      <label for="endereco" id="label-input">Endereço(RUA, AV)</label>
    </div>

    <div class="input-group">
      <input type="text" name="num-endereco-beneficiario" required class="input">
      <label for="numero-endereco-deficiente" id="label-input">Número</label>
    </div>

    <div class="input-group">
      <input type="text" name="complemento-beneficiario" class="input">
      <label for="complemento-beneficiario" id="label-input">Complemento(opcional)</label>
    </div>

    <div class="input-group">
      <input type="text" name="bairro-beneficiario" required class="input">
      <label for="bairro-deficiente" id="label-input">Bairro</label>
    </div>

    <div class="input-group">
      <input type="text" name="cep-beneficiario" required class="input">
      <label for="cep-deficiente" id="label-input">CEP</label>
    </div>

    <div class="input-group">
      <input type="text" name="cidade-beneficiario" required class="input">
      <label for="cidade-beneficiario" id="label-input">Cidade</label>
    </div>

    <div class="input-group">
      <select name="uf-beneficiario" class="select" required >
        <option value="selecione">Selecione...</option>
        <?php foreach ($estados as $estado) {
          echo "<option value='$estado'>$estado</option>";
        }?>
      </select>
      <label for="uf-deficiente" id="label-input">Estado</label>
    </div>

    <div class="input-group">
      <input type="text" name="telefone-deficiente" required class="input">
      <label for="telefone-deficiente" id="label-input">Telefone</label>
    </div>

    
    <div class="input-group">
      <input type="text" name="rg-beneficiario" required class="input">
      <label for="rg-deficiente" id="label-input">RG</label>
    </div>

    <div class="input-group">
      <input type="date" name="expedicao-beneficiario" required id="" class="input-date">
      <label for="expedicao-beneficiario" id="label-input">Data Expedição</label>
    </div>

    <div class="input-group">
      <input type="text" name="expedido-beneficiario" required class="input"/>
      <label for="expedido-beneficiario" id="label-input">Expedido por</label>
    </div>

    <div class="input-group">
      <input type="text" name="cnh-beneficiario" class="input">
      <label for="cnh-beneficiario" id="label-input">CNH(Se for condutor)</label>
    </div>

    <div class="input-group">
      <input type="date" name="validade-cnh-beneficiario" class="input-date">
      <label for="validade-cnh-beneficiario" id="label-input">Validade da CNH</label>
    </div>

    <div class="input-group">
      <input type="text" name="email-beneficiario" class="input" id="">
      <label for="email-beneficiario" id="label-input">Digite seu email(opcional)</label>
    </div>

    <div class="input-group">
			
			<div class="radio input">
				
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
					<input type="file" name="copia-rg-beneficiario" id="file-input" required placeholder="Cópia do RG" class="file" accept="image/*">
					<label for="copia-rg-beneficiario">Selecione(JPG, PNG ou PDF) a cópia do RG do requerente/beneficiário ou documento equivalente <strong>(OBRIGATÓRIO)</strong></label>
					<span id="file-name"></span>						
				</div>
				<div id="image-preview"></div>
				
			</div>
			
		</div>
		
		<div id="representante" class="animate__animated animate__fadeIn">
			
				<h1>Informações do Representante</h1>
				
					<div class="input-group" id="representante">
						<input type="text" name="nome-representante" class="input" />
						<label for="nome-representante" id="label-input">Nome do representante</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="email-representante" class="input" />
						<label for="email-representante" id="label-input">Email</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="endereco-representante" class="input" />
						<label for="endereco-representante" id="label-input">Endereço(RUA, AV)</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="numero-representante" class="input" />
						<label for="numero-representante" id="label-input">Nº</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="complemento-representante" class="input" />
						<label for="complemento-representante" id="label-input">Complemento</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="bairro-representante" class="input" />
						<label for="bairro-representante" id="label-input">Bairro</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="cep-representante" class="input">
						<label for="cep-representante" id="label-input">CEP</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="cidade-representante" class="input" />
						<label for="cidade-representante" id="label-input">Cidade</label>
					</div>
					
					<div class="input-group" id="representante">
						<div class="input-group" id="representante">
							<select name="uf-representante" class="select">
								<option value="selecione">Selecione...</option>
								<?php foreach($estados as $uf){
									echo "<option value='$uf'>$uf</option>";
								}?>
							</select>
						<label for="uf" id="label-input">
							UF(Unidade Federal)
						</label>
					</div>

					<div class="input-group" id="representante">
						<input type="text" name="telefone-representante" class="input" />
						<label for="telefone-representante" id="label-input">Telefone</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="text" name="rg-representante" class="input">
						<label for="rg-representante" id="label-input">RG</label>
					</div>
					
					<div class="input-group" id="representante">
						<input type="date" name="expedicao-representante" id="" class="input-date">
						<label for="" id="label-input">Data de Expedição</label>
					</div>
					
					<div class="input-group">
						<input type="text" name="expedido-representante" class="input">
						<label for="expedido-por" id="label-input">Expedido por</label>
					</div>
					
					<div class="input-group" id="representante">
						<div class="input-file-container">

							<div class="input-file">
								<input type="file" name="copia-rg-representante" id="file-input" class="file" accept="image/*">
								<label for="copia-rg-representante">Selecione(JPG, PNG ou PDF)  a cópia do RG do representante ou documento equivalente <strong>(OBRIGATÓRIO)</strong></label>
								<span id="file-name"></span>						
							</div>
							<div id="image-preview"></div>
							
						</div>
					</div>
					
					<div class="input-group" id="representante">
						<div class="input-file-container">
							
							<div class="input-file">
								<input type="file" name="comprovante-representante" id="file-input" placeholder="Cópia do RG" class="file" accept="image/*">
								<label for="">Selecione(JPG, PNG ou PDF) o comprovante de representante legal <strong>(OBRIGATÓRIO)</strong></label>
								<span id="file-name"></span>						
							</div>
							<div id="image-preview"></div>
							
						</div>
					</div>
					
				</div>
				
			</div>	
			
			<div class="buttons">
        <button onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Voltar </button>
        <button type="submit">
          Próximo <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>


  </form>
</div>

<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>