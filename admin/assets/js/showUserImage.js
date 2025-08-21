document.getElementById('dropzone-file-user').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const previewContainer = document.getElementById('user-image-preview'); // ID corrigido
  const imageInput = document.querySelector('input[name="name-img-file-user"]');
  const defaultContent = previewContainer.querySelector('.flex.flex-col.items-center'); // Seleciona o conteúdo padrão
  
  if (file) {
    if (file.type.match('image.*')) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        // Esconde o conteúdo padrão
        if (defaultContent) {
          defaultContent.classList.add('hidden');
        }
        
        // Limpa qualquer preview anterior e cria o novo
        previewContainer.innerHTML = `
          <div class="flex flex-col items-center justify-center w-full h-full">
            <img src="${e.target.result}" 
                 alt="Preview da imagem do usuário"
                 class="max-w-32 max-h-32 object-contain rounded-full ">
          </div>
        `;
        
        // Atualiza o campo de texto com o nome do arquivo
        imageInput.value = file.name;
      }
      
      reader.readAsDataURL(file);
    } else {
      alert('Por favor, selecione um arquivo de imagem (PNG ou JPG/JPEG)');
      e.target.value = ''; // Limpa o input
      imageInput.value = ''; // Limpa o campo de texto
      
      // Restaura o conteúdo padrão
      restoreDefaultContent(previewContainer);
    }
  } else {
    // Se não houver arquivo, restaura o conteúdo padrão
    imageInput.value = ''; // Limpa o campo de texto
    restoreDefaultContent(previewContainer);
  }
});

// Função para restaurar o conteúdo padrão
function restoreDefaultContent(previewContainer) {
  previewContainer.innerHTML = `
  <div class="flex flex-col items-center justify-center w-full h-full">
    <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-gray-300">
      <img src="${e.target.result}" 
           alt="Preview da imagem do usuário"
           class="w-full h-full object-cover">
    </div>
  </div>
`;
}