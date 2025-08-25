<!-- Modal para adicionar usuário -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animate__animated animate__fadeInDown">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow-sm">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
              <h3 class="text-xl font-semibold text-gray-900">
                  Adicionar um usuário
              </h3>
              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center focus:outline-yellow-500" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
              <form class="space-y-4 p-5 grid grid-cols-1 gap-10" action="add-user.php" method="post" enctype="multipart/form-data">      

                  <div class="relative z-0">
                    <input 
                      name="user-login"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o nome de Login
                    </label>
                  </div>
                  
                  <div class="relative z-0 flex flex-col items-center">
                      <div class="flex justify-center w-full md:w-64">
                          <label for="dropzone-file-add-user" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                              <div class="flex flex-col items-center justify-center w-full h-full px-1"> 
                                  <div id="user-add-image-preview" class="flex flex-col items-center justify-center w-full h-full">
                                      <div class="flex flex-col items-center justify-center w-full h-full"> 
                                          <svg class="w-5 h-5 mb-1 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                          </svg>
                                          <p class="mb-1 text-xs text-gray-500 text-center"><span class="font-semibold">Adicionar imagem do usuário (opcional)</span></p>
                                          <p class="text-xs text-gray-500 text-center">PNG/JPG</p>
                                      </div>
                                  </div>
                              </div>
                              <input id="dropzone-file-add-user" name="img-file-user" type="file" class="hidden" accept="image/png, image/jpeg" />
                          </label>
                      </div> 
                      <div class="flex justify-center w-full mt-2"> 
                          <input type="text" name="name-img-file-user" class="border-2 border-gray-300 text-center rounded-lg w-full md:w-64 text-xs py-1" readonly/>
                      </div>
                  </div>

                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        console.log('=== DEBUG DO UPLOAD DE IMAGEM ===');
                        
                        // Elementos do DOM
                        const fileInput = document.getElementById('dropzone-file-add-user');
                        const previewContainer = document.getElementById('user-add-image-preview');
                        const nameInput = document.querySelector('input[name="name-img-file-user"]');
                        
                        console.log('File input encontrado:', fileInput !== null);
                        console.log('Preview container encontrado:', previewContainer !== null);
                        console.log('Name input encontrado:', nameInput !== null);
                        
                        if (!fileInput || !previewContainer) {
                            console.error('❌ Elementos necessários não encontrados!');
                            return;
                        }
                        
                        // Evento de mudança no input de arquivo
                        fileInput.addEventListener('change', function(e) {
                            console.log('🎯 Change event disparado!');
                            
                            const file = e.target.files[0];
                            
                            if (file) {
                                console.log('Arquivo selecionado:', file.name);
                                console.log('Tipo do arquivo:', file.type);
                                
                                // Verificar se é uma imagem
                                if (!file.type.match('image.*')) {
                                    console.log('❌ Arquivo não é uma imagem');
                                    alert('Por favor, selecione um arquivo de imagem (PNG ou JPG/JPEG)');
                                    e.target.value = '';
                                    return;
                                }
                                
                                // Criar FileReader para ler a imagem
                                const reader = new FileReader();
                                
                                reader.onload = function(e) {
                                    console.log('✅ FileReader carregou a imagem');
                                    
                                    // Criar elemento de imagem para pré-visualização
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.alt = "Nova imagem do usuário";
                                    img.classList.add('max-w-full', 'max-h-32', 'object-contain', 'rounded-full');
                                    
                                    // Limpar o container e adicionar a imagem
                                    previewContainer.innerHTML = '';
                                    const wrapper = document.createElement('div');
                                    wrapper.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'w-full', 'h-full');
                                    wrapper.appendChild(img);
                                    previewContainer.appendChild(wrapper);
                                    
                                    // Atualizar o campo de texto com o nome do arquivo
                                    if (nameInput) {
                                        nameInput.value = file.name;
                                        console.log('✅ Nome do arquivo atualizado:', file.name);
                                    }
                                };
                                
                                reader.onerror = function(error) {
                                    console.error('❌ Erro no FileReader:', error);
                                    alert('Erro ao carregar a imagem. Tente novamente.');
                                };
                                
                                // Ler o arquivo como URL de dados
                                reader.readAsDataURL(file);
                            } else {
                                console.log('❌ Nenhum arquivo selecionado');
                                restoreDefaultContent();
                                if (nameInput) nameInput.value = '';
                            }
                        });
                        
                        console.log('✅ Event listener adicionado com sucesso');
                    });

                    // Função para restaurar o conteúdo padrão
                    function restoreDefaultContent() {
                        console.log('🔄 Restaurando conteúdo padrão');
                        const previewContainer = document.getElementById('user-add-image-preview');
                        
                        if (previewContainer) {
                            previewContainer.innerHTML = `
                                <div class="flex flex-col items-center justify-center w-full h-full"> 
                                    <svg class="w-5 h-5 mb-1 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-1 text-xs text-gray-500 text-center"><span class="font-semibold">Adicionar imagem do usuário (opcional)</span></p>
                                    <p class="text-xs text-gray-500 text-center">PNG/JPG</p>
                                </div>
                            `;
                        }
                    }
                  </script>

                  <div class="relative z-0">
                    <input 
                      name="user-name"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o nome de usuário
                    </label>
                  </div>

                  <div class="relative z-0">
                    <input name="access-level" type="number" id="number-input" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" required value="1"/>
                    <label for="number-input" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">Nível de acesso:</label>
                  </div>
                  
                  <div class="relative z-0">
                    <input 
                      name="password"
                      type="password"
                      id="pass"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                    />
                    <label
                      
                      for="pass"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite a senha
                    </label>
                  </div>

                  <div class="relative z-0">
                    <input 
                      name="pass-again"
                      type="password"
                      id="pass-again"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                    />
                    <label
                      for="pass-again"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o senha novamente
                    </label>
                  </div>

                  <button type="submit" class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cadastrar usuário
                  </button>
              </form>
            </div>
        </div>
    </div>
