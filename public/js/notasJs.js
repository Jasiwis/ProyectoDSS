document.addEventListener("DOMContentLoaded", function () {
    console.log("NotasJS está cargado correctamente");

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const btnCrearNota = document.getElementById("btnCrearNota");
    const modalCrear = document.getElementById("editModal");
    const overlay = document.getElementById("overlay");
    const btnGuardar = document.getElementById("btnModalGuardar");
    const btnCancelar = document.getElementById("btnModalCancelar");
    const notesGrid = document.getElementById("notesGrid");
    
    let editingNoteId = null;

    // Event Listeners
    btnCrearNota?.addEventListener("click", openCreateModal);
    btnCancelar?.addEventListener("click", () => closeModal("editModal"));
    btnGuardar?.addEventListener("click", saveNote);

    // Funciones mejoradas
    function openCreateModal(note = null) {
        if (!modalCrear) return;
        
        modalCrear.style.display = "block";
        overlay.style.display = "block";

        const modalTitle = document.getElementById("modalTitle");
        const tituloInput = document.getElementById("titulo");
        const contenidoInput = document.getElementById("contenido");
        const categoriaInput = document.getElementById("categoria");

        if (note) {
            modalTitle.textContent = "Editar Nota";
            tituloInput.value = note.titulo || "";
            contenidoInput.value = note.contenido || "";
            categoriaInput.value = note.categoria_id || "";
            editingNoteId = note.id;
        } else {
            modalTitle.textContent = "Crear Nueva Nota";
            tituloInput.value = "";
            contenidoInput.value = "";
            categoriaInput.value = "";
            editingNoteId = null;
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
            overlay.style.display = "none";
            editingNoteId = null; // Limpiar la variable al cerrar modal
        }
    }

  async function saveNote() {
    btnGuardar.disabled = true;
    
    const titulo = document.getElementById("titulo")?.value.trim();
    const contenido = document.getElementById("contenido")?.value.trim();
    const categoria_id = document.getElementById("categoria")?.value;

    if (!titulo || !contenido || !categoria_id) {
        showAlert("error", "Todos los campos son requeridos");
        btnGuardar.disabled = false;
        return;
    }

    try {
        const data = {
            accion: editingNoteId ? "actualizar" : "crear",
            titulo,
            contenido,
            categoria_id
        };

        // Añadir ID solo para edición
        if (editingNoteId) {
            data.id = editingNoteId;
        }

        const response = await fetch("/notas/crud", {  
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json"
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message || "Error en la operación");
        }

        showAlert("success", result.message);
        closeModal("editModal");
        await updateNotesList();
        
    } catch (error) {
        console.error("Error:", error);
        showAlert("error", error.message);
    } finally {
        btnGuardar.disabled = false;
        editingNoteId = null;
    }
}

    window.editNote = async function (id) {
    try {
        const response = await fetch(`/notas/get?id=${id}`, {
            headers: { "Accept": "application/json" }
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.error || "Error obteniendo la nota");
        }

       
        openCreateModal({
            id: result.nota.id,
            titulo: result.nota.titulo,
            contenido: result.nota.contenido,
            categoria_id: result.nota.categoria_id
        });
    } catch (error) {
        console.error("Error:", error);
        showAlert("error", error.message);
    }
};

    window.deleteNote = async function (id) {
        if (!confirm("¿Estás seguro de que deseas eliminar esta nota?")) return;

        try {
            const response = await fetch("/notas/crud", {
                method: "POST",
                headers: { 
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    accion: "eliminar",
                    id: id
                }),
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.error || "Error eliminando la nota");
            }

            showAlert("success", result.message);
            updateNotesList();
        } catch (error) {
            console.error("Error:", error);
            showAlert("error", error.message);
        }
    };

    // Funciones auxiliares
    function showAlert(type, message) {
        alert(`${type.toUpperCase()}: ${message}`);
    }

    async function updateNotesList() {
        try {
            const response = await fetch("/notas");
            const html = await response.text();
            
            // Actualiza solo la parte necesaria del DOM
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, "text/html");
            const newNotesGrid = doc.getElementById("notesGrid");
            
            if (newNotesGrid) {
                notesGrid.innerHTML = newNotesGrid.innerHTML;
            }
        } catch (error) {
            console.error("Error actualizando notas:", error);
        }
    }
});
