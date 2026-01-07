<div id="search-idoso" tabindex="-1" aria-hidden="true" class="animate__animated animate__fadeInDown hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6xl max-h-full">
        <div class="relative bg-white border border-default rounded-lg shadow-sm p-4 md:p-6">            
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Digite informações do idoso para filtrar (ID, Nome, RG, Data de nascimento, Nº de Registro ou Telefone)
                </h3>
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="search-idoso">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="w-full max-w-6xl mx-auto m-10 flex flex-col gap-6">   
                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-id-idoso"
                    placeholder="Pesquisar pelo id do idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 teAntiguidadext-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>

                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-nome-idoso"
                    placeholder="Pesquisar pelo nome do idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>

                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-rg-idoso" oninput="formatRG(this)"
                    placeholder="Pesquisar pelo RG do Idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>

                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-num-reg-idoso"
                    placeholder="Pesquisar pelo nº de registro do idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>               

                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-nasc-idoso" oninput="formatDate(this)"
                    placeholder="Pesquisar pela data de nascimento do idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>

                <div class="relative">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </div>
                    <input type="search" id="input-phone-idoso" oninput="formatPhone(this)"
                    placeholder="Pesquisar pelo nº de telefone do idoso"
                    class="text-lg block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" />
                </div>

                <table id="table-idoso-body" class="w-full max-w-6xl text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800"></table>
            </form>
        </div>
    </div>
</div> 