<footer class="shadow-sm bg-gray-500">
    <div class="w-full max-w-screen-xl mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <div class="flex items-center space-x-3">
                <img src="assets/img/logo-borda-branca.png" class="h-14 md:h-16" alt="Logo" />
                <div class="flex flex-col">
                    <span class="italic text-xl md:text-2xl text-white font-semibold">Administrativo</span>
                    <span class="text-xs text-gray-300">Painel de Controle</span>
                </div>
            </div>

            <a href="../" 
               class="text-sm md:text-base text-white hover:text-gray-200 hover:underline transition-colors duration-300">
                ← Voltar ao site principal
            </a>
        </div>

        <hr class="my-4 md:my-6 border-t border-gray-400/30" />

        <div class="text-center">
            <p class="text-sm text-gray-200">
                ©<?= date("Y") ?> 
                <a href="home.php" class="text-white hover:underline">
                    Trânsito Leme
                </a>
                <span class="hidden md:inline"> - Todos os direitos reservados</span>
            </p>
        </div>
    </div>
</footer>