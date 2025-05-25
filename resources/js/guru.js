const guruDeleteModal = document.querySelectorAll(".guru-delete-modal");
const guruEditModal = document.querySelectorAll(".guru-update-modal");
const guruTargetEdit = document.getElementById("guru-edit-target-modal");

const guruOptions = {
    placement: "bottom-right",
    backdrop: "dynamic",
    backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
    closable: true,
};

// instance options object
const guruInstanceOptions = {
    id: "guru-edit-target-modal",
    override: true,
};
const modal = new Modal(guruTargetEdit, guruOptions, guruInstanceOptions);

guruTargetEdit
    .querySelector("[data-modal-hide='guru-edit-target-modal']")
    .addEventListener("click", function () {
        modal.hide();
    });

guruEditModal.forEach((element) => {
    element.addEventListener("click", async function () {
        const id = this.getAttribute("data-id");

        const nama = modal._targetEl.querySelector("#nama");
        const umur = modal._targetEl.querySelector("#umur");
        const mapel = modal._targetEl.querySelector("#mapel");
        const nip = modal._targetEl.querySelector("#nip");
        const jenkel = modal._targetEl.querySelector("#jenkel");

        const action = modal._targetEl.querySelector("form");
        action.setAttribute("action", id);

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
        mapel.value = data.mapel;
        nip.value = data.nip;
        jenkel.value = data.jenkel;
        modal.show();
    });
});

guruDeleteModal.forEach((n) => {
    n.addEventListener("click", function () {
        const id = this.getAttribute('data-id');

        const guruForm = document.querySelector('#guru-modal > form');

        guruForm.setAttribute('action',id);
    });
});
