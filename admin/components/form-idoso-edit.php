        <?php foreach($idosos as $idoso): ?>
            <!-- Modal body -->
            <div class="animate__animated animate__fadeIn p-10 border-2 rounded-lg border-gray-600/50 md:p-5 space-y-4">
                    <form class="animate__animated animate__fadeIn" id="form-edit-idoso" action="update-idoso.php" method="post" enctype="multipart/form-data">
                        <h1 class="text-center text-2xl p-5">Informações do Idoso</h1>
                        <h2 class="text-center text-lg text-yellow-700 p-3 font-bold">ID: <?= $idoso['id']?></h2>
                        <input type="text" name="id-idoso" value="<?= $idoso['id']?>" hidden>

                        <div class="p-5 grid grid-cols-3 gap-10">
                            <div class="relative z-0">
                                <input type="text" name="nome-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nome_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do idoso
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="nasc-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nascimento_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de nascimento
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select name="sexo-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="">
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
                                <input type="text" name="end-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['endereco_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="num-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['numero_endereco_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="comp-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['complemento_idoso'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="bairro-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['bairro_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="cep-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cep_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="cidade-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cidade_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select name="uf-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="">
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
                                <input type="text" name="tel-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['telefone_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="rg-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['rg_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="data-exp-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['data_expedicao_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="expedido-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['expedido_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Expedido por
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="cnh-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cnh_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CNH (Caso for condutor)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" name="validade-cnh-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['validade_cnh_idoso']?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Validade da CNH
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" name="email-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['email_idoso']?>">
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
                                <label for="dropzone-file-idoso-<?= $idoso['id']?>" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="preview-container-idoso-<?= $idoso['id']?>">
                                        <?php if(!empty($idoso) && $idoso['copia_rg_idoso']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=idoso" alt="Cópia do RG do idoso" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_rg_idoso']?></span>
                                                <button type="button" class="mt-2 text-red-600 hover:text-red-800 text-sm remove-btn">
                                                    <i class="fas fa-times mr-1"></i> Remover
                                                </button>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
                                            <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif; ?>
                                    </div>
                                    <input id="dropzone-file-idoso-<?= $idoso['id']?>" type="file" class="hidden" name="copia-rg-idoso" data-preview="preview-container-idoso-<?= $idoso['id']?>" />
                                    <input type="text" name="nome-aqv-rg-idoso" hidden value="<?= $idoso['nome_arquivo_rg_idoso'] ?? '' ?>">
                                </label>
                            </div> 
                        </div>

                        <h1 class="text-center text-2xl p-5">Informações do representante</h1>

                        <div class="p-5 grid grid-cols-3 gap-10">

                            <div class="relative z-0">
                                <input type="text" name="nome-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['nome_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do representante
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" name="email-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['email_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Email
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="end-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['endereco_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="num-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['numero_endereco_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="comp-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['complemento_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="bairro-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['bairro_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="cep-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cep_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="cidade-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['cidade_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <select name="uf-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="">
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
                                        if (!empty($idoso['uf_representante']) && $idoso['uf_representante'] === $sigla) {
                                            echo "<option value=\"$sigla\" selected>$nome</option>";
                                        } else {
                                            echo "<option value=\"$sigla\">$nome</option>";
                                        }
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
                                <input type="text" name="tel-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['telefone_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="rg-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['rg_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" name="data-exp-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['data_expedicao_representante'] ?? ''?>">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>
                            
                            <div class="relative z-0"> 
                                <input type="text" name="expedido-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " value="<?= $idoso['expedido_representante'] ?? ''?>">
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
                                <label for="dropzone-file-rep-<?= $idoso['id']?>" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="preview-container-rep-<?= $idoso['id']?>">
                                        <?php if(!empty($idoso) && $idoso['copia_rg_representante']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=representante" alt="" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_rg_rep']?></span>
                                                <button type="button" class="mt-2 text-red-600 hover:text-red-800 text-sm remove-btn">
                                                    <i class="fas fa-times mr-1"></i> Remover
                                                </button>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Representante <strong>OBRIGATÓRIO</strong></p>
                                            <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif;?>
                                    </div>
                                    <input id="dropzone-file-rep-<?= $idoso['id']?>" name="copia-rg-rep" type="file" class="hidden" data-preview="preview-container-rep-<?= $idoso['id']?>" />
                                    <input type="text" name="nome-aqv-rg-rep" value="<?= $idoso['nome_arquivo_rg_rep'] ?? '' ?>" hidden>
                                </label>
                            </div> 
                        </div>

                        <h1 class="text-center text-2xl p-5">Cópia do comprovante de representante</h1>

                        <div class="relative z-0">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file-comp-<?= $idoso['id']?>" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="preview-container-comp-<?= $idoso['id']?>">
                                        <?php if(!empty($idoso) && $idoso['comprovante_representante']): ?>
                                            <div class="flex flex-col items-center justify-center mb-4">
                                                <img src="display-img-idoso.php?id=<?= $idoso['id']?>&type=comprovante" alt="" class="max-w-xs max-h-40 object-contain"/>
                                                <span><?= $idoso['nome_arquivo_comp_rep']?></span>
                                                <button type="button" class="mt-2 text-red-600 hover:text-red-800 text-sm remove-btn">
                                                    <i class="fas fa-times mr-1"></i> Remover
                                                </button>
                                            </div>
                                        <?php else: ?>
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                            <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Comprovante de Representante <strong>OBRIGATÓRIO</strong></p>
                                            <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                        <?php endif;?>
                                    </div>
                                    <input id="dropzone-file-comp-<?= $idoso['id']?>" name="comp-rg-rep" type="file" class="hidden" data-preview="preview-container-comp-<?= $idoso['id']?>" />
                                    <input type="text" name="nome-aqv-comp-rep" value="<?= $idoso['nome_arquivo_comp_rep'] ?? '' ?>" hidden>
                                </label>
                            </div> 
                        </div>

                        <div class="w-50 gap-5 m-10 flex items-center justify-center">
                            <button type="submit" id="submit-btn-edit" class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <span id="btn-text-edit" class="mr-2">Salvar Alteração</span> 
                                <svg id="spinner-edit" aria-hidden="true" class="hidden w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </button>
                        </div>

                    </form>
                    <?php endforeach; ?>
            </div>
         


<script>
// Função para remover imagem
function removeImage(previewContainerId, fileInputId) {
    const previewContainer = document.getElementById(previewContainerId);
    const fileInput = document.getElementById(fileInputId);
    
    // Resetar o input de arquivo
    fileInput.value = '';
    
    // Restaurar o conteúdo padrão
    previewContainer.innerHTML = `
        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
        </svg>
        <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
        <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
        <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
    `;
}

// Inicializar eventos para upload de arquivos
document.addEventListener('DOMContentLoaded', function() {
    initFileUploadEvents();
});

function initFileUploadEvents() {
    // Configurar eventos para cada campo de arquivo
    const fileInputs = document.querySelectorAll('input[type="file"]');
    
    fileInputs.forEach(input => {
        const label = input.closest('label');
        
        // Evento quando um arquivo é selecionado
        input.addEventListener('change', function(e) {
            handleFileSelect(this, label);
        });
        
        // Configurar drag and drop
        setupDragAndDrop(label, input);
    });
}

function handleFileSelect(input, label) {
    const file = input.files[0];
    if (!file) return;
    
    const previewContainer = label.querySelector('div');
    
    // Verificar tipo de arquivo
    if (file.type.match('image.*')) {
        handleImageFile(file, previewContainer, input);
    } else if (file.type === 'application/pdf') {
        handlePdfFile(file, previewContainer, input);
    } else {
        alert('Por favor, selecione apenas arquivos PNG, JPG ou PDF.');
        input.value = '';
    }
}

function handleImageFile(file, previewContainer, input) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        previewContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center mb-4">
                <img src="${e.target.result}" alt="Pré-visualização" class="max-w-xs max-h-40 object-contain"/>
                <span>${file.name}</span>
                <button type="button" class="mt-2 text-red-600 hover:text-red-800 text-sm" onclick="removeUploadedFile(this, '${input.id}')">
                    <i class="fas fa-times mr-1"></i> Remover
                </button>
            </div>
        `;
    };
    
    reader.readAsDataURL(file);
}

function handlePdfFile(file, previewContainer, input) {
    previewContainer.innerHTML = `
        <div class="flex flex-col items-center justify-center mb-4">
            <i class="fas fa-file-pdf text-4xl text-red-500 mb-2"></i>
            <span>${file.name}</span>
            <button type="button" class="mt-2 text-red-600 hover:text-red-800 text-sm" onclick="removeUploadedFile(this, '${input.id}')">
                <i class="fas fa-times mr-1"></i> Remover
            </button>
        </div>
    `;
}

function removeUploadedFile(button, inputId) {
    const input = document.getElementById(inputId);
    const label = input.closest('label');
    const previewContainer = label.querySelector('div');
    
    input.value = '';
    
    // Restaurar conteúdo padrão baseado no tipo de campo
    const fieldName = getFieldName(input);
    previewContainer.innerHTML = `
        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
        </svg>
        <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
        <p class="mb-2 text-md text-gray-500 dark:text-gray-700">${fieldName} <strong>OBRIGATÓRIO</strong></p>
        <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
    `;
}

function setupDragAndDrop(zone, input) {
    zone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-yellow-500', 'bg-yellow-50');
    });
    
    zone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-yellow-500', 'bg-yellow-50');
    });
    
    zone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-yellow-500', 'bg-yellow-50');
        
        const files = e.dataTransfer.files;
        if (files.length) {
            input.files = files;
            handleFileSelect(input, this);
        }
    });
}

function getFieldName(input) {
    const name = input.getAttribute('name');
    if (name === 'copia-rg-idoso') return 'Cópia do RG do Idoso';
    if (name === 'copia-rg-rep') return 'Cópia do RG do Representante';
    if (name === 'comp-rg-rep') return 'Comprovante de Representante';
    return 'Arquivo';
}
</script>