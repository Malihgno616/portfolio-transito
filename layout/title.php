<div class="min-h-[15vh] md:min-h-[40vh] w-full flex flex-col items-center bg-stone-800 shadow-lg">
    <div class="m-auto flex flex-col justify-center items-center gap-4 sm:gap-8 py-10 p-10">
      <h1 class="text-3xl sm:text-4xl md:text-5xl text-white text-center font-bold">
        Coordenadoria de Trânsito
      </h1>
      <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-white text-center">
        Horário de Atendimento: 8:00 às 16:00 de segunda à sexta.
      </h2>
      <p class="text-base sm:text-lg md:text-xl italic text-white text-center">
        <?=$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"?>
      </p>
    </div>
</div>