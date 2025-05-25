const deleteModal = document.querySelector(".delete-modal");
const editModal = document.querySelectorAll(".update-modal");
const targetEdit = document.getElementById("edit-target-modal");

const options = {
    placement: "bottom-right",
    backdrop: "dynamic",
    backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
    closable: true,
};

// instance options object
const instanceOptions = {
    id: "edit-target-modal",
    override: true,
};
const modal = new Modal(targetEdit, options, instanceOptions);

targetEdit.querySelector("[data-modal-hide='edit-target-modal']").addEventListener("click", function () {
        modal.hide();
});

editModal.forEach((element) => {
    element.addEventListener("click", async function () {
        const id = this.getAttribute('data-id');

        const nama = modal._targetEl.querySelector("#nama");
        const umur = modal._targetEl.querySelector("#umur");
        const kelas = modal._targetEl.querySelector("#kelas");
        const jenkel = modal._targetEl.querySelector("#jenkel");

        const action = modal._targetEl.querySelector('form');
        action.setAttribute('action',id);

        const data = await fetch(id, {
            method: "GET",
            headers: {
                Accept: "application/json",
            },
        })
            .then((res) => res.json())
            .then((res) => {
                return res;
            });
        nama.value = data.nama;
        umur.value = data.umur;
        kelas.value = data.kelas;
        jenkel.value = data.jenkel;
        modal.show();
    });
});

deleteModal.addEventListener("click", function () {
    const id = this.value;

    const modal = document.querySelector("#popup-modal > form");
    modal.setAttribute("action", id);
});
