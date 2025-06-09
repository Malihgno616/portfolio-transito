<div
  class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias Recentes</h1>
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
          <button data-modal-target="default-modal" data-modal-toggle="default-modal" 
          class="uppercase flex items-center m-auto font-bold text-black bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer duration-75" type="button">
            Ler mais
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </button>
        </div>
      </div>
      <!-- Main modal -->
      <div id="default-modal" tabindex="-1" aria-hidden="true" class="animate__animated animate__fadeInDown hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-xl max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow-sm">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                      <h2 class="text-2xl text-center font-semibold text-gray-900">
                          Detalhes da Notícia
                      </h2>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-4 md:p-5 space-y-4">
                      <h2 class="text-2xl text-center font-semibold text-gray-900">
                          Título da notícia
                      </h2>
                      <a href="#" class="block overflow-hidden">
                        <img class="w-full h-48 object-cover"
                          src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg"
                          alt="aaaaa" />
                      </a>
                      <p class="text-base text-justify leading-relaxed text-gray-500">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto atque, officia, dolore dignissimos eius doloremque magni exercitationem, esse eaque nostrum eligendi officiis numquam similique molestias adipisci voluptate optio? Reprehenderit, doloremque?
                      </p>
                      <p class="text-base text-justify leading-relaxed text-gray-500">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias delectus eum perspiciatis vero perferendis adipisci laborum sit minus ratione dignissimos, libero quis tenetur nihil, quod labore neque dolor, suscipit sint?
                          Animi, magnam voluptatum! Voluptate ipsa eaque dicta nemo nam consectetur, animi quia, dolorem iure ab ratione quos sed ad incidunt necessitatibus doloremque laborum quae, tempora hic temporibus inventore error quo!
                      </p>
                  </div>

              </div>
          </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="flex items-center justify-center mt-5 -space-x-px h-10 text-base">

      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
          <span class="sr-only">Previous</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </a>
      </li>

      <?php for($x= 1; $x <= 10 ; $x++): ?>
        <li>
          <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 "><?= $x?></a>
        </li>
      <?php endfor; ?>

      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
          <span class="sr-only">Next</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>

    </ul>
  </nav>
</div>
