<div
  class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">

  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Todas as Notícias</h1>
  </div>
  
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
      <?php for($x=0 ; $x < 6 ; $x++): ?>
      <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
        <a href="#" class="block overflow-hidden">
          <img class="w-full h-48 object-cover"
            src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg"
            alt="aaaaa" />
        </a>
        <div class="p-5">
          <a href="#">
            <h5 class="mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 line-clamp-2">Título das Notícias 2021 Lacoste</h5>
          </a>
          <p class="mb-3 text-sm lg:text-base text-justify text-gray-900 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi nemo numquam autem ex beatae mollitia impedit quo. Doloremque alias sapiente provident amet vero laboriosam fuga dolor cumque odio minus.</p>
          <a href="#"
            class="uppercase w-40 flex items-center justify-center m-auto px-3 py-2 text-sm font-bold text-center text-black bg-yellow-500 rounded-lg hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-400 duration-75">
            Saiba mais 
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
  
  <nav aria-label="Page navigation example">
    <ul class="flex md:flex-row items-center -space-y-px md:space-x-1 md:space-y-0 p-10 h-auto text-base justify-center">
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-md hover:bg-yellow-200 duration-150">
          <span class="sr-only">Previous</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </a>
      </li>
        <?php for($x=0 ; $x < 10 ; $x++): ?>
          <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-yellow-200 duration-150"><?= $x + 1 ?></a>
          </li>
        <?php endfor;?>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-900 bg-gray-100 border border-gray-300 rounded-e-md hover:bg-yellow-200 duration-150">
          <span class="sr-only">Next</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>
    </ul>
  </nav>

</div>


