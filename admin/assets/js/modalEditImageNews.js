document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('[id^="edit-news-"]').forEach(modal => {
        const newsId = modal.id.split('-')[2];
        
        // Input da imagem principal
        const mainImageInput = modal.querySelector('#dropzone-file-main-news');
        const mainImagePreview = modal.querySelector('#main-image-preview');

        if (mainImageInput) {
            mainImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {

                        mainImagePreview.innerHTML = `
                            <div class="mb-6 w-full">
                                <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem Principal</h2>
                                <div class="flex justify-center">
                                    <img src="${event.target.result}" 
                                         alt="Pré-visualização da nova imagem"
                                         class="max-w-full max-h-40 object-contain rounded-lg shadow-md">
                                </div>
                            </div>
                        `;

                        const fileNameInput = modal.querySelector('input[name="name-img-file-main"]');
                        if (fileNameInput) {
                            fileNameInput.value = file.name;
                        }
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
        }

        // Input da imagem do conteúdo
        const contentImageInput = modal.querySelector('#dropzone-file-content-news');
        const contentImagePreview = modal.querySelector('#image-preview-content');

        if (contentImageInput) {
            contentImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {

                        contentImagePreview.innerHTML = `
                            <div class="mb-6 w-full">
                                <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem do conteúdo</h2>
                                <div class="flex justify-center">
                                    <img src="${event.target.result}" 
                                         alt="Pré-visualização da nova imagem"
                                         class="max-w-full max-h-40 object-contain rounded-lg shadow-md">
                                </div>
                            </div>
                        `;

                        const fileNameInput = modal.querySelector('input[name="name-img-file-content"]');
                        if (fileNameInput) {
                            fileNameInput.value = file.name;
                        }
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
        }
        
    })

})