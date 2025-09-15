document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('dropzone-atestado');
    const defaultContent = document.getElementById('default-content-atestado');
    const previewContent = document.getElementById('preview-content-atestado');
    const previewContainer = document.getElementById('atestado-image-preview');
    const fileNameDisplay = document.getElementById('atestado-file-name');
    const nameInput = document.getElementById('nome-aqv-atestado');

    if (!fileInput || !defaultContent || !previewContent || !previewContainer || !fileNameDisplay || !nameInput) {
        console.error('❌ Elementos necessários não encontrados!');
        return;
    }
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            // Validar tipo de arquivo
            const validTypes = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];
            if (!validTypes.includes(file.type)) {
                alert('Por favor, selecione um arquivo PNG, JPG, JPEG ou PDF');
                e.target.value = '';
                return;
            }
            
            // Alternar entre conteúdo padrão e preview
            defaultContent.classList.add('hidden');
            previewContent.classList.remove('hidden');
            
            // Exibir nome do arquivo
            fileNameDisplay.textContent = file.name;
            nameInput.value = file.name;
            
            // Limpar preview anterior
            previewContainer.innerHTML = '';
            
            if (file.type === 'application/pdf') {
                // Para PDF, mostrar ícone
                const pdfIcon = document.createElement('div');
                pdfIcon.classList.add('flex', 'flex-col', 'items-center', 'justify-center');
                pdfIcon.innerHTML = `
                    <svg class="w-16 h-16 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                    </svg>
                `;
                previewContainer.appendChild(pdfIcon);
            } else {
                // Para imagens, mostrar preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Imagem do Atestado médico";
                    img.classList.add('max-w-full', 'max-h-32', 'object-contain', 'm-auto');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        } else {
            // Se nenhum arquivo selecionado, voltar ao conteúdo padrão
            defaultContent.classList.remove('hidden');
            previewContent.classList.add('hidden');
            nameInput.value = '';
        }
    });

    // Funcionalidade de drag and drop (opcional)
    const dropZone = fileInput.closest('label');
    
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-blue-400', 'bg-blue-50');
        });
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-blue-400', 'bg-blue-50');
        });
    });
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    });
});
