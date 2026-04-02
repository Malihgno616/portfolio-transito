<?php foreach($noticiaDetalhada as $index => $noticiaDetalhe):?>
<div class="shadow-lg bg-stone-500 bg-blend-multiply p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8" style="background-image: url('assets/img/imgtransito-compressed.jpg');">
    <div class="p-10">
        <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Detalhe da Notícia</h1>
    </div>
    <div class="animate__animated animate__fadeIn bg-white rounded-sm max-w-4xl p-5 flex flex-col items-center justify-center gap-3 m-auto">
        <div class="w-full">
            <img class="w-60 h-60 p-2 m-auto" src="display-news-img?id=<?= $noticiaDetalhe['id']?>&type=main" alt="Img notícia principal">
            <div class="ql-container ql-snow flex-1" style="border: none;">
              <div class="ql-editor p-3" style="height: 100%;">
                  <?= $noticiaDetalhe['conteudo'] ?>
              </div>
            </div>
        </div>
        
    </div>
    <div class="m-10 flex justify-center ">
        <a class="text-black font-bold text-xl p-2 rounded-md bg-yellow-500 hover:bg-yellow-200 duration-75" href="noticias">Voltar</a>
    </div>
</div>
<?php endforeach; ?>