</div> 

<!-- Modal para editar usuário -->
<?php foreach ($users as $user): ?>
    
      <div id="edit-user-<?=$user['id']?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animate__animated animate__fadeInDown">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                  <h3 class="text-xl font-semibold text-gray-900">
                      Editar usuário
                  </h3>
                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center focus:outline-yellow-500" data-modal-hide="edit-user-<?=$user['id']?>">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5">
                  <form class="space-y-4 p-5 grid grid-cols-1 gap-10" action="update-user.php" method="post" enctype="multipart/form-data">      
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                          
                      <div class="relative z-0">
                        <input 
                          name="user-login"
                          type="text"
                          id="name-<?=$user['id']?>"
                          class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                          placeholder=" "
                          value="<?= $user['user_login'] ?>"
                        />
                        <label
                          for="name-<?=$user['id']?>"
                          class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                peer-focus:start-0 peer-focus:text-yellow-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                peer-focus:scale-90 peer-focus:-translate-y-4">
                          Digite o nome de Login
                        </label>
                      </div>

                    <div class="relative z-0 flex flex-col items-center">
                      <div class="flex justify-center w-full md:w-64">
                          <label for="dropzone-file-edit-user-<?=$user['id']?>" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 overflow-hidden">
                              <div class="flex items-center justify-center w-full h-full p-2">
                                  <div id="edit-user-image-preview-<?=$user['id']?>" class="w-full h-full flex items-center justify-center">
                                      <?php if(!empty($user['img_usuario'])): ?>
                                          <div class="flex flex-col items-center justify-center w-full h-full space-y-1">
                                              <h2 class="text-xs font-bold text-gray-600 text-center">Pré-visualização</h2>
                                              <div class="flex items-center justify-center w-full h-full">
                                                  <img src="display-user-image.php?id=<?=$user['id']?>&type=user" 
                                                      alt="Imagem do usuário"
                                                      class="max-w-full max-h-24 object-contain rounded-full">
                                              </div>
                                          </div>
                                      <?php else: ?>
                                          <div class="flex flex-col items-center justify-center text-center" id="default-preview-<?=$user['id']?>"> 
                                              <svg class="w-6 h-6 mb-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                              </svg>
                                              <p class="text-xs text-gray-500"><span class="font-medium">Adicionar imagem</span></p>
                                              <p class="text-xs text-gray-400">PNG/JPG</p>
                                          </div>
                                      <?php endif; ?>
                                  </div>
                              </div>
                              <!-- CORREÇÃO AQUI: ID do input -->
                              <input id="dropzone-file-edit-user-<?=$user['id']?>" name="img-file-user" type="file" class="hidden" accept="image/png, image/jpeg" />
                          </label>
                      </div> 
                      <div class="flex justify-center w-full mt-2"> 
                          <input type="text" id="name-edit-img-user" name="name-img-file-user" value="<?= !empty($user['nome_img_usuario']) ? $user['nome_img_usuario'] : '' ?>" class="border-2 border-gray-300 text-center rounded-lg w-full md:w-64 text-xs py-1" readonly/>
                      </div>
                  </div>
                      
                      <div class="relative z-0">
                        <input 
                          name="user-name"
                          type="text"
                          id="username-<?=$user['id']?>"
                          class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                          placeholder=" "
                          value="<?= $user['username'] ?>"
                        />
                        <label
                          for="username-<?=$user['id']?>"
                          class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                peer-focus:start-0 peer-focus:text-yellow-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                peer-focus:scale-90 peer-focus:-translate-y-4">
                          Digite o nome de usuário
                        </label>
                      </div>
  
                      <div class="relative z-0">
                        <input name="access-level" type="number" id="number-input-<?=$user['id']?>" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" required value="<?=$user['level']?>" />
                        <label for="number-input-<?=$user['id']?>" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                peer-focus:start-0 peer-focus:text-yellow-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                peer-focus:scale-90 peer-focus:-translate-y-4">Nível de acesso:</label>
                      </div>
                      
                      <div class="relative z-0">
                        <input 
                          name="password"
                          type="password"
                          id="pass-<?=$user['id']?>"
                          class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                          placeholder=" "
                          
                        />
                        <label
                          
                          for="pass-<?=$user['id']?>"
                          class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                peer-focus:start-0 peer-focus:text-yellow-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                peer-focus:scale-90 peer-focus:-translate-y-4">
                          Digite a senha
                        </label>
                      </div>
  
                      <div class="relative z-0">
                        <input 
                          name="pass-again"
                          type="password"
                          id="pass-again-<?=$user['id']?>"
                          class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                          placeholder=" "
                          
                        />
                        <label
                          for="pass-again-<?=$user['id']?>"
                          class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                                peer-focus:start-0 peer-focus:text-yellow-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                peer-focus:scale-90 peer-focus:-translate-y-4">
                          Digite o senha novamente
                        </label>
                      </div>
  
                      <button type="submit" class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Salvar Alteração
                      </button>
                  </form>
                </div>
           </div>
        </div>
    </div> 
        
    <?php endforeach; ?>
   
  </main>  