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

const userBtn = document.getElementById("userBtn");
const staffBtn = document.getElementById("staffBtn");
const userForm = document.getElementById("userForm");
const staffForm = document.getElementById("staffForm");

function changeState(toShowForm, toHideForm, toShowBtn, toHideBtn) {
    toShowForm.classList.remove("hidden");
    toHideForm.classList.add("hidden");
    
    toShowBtn.classList.add("active");
    toHideBtn.classList.remove("active");
}

userBtn.addEventListener("click", function() {
    changeState(userForm, staffForm, userBtn, staffBtn);
})

staffBtn.addEventListener("click", function() {
    changeState(staffForm, userForm, staffBtn, userBtn);
})

// Signup LOGIC! 

const login = document.getElementById("login");
const signup = document.getElementById("signup");

function signupPage() {
    signup.classList.remove("hidden");
    login.classList.add("hidden");
}

function loginPage() {
    login.classList.remove("hidden");
    signup.classList.add("hidden");
}

window.signupPage = signupPage;
window.loginPage = loginPage;