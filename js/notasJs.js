document.addEventListener("DOMContentLoaded", function () {
    console.log("NotasJS está cargado correctamente");

    // Referencias a elementos
    let btnCrearNota = document.getElementById("btnCrearNota");
    let modalCrear = document.getElementById("editModal");
    let overlay = document.getElementById("overlay");
    let btnGuardar = document.getElementById("btnModalGuardar");
    let btnCancelar = document.getElementById("btnModalCancelar");
    let notesGrid = document.getElementById("notesGrid");
    
    let editingNoteId = null; // Para manejar ediciones

    // Evento para abrir el modal de creación
    btnCrearNota.addEventListener("click", function () {
        openCreateModal();
    });

    // Evento para cerrar el modal
    btnCancelar.addEventListener("click", function () {
        closeModal("editModal");
    });

    // Evento para guardar o actualizar una nota
    btnGuardar.addEventListener("click", function () {
        saveNote();
    });

    // Función para abrir el modal de creación de notas
    function openCreateModal(note = null) {
        modalCrear.style.display = "block";
        overlay.style.display = "block";

        if (note) {
            document.getElementById("modalTitle").textContent = "Editar Nota";
            document.getElementById("titulo").value = note.titulo;
            document.getElementById("contenido").value = note.contenido;
            document.getElementById("categoria").value = note.categoria_id;
            editingNoteId = note.id;
        } else {
            document.getElementById("modalTitle").textContent = "Crear Nueva Nota";
            document.getElementById("titulo").value = "";
            document.getElementById("contenido").value = "";
            document.getElementById("categoria").value = "";
            editingNoteId = null;
        }
    }

    // Función para cerrar el modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
        overlay.style.display = "none";
    }

    // Función para guardar o actualizar una nota
    function saveNote() {
        let titulo = document.getElementById("titulo").value.trim();
        let contenido = document.getElementById("contenido").value.trim();
        let categoria_id = document.getElementById("categoria").value;

        if (!titulo || !contenido) {
            alert("El título y el contenido no pueden estar vacíos.");
            return;
        }

        let accion = editingNoteId ? "actualizar" : "crear";
        let formData = new URLSearchParams();
        formData.append("accion", accion);
        if (editingNoteId) formData.append("id", editingNoteId);
        formData.append("titulo", titulo);
        formData.append("contenido", contenido);
        formData.append("categoria_id", categoria_id);

        fetch("/ProyectoDSS/php/notas_crud.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: formData.toString(),
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        })
        .catch(error => console.error("Error:", error));
    }

    // Función para editar una nota
    window.editNote = function (id) {
        fetch(`/ProyectoDSS/php/get_nota.php?id=${id}`)
            .then(response => response.json())
            .then(note => {
                openCreateModal(note);
            })
            .catch(error => console.error("Error obteniendo la nota:", error));
    };

    // Función para eliminar una nota
    window.deleteNote = function (id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta nota?")) {
            let formData = new URLSearchParams();
            formData.append("accion", "eliminar");
            formData.append("id", id);

            fetch("/ProyectoDSS/php/notas_crud.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: formData.toString(),
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(error => console.error("Error:", error));
        }
    };
});
