document.addEventListener('DOMContentLoaded', function() {
    // Função para lidar com a mudança de imagem
    function handleImageChange(input, previewId, fileNameInput) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const previewContainer = document.getElementById(previewId);
                if (previewContainer) {
                    previewContainer.innerHTML = `
                        <div class="flex flex-col items-center justify-center w-full h-full space-y-1">
                            <h2 class="text-xs font-bold text-gray-600 text-center">Pré-visualização</h2>
                            <div class="flex items-center justify-center w-full h-full">
                                <img src="${event.target.result}" 
                                    alt="Imagem do usuário"
                                    class="max-w-full max-h-24 object-contain rounded-full">
                            </div>
                        </div>
                    `;

                    if (fileNameInput) {
                        fileNameInput.value = file.name;
                    }
                }
            };
            
            reader.readAsDataURL(file);
        }
    }

    // Adiciona event listeners para todos os inputs de imagem
    document.querySelectorAll('input[id^="dropzone-file-edit-user-"]').forEach(input => {
        const userId = input.id.split('-').pop();
        const previewId = `edit-user-image-preview-${userId}`;
        const fileNameInput = input.closest('.relative').querySelector('input[name="name-img-file-user"]');
        
        input.addEventListener('change', function() {
            handleImageChange(this, previewId, fileNameInput);
        });
    });

    // Alternativa: Delegation de eventos (mais robusta)
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id && e.target.id.startsWith('dropzone-file-edit-user-')) {
            const userId = e.target.id.split('-').pop();
            const previewId = `edit-user-image-preview-${userId}`;
            const fileNameInput = e.target.closest('.relative').querySelector('input[name="name-img-file-user"]');
            
            handleImageChange(e.target, previewId, fileNameInput);
        }
    });
});