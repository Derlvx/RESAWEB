// Si un input a été toucher et que l'utilisateurs veut reload la page on envoie ce message
const beforeUnloadListener = (event) => {
    event.preventDefault();
    return event.returnValue = "Are you sure you want to exit?";
};

// Permet de faire un addEvent listener sur tout les inputs d'une page
const Input = document.querySelectorAll("input");

for (let i = 0; i < Input.length; i++) {
    Input[i].addEventListener("input", (event) => {
        if (event.target.value !== "") {
            addEventListener("beforeunload", beforeUnloadListener, { capture: true });
        } else {
            removeEventListener("beforeunload", beforeUnloadListener, { capture: true });
        }
    });
}