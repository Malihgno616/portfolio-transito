<div class="flex justify-between items-center max-w-4xl mx-auto mb-5">
    <h1 class="text-5xl text-center">Sliders</h1>
    <a href="home.php" class="text-xl text-center px-6 py-3 rounded-lg bg-yellow-600 text-white hover:bg-yellow-500 duration-150 transition-colors">Voltar</a>
</div>
<hr>
<?php 
    if (isset($_SESSION['alert-upload'])) {
        echo $_SESSION['alert-upload'];
        unset($_SESSION['alert-upload']);
    } 
?>
<div class="animate__animated animate__fadeIn p-10 m-10 rounded-xl">

    <div class="mb-8 p-6 border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-300">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Editar Slider Nº de Telefone</h1>
        <form id="edit-slider-1" action="change-slider.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <div class="w-[1400px] max-w-full h-[400px] m-auto mb-4 overflow-hidden">
                <img id="preview-1" src="../assets/img/img-slider7.jpg" alt="Slider Numero Whatsapp" class="object-cover mb-4 border border-gray-300 bg-gray-100">
            </div>
            
            <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" name="slider-1" type="file">

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                Editar
            </button>
        </form>
    </div>
    
    <div class="mb-8 p-6 border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-300">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Editar Slider Indicação de Condutor</h1>
        <form id="edit-slider-2" action="change-slider.php" method="post" enctype="multipart/form-data" class="space-y-4">

            <div class="w-[1400px] max-w-full h-[400px] m-auto mb-4 overflow-hidden">
                <img id="preview-2" src="../assets/img/img-slider8.jpg" alt="Slider Indicação Condutor" class="w-full h-94 object-cover mb-4 border border-gray-300 bg-gray-100">
            </div>
            
            <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="edit-slider-2" name="slider-2" type="file">
            
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                Editar
            </button>
        </form>
    </div>
    
    <div class="mb-8 p-6 border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-300">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Editar Slider Vagas Especiais</h1>
        <form id="edit-slider-3" action="" method="post" enctype="multipart/form-data" class="space-y-4">

            <div class="w-[1400px] max-w-full h-[400px] m-auto mb-4 overflow-hidden">
                <img id="preview-3" src="../assets/img/img-slider9.jpg" alt="Slider Vagas Especiais" class="w-full h-94 object-cover mb-4 border border-gray-300 bg-gray-100">
            </div>

            <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="edit-slider-3" name="slider-3" type="file">

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                Editar
            </button>
        </form>
    </div>

</div>
