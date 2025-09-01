<!-- Extra Large Modal -->

<?php foreach($listIdosos as $idoso): ?>

<div id="edit-idoso-modal-<?= $idoso['id']?>" tabindex="-1" class="animate__animated animate__fadeInDown fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-black">
                    Cartão do Idoso - Detalhes  
                </h3>
                
                <button type="button" class="text-gray-700 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-red-700 dark:hover:text-white" data-modal-hide="edit-idoso-modal-<?= $idoso['id']?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h1 class="text-center text-2xl p-5">Informações do Idoso</h1>
                        <h2 class="text-center text-lg text-yellow-700 p-3 font-bold">ID: <?= $idoso['id']?></h2>
                        <div class="p-5 grid grid-cols-3 gap-10">
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nome_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do idoso
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nascimento_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de nascimento
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" name="" id="">
                                    <option value="" disabled <?= empty($idoso['genero_idoso']) ? 'selected' : '' ?>>Selecione o sexo</option>
                                    <option value="masculino" <?= ($idoso['genero_idoso'] ?? '') === 'masculino' ? 'selected' : '' ?>>Masculino</option>
                                    <option value="feminino" <?= ($idoso['genero_idoso'] ?? '') === 'feminino' ? 'selected' : '' ?>>Feminino</option>
                                </select>
                                <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Sexo
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['endereco_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['numero_endereco_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['complemento_idoso'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['bairro_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cep_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cidade_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select name="uf_idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="">
                                    <option value="" disabled <?= empty($idoso['uf_idoso']) ? 'selected' : '' ?>>Selecione a UF</option>
                                    <?php
                                    $ufs = [
                                        "AC" => "Acre",
                                        "AL" => "Alagoas",
                                        "AP" => "Amapá",
                                        "AM" => "Amazonas",
                                        "BA" => "Bahia",
                                        "CE" => "Ceará",
                                        "DF" => "Distrito Federal",
                                        "ES" => "Espírito Santo",
                                        "GO" => "Goiás",
                                        "MA" => "Maranhão",
                                        "MT" => "Mato Grosso",
                                        "MS" => "Mato Grosso do Sul",
                                        "MG" => "Minas Gerais",
                                        "PA" => "Pará",
                                        "PB" => "Paraíba",
                                        "PR" => "Paraná",
                                        "PE" => "Pernambuco",
                                        "PI" => "Piauí",
                                        "RJ" => "Rio de Janeiro",
                                        "RN" => "Rio Grande do Norte",
                                        "RS" => "Rio Grande do Sul",
                                        "RO" => "Rondônia",
                                        "RR" => "Roraima",
                                        "SC" => "Santa Catarina",
                                        "SP" => "São Paulo",
                                        "SE" => "Sergipe",
                                        "TO" => "Tocantins"
                                    ];
                                    foreach ($ufs as $sigla => $nome) {
                                        $selected = ($idoso['uf_idoso'] ?? '') === $sigla ? 'selected' : '';
                                        echo "<option value=\"$sigla\" $selected>$nome</option>";
                                    }
                                    ?>
                                </select>
                                <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Unidade Federativa(UF)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['telefone_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['rg_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['data_expedicao_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['expedido_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Expedido por
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cnh_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CNH (Caso for condutor)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['validade_cnh_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Validade da CNH
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['email_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    E-mail (opcional)
                                </label>
                            </div>                           
                        </div>

                        <h1 class="text-center text-2xl p-5">Cópia do RG do Idoso</h1>

                        <div class="relative z-0">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <?php if(!empty($idoso) && $idoso['copia_rg_idoso']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=idoso" alt="Cópia do RG do idoso" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_rg_idoso']?></span>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> or arraste o arquivo aqui</p>
                                        <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
                                        <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif; ?>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> 
                        </div>

                        <h1 class="text-center text-2xl p-5">Informações do representante</h1>

                        <div class="p-5 grid grid-cols-3 gap-10">

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nome_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do representante
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['email_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Email
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['endereco_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['numero_endereco_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['complemento_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['bairro_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cep_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cidade_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <select name="uf_representante" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="">
                                    <option value="" disabled <?= empty($idoso['uf_representante']) ? 'selected' : '' ?>>Selecione a UF</option>
                                    <?php
                                    $ufs = [
                                        "AC" => "Acre",
                                        "AL" => "Alagoas",
                                        "AP" => "Amapá",
                                        "AM" => "Amazonas",
                                        "BA" => "Bahia",
                                        "CE" => "Ceará",
                                        "DF" => "Distrito Federal",
                                        "ES" => "Espírito Santo",
                                        "GO" => "Goiás",
                                        "MA" => "Maranhão",
                                        "MT" => "Mato Grosso",
                                        "MS" => "Mato Grosso do Sul",
                                        "MG" => "Minas Gerais",
                                        "PA" => "Pará",
                                        "PB" => "Paraíba",
                                        "PR" => "Paraná",
                                        "PE" => "Pernambuco",
                                        "PI" => "Piauí",
                                        "RJ" => "Rio de Janeiro",
                                        "RN" => "Rio Grande do Norte",
                                        "RS" => "Rio Grande do Sul",
                                        "RO" => "Rondônia",
                                        "RR" => "Roraima",
                                        "SC" => "Santa Catarina",
                                        "SP" => "São Paulo",
                                        "SE" => "Sergipe",
                                        "TO" => "Tocantins"
                                    ];
                                    foreach ($ufs as $sigla => $nome) {
                                        $selected = ($idoso['uf_representante'] ?? '') === $sigla ? 'selected' : '';
                                        echo "<option value=\"$sigla\" $selected>$nome</option>";
                                    }
                                    ?>
                                </select>
                                <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Unidade Federativa(UF)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['telefone_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['rg_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['data_expedicao_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>
                            
                            <div class="relative z-0"> 
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['expedido_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Expedido por
                                </label>
                            </div>                           

                        </div>
                        
                        <h1 class="text-center text-2xl p-5">Cópia do RG do representante</h1>
                        
                        <div class="relative z-0">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <?php if(!empty($idoso) && $idoso['copia_rg_representante']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=representante" alt="" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_rg_rep']?></span>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> or arraste o arquivo aqui</p>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
                                            <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif;?>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> 
                        </div>

                        <h1 class="text-center text-2xl p-5">Cópia do comprovante de representante</h1>

                        <div class="relative z-0">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <?php if(!empty($idoso) && $idoso['copia_rg_representante']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=comprovante" alt="" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_comp_rep']?></span>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> or arraste o arquivo aqui</p>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
                                            <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif;?>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> 
                        </div>

                        <div class="w-50 gap-5 m-10 flex items-center justify-center">

                            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Salvar Alteração 
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>

                            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Validar e Imprimir 
                                <i class="fa-solid fa-file-export"></i>
                            </button>                         

                        </div>

                    </form>
            </div>
            
        </div>
    </div>
</div>

<?php endforeach; ?>
