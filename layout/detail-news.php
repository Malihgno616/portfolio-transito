<?php foreach($noticiaDetalhada as $index => $noticiaDetalhe):?>
<div class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
    <div class="p-10">
        <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Detalhe da Notícia</h1>
    </div>
    <div class="animate__animated animate__fadeInDown bg-gray-100 rounded-md p-5 flex flex-col items-center justify-center gap-3">
        <div class="w-full">
            <img class="animate__animated animate__fadeIn w-72 p-2 m-auto" src="display-news-img?id=<?= $noticiaDetalhe['id_noticia']?>&type=main" alt="Img notícia principal">
            <h1 class="text-5xl font-light mb-3 text-center"><?= $noticiaDetalhe['titulo_principal']?></h1>
            <h2 class="text-3xl font-light mb-2 text-center"><?= $noticiaDetalhe['subtitulo_principal']?></h2>
            <hr>
        </div>
        <div class="w-full">
            <img class="animate__animated animate__fadeIn w-72 p-2 m-auto" src="display-news-img?id=<?= $noticiaDetalhe['id_noticia']?>&type=content" alt="Img conteúdo da notícia">
            <h1 class="text-5xl mb-3 text-center"><?= $noticiaDetalhe['titulo_conteudo']?></h1>
            <h2 class="text-3xl mb-2 text-center"><?= $noticiaDetalhe['subtitulo_conteudo']?></h2>
            <div class="w-46 p-5 m-auto flex justify-center">
                <p class="text-justify text-xl"><?= $noticiaDetalhe['texto']?></p>
            </div>
            <hr>
        </div>
    </div>
    <div class="m-10 flex justify-center ">
        <a class="text-black font-bold text-xl p-2 rounded-md bg-yellow-500 hover:bg-yellow-200 duration-75" href="noticias">Voltar</a>
    </div>
</div>
<?php endforeach;?>