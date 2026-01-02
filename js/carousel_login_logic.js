// Carousel LOGIC! 

const slides = document.querySelectorAll(".carousel-slide");
const indicators = document.querySelectorAll(".carousel-indicator");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let currentIndex = 0;
let setAutoTimer;

function updateCarousel(index) {
    document.querySelector(".carousel-slide.active").classList.remove("active");
    document.querySelector(".carousel-indicator.current-slide").classList.remove("current-slide");

    slides[index].classList.add("active");
    indicators[index].classList.add("current-slide");

    currentIndex = index;
    resetTimer();
}

function resetTimer() {
    clearInterval(setAutoTimer);
    setAutoTimer = setInterval(nextSlideLogic, 5000);
}

function nextSlideLogic() {
    let nextPoint = ((currentIndex + 1) % slides.length);
    updateCarousel(nextPoint);
}

nextBtn.addEventListener("click", nextSlideLogic)

prevBtn.addEventListener("click", () => {
    let prevPoint = (currentIndex - 1 + slides.length) % slides.length;
    updateCarousel(prevPoint);
});

indicators.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        updateCarousel(index);
    })
})

resetTimer();

// Login LOGIC! 