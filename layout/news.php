<div class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias em Destaque</h1>
  </div>
  <div class="max-w-7xl mx-auto"> 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
      <?php for($x=0 ; $x < 6 ; $x++): ?>
        <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
          <a href="#" class="block overflow-hidden">
              <img class="w-full h-48 object-cover" src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg" alt="aaaaa" />
          </a>
          <div class="p-5">
              <a href="#">
                  <h5 class="mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 line-clamp-2">Noteworthy technology acquisitions 2021</h5>
              </a>
              <p class="mb-3 text-sm lg:text-base text-gray-900 line-clamp-3">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
              <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                  Read more
                  <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                  </svg>
              </a>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>