document.getElementById('dropzone-img-news').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const defaultContent = document.getElementById('default-content-news');
  const previewContent = document.getElementById('preview-content-news');
  const imagePreview = document.getElementById('news-image-preview');
  const fileNameDisplay = document.getElementById('news-file-name');
  const hiddenInput = document.getElementById('nome-aqv-news');
  
  if (file) {
    if (file.type.match('image.*')) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        console.log('Imagem carregada');

        defaultContent.style.display = 'none';
        previewContent.style.display = 'flex';

        imagePreview.innerHTML = '';

        const img = document.createElement('img');
        img.src = e.target.result;
        img.className = 'max-h-40 max-w-full rounded-lg object-contain';
        img.alt = 'Preview da imagem';

        imagePreview.appendChild(img);
        
        fileNameDisplay.textContent = file.name;

        hiddenInput.value = file.name;
        
        console.log('Preview atualizado'); 
      }
      
      reader.onerror = function(error) {
        console.error('Erro ao ler arquivo:', error);
        alert('Erro ao carregar a imagem. Tente novamente.');
      }
      
      reader.readAsDataURL(file);
    } else {
      alert('Por favor, selecione um arquivo de imagem (PNG ou JPG/JPEG)');
      e.target.value = '';
      defaultContent.style.display = 'flex';
      previewContent.style.display = 'none';
      hiddenInput.value = '';
    }
  } else {
    defaultContent.style.display = 'flex';
    previewContent.style.display = 'none';
    hiddenInput.value = '';
  }
});