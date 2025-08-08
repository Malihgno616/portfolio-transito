 document.getElementById('dropzone-file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('image-preview');
    const dropzone = this.closest('label'); // Pega o elemento label que contém todo o dropzone
    const imageInput = document.querySelector('input[name="image"]');
    const textElements = dropzone.querySelectorAll('svg, p'); // Seleciona o ícone e os textos
    
    // Limpa a pré-visualização anterior
    preview.innerHTML = '';
    
    if (file) {
      if (file.type.match('image.*')) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          // Esconde os elementos de texto
          textElements.forEach(el => el.classList.add('hidden'));
          
          // Cria a imagem de pré-visualização
          const img = document.createElement('img');
          img.src = e.target.result;
          img.className = 'max-h-48 max-w-full rounded-lg';
          preview.appendChild(img);
          
          // Atualiza o campo de texto com o nome do arquivo
          imageInput.value = file.name;
        }
        
        reader.readAsDataURL(file);
      } else {
        alert('Por favor, selecione um arquivo de imagem (PNG ou JPG/JPEG)');
        e.target.value = ''; // Limpa o input
        
        // Garante que os textos fiquem visíveis novamente se o arquivo for inválido
        textElements.forEach(el => el.classList.remove('hidden'));
      }
    } else {
      // Se não houver arquivo, mostra os textos novamente
      textElements.forEach(el => el.classList.remove('hidden'));
    }
  });