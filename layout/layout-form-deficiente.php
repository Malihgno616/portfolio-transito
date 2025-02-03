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

$deficiencias = [
  "Deficiência Física",
  "Membro(s) Superior(es)",
  "Membro(s) Inferior(es)",
  "Cadeira de Rodas",
  "Aparelhagem Ortopédica",
  "Prótese",
  "Incapacidade Mental",
  "Dificuldade de Locomoção"
];

?>

<div class="container">
	<form action="../config/database/form-deficiente-db.php" method="post" class="form animate__animated animate__fadeIn" enctype="multipart/form-data">
		<h1 class="title">Informações do Beneficiário</h1>
		<div class="input-group">
      <input type="text" name="nome-beneficiario" required class="input">
      <label for="beneficiario" class="label-input">Nome do Beneficiário</label>
    </div>

    <div class="input-group">
      <input type="date" name="nascimento-beneficiario" required class="input-date">
      <label for="nascimento-beneficiario" class="label-input">Data de Nascimento</label>
    </div>

    <div class="input-group">
      <select name="genero-beneficiario" required id="genero-deficiente" class="select">
        <option value="selecione">Selecione</option>
        <?php foreach ($array_generos as $genero) {
          echo "<option value='$genero'>$genero</option>";
        } ?>
      </select>
      <label for="genero-beneficiario" class="label-input">Sexo</label>
    </div>

    <div class="input-group">
      <input type="text" name="endereco-beneficiario" required class="input">
      <label for="endereco" class="label-input">Endereço(RUA, AV)</label>
    </div>

    <div class="input-group">
      <input type="text" name="numero-beneficiario" required class="input">
      <label for="numero-beneficiario" class="label-input">Número</label>
    </div>

    <div class="input-group">
      <input type="text" name="complemento-beneficiario" class="input">
      <label for="complemento-beneficiario" class="label-input">Complemento(opcional)</label>
    </div>

    <div class="input-group">
      <input type="text" name="bairro-beneficiario" required class="input">
      <label for="bairro-deficiente" class="label-input">Bairro</label>
    </div>

    <div class="input-group">
      <input type="text" name="cep-beneficiario" required class="input">
      <label for="cep-deficiente" class="label-input">CEP</label>
    </div>

    <div class="input-group">
      <input type="text" name="cidade-beneficiario" required class="input">
      <label for="cidade-beneficiario" class="label-input">Cidade</label>
    </div>

    <div class="input-group">
      <select name="uf-beneficiario" class="select" required >
        <option value="selecione">Selecione...</option>
        <?php foreach ($estados as $estado) {
          echo "<option value='$estado'>$estado</option>";
        }?>
      </select>
      <label for="uf-deficiente" class="label-input">Estado</label>
    </div>

    <div class="input-group">
      <input type="text" name="telefone-beneficiario" required class="input">
      <label for="telefone-deficiente" class="label-input">Telefone</label>
    </div>

    
    <div class="input-group">
      <input type="text" name="rg-beneficiario" required class="input">
      <label for="rg-deficiente" class="label-input">RG</label>
    </div>

    <div class="input-group">
      <input type="date" name="expedicao-beneficiario" required id="" class="input-date">
      <label for="expedicao-beneficiario" class="label-input">Data Expedição</label>
    </div>
   <div class="input-group">
      <input type="text" name="expedido-beneficiario" required class="input"/>
      <label for="expedido-beneficiario" class="label-input">Expedido por</label>
    </div>

    <div class="input-group">
      <input type="text" name="cnh-beneficiario" class="input">
      <label for="cnh-beneficiario" class="label-input">CNH(Se for condutor)</label>
    </div>

    <div class="input-group">
      <input type="date" name="validade-cnh-beneficiario" class="input-date">
      <label for="validade-cnh-beneficiario" class="label-input">Validade da CNH</label>
    </div>

    <div class="input-group">
      <input type="text" name="email-beneficiario" class="input" id="">
      <label for="email-beneficiario" class="label-input">Digite seu email(opcional)</label>
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
    
		<h1 class="title">Informações do Médico</h1>
    <div class="input-group">
      <input type="text" name="nome-medico" id="" required class="input">
      <label for="nome" class="label-input">Nome do médico </label>
    </div>
    <div class="input-group">
      <input type="text" name="crm-medico" required class="input">  
      <label for="registro" class="label-input" >Registro profissional (CRM)</label>
    </div>
    <div class="input-group">
      <input type="text" name="telefone-medico" class="input" required>
      <label for="telefone" class="label-input">Telefone</label>
    </div>
    <div class="input-group">
      <input type="text" name="local-atendimento-medico" class="input" required>
      <label for="" class="label-input">Local de atendimento (Rua, AV)</label>
    </div>
    <h1 class="title">Informações Médicas</h1>
    <p>O requerente possui deficiência <strong>AMBULATÓRIA</strong> causada por:</p>
    <?php foreach($deficiencias as $deficiencia): ?>
      <div class="input-group">
        <input type="checkbox" class="input-checkbox" name="deficiencia-ambulatoria" id="deficiencia-<?php echo strtolower(str_replace(" ", "-", $deficiencia)); ?>">
        <label for="deficiencia-<?php echo strtolower(str_replace(" ", "-", $deficiencia)); ?>">
          <?php echo $deficiencia; ?>
        </label>
      </div>
    <?php endforeach; ?>
      
    <p>Assinalar o tempo. Em sentido <strong>temporário</strong>, informar o período previsto de restrição médica. No mínimo 2 meses e no máximo 1 ano.</p>
    <p>Em sentido permanente, informar o período de início de validade do cartão, com prazo de (05) cinco anos.</p>

    <div class="input-group">
      <input type="radio" class="input-radio" name="restricao-medica" id="temporaria">
      <label for="temporaria">Temporária</label>
    </div>

    <div class="input-group">
      <input type="radio" class="input-radio" name="restricao-medica" id="permanente" >
      <label for="permanente" >Permanente</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-inicio" id="data-inicio" required class="input-date">
      <label for="data-inicio" id="data-inicio" class="label-input">Data de início</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-fim" id="data-fim" class="input-date" >
      <label for="data-fim" id="data-fim" class="label-input">Data de fim</label>
    </div>

    <div class="input-group">
      <textarea name="cid" id="" class="textarea"></textarea>
      <label for="cid" class="label">- Descrição e CID da lesão que justifique a incapacidade ou dificuldade ambular:</label>
    </div>

    <p>- Selecione a cópia digitalizada do atestado médico da pessoa portadora de deficiência física permanente por período de validade de (05) cinco anos ou para pessoa com dificuldade de locomoção temporária, por período de no mínimo (02) dois meses e no máximo (01) um ano.</p>

    <div class="input-group">
      <input type="file" name="atestado-medico" id="file-input" class="input-file">
      <label for="atestado-medico">SELECIONE (PNG, JPG, PDF)Cópia digitalizada do atestado médico <strong>(OBRIGATÓRIO)</strong></label>
      <span id="file-name"></span>	
      <div id="image-preview"></div>
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
   	
    <div id="representante" class="animate__animated animate__fadeIn">
			
				<h1 class="title">Informações do Representante</h1>
				
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
						<input type="text" name="numero-representante" class="input" />
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
					
					<div class="input-group" id="representante">
						<div class="input-group" id="representante">
							<select name="uf-representante" class="select">
								<option value="selecione">Selecione...</option>
								<?php foreach($estados as $uf){
									echo "<option value='$uf'>$uf</option>";
								}?>
							</select>
						<label for="uf" class="label-input">
							UF(Unidade Federal)
						</label>
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
						<input type="date" name="expedicao-representante" id="" class="input-date">
						<label for="" class="label-input">Data de Expedição</label>
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
        Enviar <i class="fa-solid fa-arrow-right"></i>
      </button>
    </div>

  </form>


</div>

<script src="../assets/js/exibirData.js"></script>
<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>