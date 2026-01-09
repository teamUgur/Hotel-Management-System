const pageBtns = document.querySelectorAll(".page-btn");
const activeBtn = document.querySelector(".active");

pageBtns.forEach(button => {
    button.addEventListener("mouseenter", function() {
        activeBtn.classList.remove("active");
        button.classList.add("active");
    })
})