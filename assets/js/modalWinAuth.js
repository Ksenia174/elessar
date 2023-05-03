export function modalWindowFunctionAuth() {
    let modalWrapper = document.querySelector(".modal-wrapper-auth");
    let btnModalClose = document.querySelector(".modal__close-auth");
    let auth = document.querySelector('.a-auth');


    function closeModal() {
        modalWrapper.style.display = "none";
    }

    modalWrapper.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) {
            closeModal();
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.code === "Escape") {
            closeModal();
        }
    });

    btnModalClose.onclick = function () {
        closeModal();
    };

    if (auth != null) {
        auth.addEventListener("click", (e) => {
            modalWrapper.style.display = "block";
        });
    }
}
