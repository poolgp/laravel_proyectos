let dragged = null;

let tareas = document.getElementsByClassName("draggable");

tareas.addEventListener("dragstart", (event) => {
    // almacenar una ref. en el elemento arrastrado
    dragged = event.target;
});

const target = document.getElementById("droptarget");

target.addEventListener("dragover", (event) => {
    // impedir el valor predeterminado para permitir soltar
    event.preventDefault();
});

target.addEventListener("drop", (event) => {
    // impedir la acción predeterminada (abrir como enlace para algunos elementos)
    event.preventDefault();
    // mover el elemento arrastrado al destino de colocación seleccionado
    if (event.target.className === "dropzone") {
        dragged.parentNode.removeChild(dragged);
        event.target.appendChild(dragged);
    }
});
