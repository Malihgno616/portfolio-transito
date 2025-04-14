
<div class="min-h-[15vh] md:min-h-[40vh] w-full flex flex-col items-center bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito03.png)] bg-no-repeat bg-cover bg-fixed md:bg-right bg-center shadow-4xl">
    <div class="m-auto flex flex-col justify-center items-center gap-4 sm:gap-8 py-10 border-1 rounded-lg p-10">
      <h1 class="text-3xl sm:text-4xl md:text-5xl text-gray-100 text-center font-bold">
        Coordenadoria de Trânsito
      </h1>
      <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-100 text-center">
        Horário de Atendimento: 8:00 às 16:00 de segunda à sexta.
      </h2>
      <p class="text-base sm:text-lg md:text-xl italic text-gray-100 text-center">
        <?=$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"?>
      </p>
    </div>
</div>