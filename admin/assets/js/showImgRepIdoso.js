document.addEventListener('DOMContentLoaded', function() {
    // Configuração para RG do Representante
    setupFileUpload(
        'dropzone-rg-representante',
        'default-content-rg-rep',
        'preview-content-rg-rep',
        'rg-representante-image-preview',
        'rg-representante-file-name',
        'nome-aqv-rg-representante'
    );

    // Configuração para Comprovante de Representante
    setupFileUpload(
        'dropzone-comprovante-representante',
        'default-content-comp-rep',
        'preview-content-comp-rep',
        'comprovante-representante-image-preview',
        'comprovante-representante-file-name',
        'nome-aqv-comprovante-representante'
    );

    function setupFileUpload(inputId, defaultContentId, previewContentId, previewContainerId, fileNameId, nameInputId) {
        const fileInput = document.getElementById(inputId);
        const defaultContent = document.getElementById(defaultContentId);
        const previewContent = document.getElementById(previewContentId);
        const previewContainer = document.getElementById(previewContainerId);
        const fileNameDisplay = document.getElementById(fileNameId);
        const nameInput = document.getElementById(nameInputId);

        if (!fileInput || !defaultContent || !previewContent || !previewContainer || !fileNameDisplay || !nameInput) {
            console.error('❌ Elementos necessários não encontrados para:', inputId);
            return;
        }
        
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const validTypes = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];
                if (!validTypes.includes(file.type)) {
                    alert('Por favor, selecione um arquivo PNG, JPG, JPEG ou PDF');
                    e.target.value = '';
                    return;
                }
                
                defaultContent.classList.add('hidden');
                previewContent.classList.remove('hidden');
                fileNameDisplay.textContent = file.name;
                nameInput.value = file.name;
                previewContainer.innerHTML = '';
                
                if (file.type === 'application/pdf') {
                    const pdfIcon = document.createElement('div');
                    pdfIcon.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'h-full');
                    pdfIcon.innerHTML = `
                        <svg class="w-16 h-16 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                    `;
                    previewContainer.appendChild(pdfIcon);
                } else {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = "Documento enviado";
                        img.classList.add('max-w-full', 'max-h-40', 'object-contain', 'mx-auto');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                defaultContent.classList.remove('hidden');
                previewContent.classList.add('hidden');
                nameInput.value = '';
            }
        });

        // Drag and drop
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
    }
});