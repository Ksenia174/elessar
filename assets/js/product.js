document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", async (event) => {
        if (event.target.classList.contains("add-in-basket")) {
            let id = event.target.dataset.btnId;
            await postJSON("/app/tables/basket/save.basket.php", id, 'add');
        }
    });
})