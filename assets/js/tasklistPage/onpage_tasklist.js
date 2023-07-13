const btnPage = document.getElementById("btnPage");
const btns = btnPage.getElementsByClassName("btn");
for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        const current = btnPage.getElementsByClassName("active");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" active", "");
        }
        this.className += " active";
    });
}