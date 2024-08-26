const slides = document.querySelector('.slides');
        const slideCount = document.querySelectorAll('.slide').length;
        let index = 0;

        document.getElementById('next').addEventListener('click', () => {
            index = (index + 1) % slideCount;
            slides.style.transform = `translateX(-${index * 100}%)`;
        });

        document.getElementById('prev').addEventListener('click', () => {
            index = (index - 1 + slideCount) % slideCount;
            slides.style.transform = `translateX(-${index * 100}%)`;
        });