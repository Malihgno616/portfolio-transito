document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[id^="edit-user-"]').forEach(modal => {
        const userId = modal.id.split('-')[2];
        
        // Input da imagem do usuário
        const userImageInput = modal.querySelector(`#dropzone-file-user-${userId}`);
        const userImagePreview = modal.querySelector(`#user-image-preview-${userId}`);
        const fileNameInput = modal.querySelector('input[name="name-img-file-user"]');

        if (userImageInput) {
            userImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        userImagePreview.innerHTML = `
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
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
        }
    });
});