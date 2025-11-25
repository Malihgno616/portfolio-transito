const sliderEdit1 = document.getElementById("edit-slider-1");
const sliderEdit2 = document.getElementById("edit-slider-2");
const sliderEdit3 = document.getElementById("edit-slider-3");

const preview1 = document.getElementById("preview-1");
const preview2 = document.getElementById("preview-2");
const preview3 = document.getElementById("preview-3");

sliderEdit1.addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview1.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

sliderEdit2.addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview2.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

sliderEdit3.addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview3.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});