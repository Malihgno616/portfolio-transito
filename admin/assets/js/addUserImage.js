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
                img.classList.add('max-w-full', 'max-h-32', 'object-contain', 'rounded-lg');
                
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