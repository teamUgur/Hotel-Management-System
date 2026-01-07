const bookBox = document.getElementById('guestdetailpanel');
const bookBtns = document.querySelectorAll(".bookbtn");
const closeBtn = document.getElementById("closeBtn");

bookBtns.forEach(button => {
    button.addEventListener("click", () => {
        bookBox.style.display = "flex";
    })
})

closeBtn.addEventListener("click", function() {
    bookBox.style.display = "none";
})

bookBox.addEventListener("click", function(event) {
    if (event.target === bookBox) {
        bookBox.style.display = "none";
    }
})