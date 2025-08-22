document.addEventListener('DOMContentLoaded', function() {
    // Adiciona event listener para todos os inputs de arquivo de usuário
    document.querySelectorAll('[id^="dropzone-file-user-"]').forEach(input => {
        const userId = input.id.split('-')[3];
        const previewContainer = document.getElementById(`user-image-preview-${userId}`);
        const nameInput = input.closest('.relative').querySelector('input[name="name-img-file-user"]');
        
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // Atualiza a pré-visualização
                        previewContainer.innerHTML = `
                            <div class="flex flex-col items-center justify-center w-full h-full space-y-1">
                                <h2 class="text-xs font-bold text-gray-600 text-center">Nova imagem</h2>
                                <div class="flex items-center justify-center w-full h-full">
                                    <img src="${e.target.result}" 
                                         alt="Nova imagem do usuário"
                                         class="max-w-full max-h-24 object-contain rounded-full">
                                </div>
                            </div>
                        `;
                        
                        // Atualiza o campo de texto com o nome do arquivo
                        if (nameInput) {
                            nameInput.value = file.name;
                        }
                    };
                    
                    reader.readAsDataURL(file);
                } else {
                    alert('Por favor, selecione um arquivo de imagem (PNG ou JPG/JPEG)');
                    e.target.value = ''; // Limpa o input
                    
                    // Restaura o conteúdo padrão
                    restoreDefaultContent(previewContainer, userId);
                    
                    // Limpa o campo de texto
                    if (nameInput) {
                        nameInput.value = '';
                    }
                }
            } else {
                // Se não houver arquivo, restaura o conteúdo padrão
                if (nameInput) {
                    nameInput.value = '';
                }
                restoreDefaultContent(previewContainer, userId);
            }
        });
    });
});

// Função para restaurar o conteúdo padrão
function restoreDefaultContent(previewContainer, userId) {
    // Verifica se há uma imagem original para este usuário
    const originalImage = previewContainer.querySelector('img[src*="display-user-image.php"]');
    
    if (originalImage) {
        // Se houver imagem original, mostra ela
        previewContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center w-full h-full space-y-1">
                <h2 class="text-xs font-bold text-gray-600 text-center">Imagem atual</h2>
                <div class="flex items-center justify-center w-full h-full">
                    <img src="${originalImage.src}" 
                         alt="Imagem atual do usuário"
                         class="max-w-full max-h-24 object-contain rounded-full">
                </div>
            </div>
        `;
    } else {
        // Se não houver imagem, mostra o ícone de upload
        previewContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center text-center"> 
                <svg class="w-6 h-6 mb-2 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="text-xs text-gray-500"><span class="font-medium">Adicionar imagem</span></p>
                <p class="text-xs text-gray-400">PNG/JPG</p>
            </div>
        `;
    }
}