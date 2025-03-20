document.addEventListener("DOMContentLoaded", function () {
    console.log("NotasJS está cargado correctamente");

    // Referencias a elementos
    let btnCrearNota = document.querySelector(".btn-primary");
    let modalCrear = document.getElementById("editModal");
    let overlay = document.getElementById("overlay");
    let btnGuardar = document.querySelector("#editModal .btn-primary");
    let btnCancelar = document.querySelector("#editModal .btn-secondary");
    let notesGrid = document.getElementById("notesGrid");

    // Evento para abrir el modal de creación
    if (btnCrearNota) {
        btnCrearNota.addEventListener("click", function () {
            openCreateModal();
        });
    }

    // Evento para cerrar el modal de creación
    if (btnCancelar) {
        btnCancelar.addEventListener("click", function () {
            closeModal("editModal");
        });
    }

    // Evento para guardar una nota
    if (btnGuardar) {
        btnGuardar.addEventListener("click", function () {
            saveNote();
        });
    }

    // Función para abrir el modal de creación de notas
    function openCreateModal() {
        if (modalCrear && overlay) {
            modalCrear.style.display = "block";
            overlay.style.display = "block";
            document.getElementById("modalTitle").textContent = "Crear Nueva Nota";
            document.getElementById("noteTitle").value = "";
            document.getElementById("noteContent").value = "";
        } else {
            console.log("No se encontró el modal de creación");
        }
    }

    // Función para cerrar un modal
    function closeModal(modalId) {
        let modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
            overlay.style.display = "none";
        }
    }

    // Función para guardar una nota
    function saveNote() {
        let title = document.getElementById("noteTitle").value.trim();
        let content = document.getElementById("noteContent").value.trim();

        if (title === "" || content === "") {
            alert("El título y el contenido no pueden estar vacíos.");
            return;
        }

        let newNote = document.createElement("div");
        newNote.classList.add("note-card");
        newNote.innerHTML = `
            <h3>${title}</h3>
            <p>${content}</p>
            <button class="btn btn-secondary" onclick="editNote(this)">Editar</button>
            <button class="btn btn-danger" onclick="deleteNote(this)">Eliminar</button>
        `;

        notesGrid.appendChild(newNote);
        closeModal("editModal");
    }

    // Función para editar una nota
    window.editNote = function (button) {
        let noteCard = button.parentElement;
        let title = noteCard.querySelector("h3").textContent;
        let content = noteCard.querySelector("p").textContent;

        document.getElementById("noteTitle").value = title;
        document.getElementById("noteContent").value = content;
        document.getElementById("modalTitle").textContent = "Editar Nota";

        openCreateModal();

        // Eliminar la nota original al editarla
        noteCard.remove();
    };

    // Función para eliminar una nota
    window.deleteNote = function (button) {
        if (confirm("¿Estás seguro de que deseas eliminar esta nota?")) {
            button.parentElement.remove();
        }
    };
});
