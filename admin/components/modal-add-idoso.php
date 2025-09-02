<div id="add-idoso-modal" tabindex="-1" class="animate__animated animate__fadeInDown fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-black">
                    Cartão do Idoso - Adicionar 
                </h3>
                <button type="button" class="text-gray-700 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-red-700 dark:hover:text-white" data-modal-hide="add-idoso-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                    <form action="add-idoso.php" method="post" enctype="multipart/form-data">
                        <h1 class="text-center text-2xl p-5">Informações do Idoso</h1>
                        <div class="p-5 grid grid-cols-3 gap-10">
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="nome-idoso">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do idoso
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="nasc-idoso" oninput="formatDate(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de nascimento
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" name="" id="" name="sexo-idoso">
                                    <option value="">Selecione o sexo</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                                <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Sexo
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="end-idoso" id="rua">
                                    <label for="rua" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="num-idoso">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="comp-idoso">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="bairro-idoso" id="bairro">
                                    <label for="bairro" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="cep-idoso" id="cep" onblur="pesquisacep(this.value);">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="cidade-idoso" id="cidade">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>

                            <div class="relative z-0">
                                <select name="uf-idoso" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="" id="uf">
                                    <option value="">Selecione a UF</option>
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
                                        echo "<option value=\"$sigla\" >$nome</option>";
                                    }
                                    ?>
                                </select>
                                <label for="uf" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Unidade Federativa(UF)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="tel-idoso" oninput="formatPhone(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="rg-idoso" oninput="formatRG(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="data-exp-idoso" oninput="formatDate(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="expedido-idoso">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Expedido por
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="cnh-idoso">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CNH (Caso for condutor)
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="validade-cnh-idoso" oninput="formatDate(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Validade da CNH
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="email-idoso">
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
                                <label for="dropzone-rg-idoso" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                    <!-- Conteúdo padrão (será substituído pelo preview) -->
                                    <div id="default-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                        <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Cópia do RG do Idoso <strong>OBRIGATÓRIO</strong></p>
                                        <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                    </div>
                                    
                                    <!-- Área para o preview (inicialmente vazia) - CORRIGIDO -->
                                    <div id="preview-content" class="hidden flex flex-col items-center justify-center w-full h-full p-4">
                                        <div id="rg-idoso-image-preview" class="flex items-center justify-center mb-2 w-full h-40"></div>
                                        <p id="rg-idoso-file-name" class="text-sm text-gray-600 font-medium text-center mt-2"></p>
                                    </div>
                                    
                                    <input id="dropzone-rg-idoso" type="file" class="hidden" name="copia-rg-idoso" accept=".png,.jpg,.jpeg,.pdf"/>
                                    <input type="hidden" name="nome-aqv-rg-idoso" id="nome-aqv-rg-idoso">
                                </label>
                            </div>
                        </div>

                        <h1 class="text-center text-2xl p-5">Informações do representante</h1>

                        <div class="p-5 grid grid-cols-3 gap-10">

                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="nome-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nome do representante
                                </label>
                            </div>

                            <div class="relative z-0">
                                <input type="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="email-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Email
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="end-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Endereço (Rua, Av)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="num-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Nº (Casa, Ap)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="comp-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Complemento (opcional)
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="bairro-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Bairro
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="cep-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    CEP
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="cidade-rep">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Cidade
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <select name="uf-rep" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" id="" >
                                    <option value="">Selecione a UF</option>
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
                                        
                                        echo "<option value=\"$sigla\" selected>$nome</option>";
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
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="tel-rep" oninput="formatPhone(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Telefone
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="rg-rep" oninput="formatRG(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    nº do RG
                                </label>
                            </div>
                            
                            <div class="relative z-0">
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="data-exp-rep" oninput="formatDate(this)">
                                    <label for="" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                    peer-focus:start-0 peer-focus:text-yellow-500 
                                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                    peer-focus:scale-90 peer-focus:-translate-y-4">
                                    Data de expedição
                                </label>
                            </div>
                            
                            <div class="relative z-0"> 
                                <input type="text" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " name="expedido-rep">
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
                            <label for="dropzone-rg-representante" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                <!-- Conteúdo padrão RG Representante -->
                                <div id="default-content-rg-rep" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                    <p class="mb-2 text-md text-gray-500 dark:text-gray-700">RG do Representante <strong>OBRIGATÓRIO</strong></p>
                                    <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                </div>
                                
                                <!-- Área para preview RG Representante -->
                                <div id="preview-content-rg-rep" class="hidden flex flex-col items-center justify-center w-full h-full p-4">
                                    <div id="rg-representante-image-preview" class="flex items-center justify-center mb-2 w-full h-40"></div>
                                    <p id="rg-representante-file-name" class="text-sm text-gray-600 font-medium text-center mt-2"></p>
                                </div>
                                
                                <input id="dropzone-rg-representante" type="file" class="hidden" name="copia-rg-rep" accept=".png,.jpg,.jpeg,.pdf"/>
                                <input type="hidden" name="nome-aqv-rg-representante" id="nome-aqv-rg-representante">
                            </label>
                        </div> 
                    </div>

                    <h1 class="text-center text-2xl p-5">Cópia do comprovante de representante</h1>

                    <div class="relative z-0">
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-comprovante-representante" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-200 dark:hover:bg-gray-200">
                                <!-- Conteúdo padrão Comprovante Representante -->
                                <div id="default-content-comp-rep" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                                    <p class="mb-2 text-md text-gray-500 dark:text-gray-700">Comprovante de Representação <strong>OBRIGATÓRIO</strong></p>
                                    <p class="text-lg text-gray-500 dark:text-gray-700">PNG, JPG ou PDF</p>
                                </div>
                                
                                <!-- Área para preview Comprovante Representante -->
                                <div id="preview-content-comp-rep" class="hidden flex flex-col items-center justify-center w-full h-full p-4">
                                    <div id="comprovante-representante-image-preview" class="flex items-center justify-center mb-2 w-full h-40"></div>
                                    <p id="comprovante-representante-file-name" class="text-sm text-gray-600 font-medium text-center mt-2"></p>
                                </div>
                                
                                <input id="dropzone-comprovante-representante" type="file" class="hidden" name="comprovante-rep" accept=".png,.jpg,.jpeg,.pdf"/>
                                <input type="hidden" name="nome-aqv-comprovante-representante" id="nome-aqv-comprovante-representante">
                            </label>
                        </div> 
                    </div>

                        <div class="w-50 gap-5 m-10 flex items-center justify-center">

                            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Registrar Idoso
                            </button>                      

                        </div>

                    </form>
            </div>
            
        </div>
    </div>
</div>