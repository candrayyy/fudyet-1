const loader = document.querySelector(".loader");
const formResults = document.querySelector(".form-results");

function loadingPage() {
    setTimeout(() => {
        loader.style.opacity = 0;
        loader.style.display = "none";

        formResults.style.display = "block";
        setTimeout(() => (formResults.style.opacity = 1), 50);
    }, 4000);
}

loadingPage();
