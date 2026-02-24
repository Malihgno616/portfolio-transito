<form class="w-full max-w-6xl mx-auto m-10 flex flex-col gap-6">   
    <?php 
        if(isset($_SESSION['news-alert'])) {
            echo $_SESSION['news-alert'];
            unset($_SESSION['news-alert']);
        }
    ?>

    <div class="relative">
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
        </div>
        <input type="search" id="input-search"
        placeholder="Pode pesquisar pelo Título, Sub-título, Título do conteúdo, Sub-título do conteúdo e o Texto"
        class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
    </div>   

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table-news-body"></table>
    </div>
    
</form>