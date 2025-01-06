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
<div class="titulo">
  <h1>Formulário do Idoso</h1>
</div>
<section class="container">
  <form>
    <div class="group-inputs">
      <div class="input-content">
        <label for="nome" class="label-input">Nome...</label>
        <input type="text" name="nome" id="nome" required class="input">
      </div>
      <div class="input-content">
        <label for="nascimento" >Data de nascimento</label>
        <input type="date" name="nascimento" id="nascimento" >
      </div>
      <div class="input-content">
        <label for="sexo" >Sexo</label>
        <select name="sexo" id="genero" >
          <option value="selecione">Selecione</option>
          <?php foreach ($array_generos as $genero) {
            echo "<option value='$genero'>$genero</option>";
          }?>
        </select>
      </div>
    </div>
  </form>
</section>
