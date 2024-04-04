const text = document.querySelector(".name");
const strText = text.textContent; // Recupere le texte dans le h1
const splitText = strText.split(""); // Split le texte en lettres individuels
text.textContent = "";
for(let i=0; i < splitText.length; i++){ // On crée un span de chaques lettres individuelles de la longueur des mots
    text.innerHTML += "<span>" + splitText[i] + "</span>";
}

let char = 0;
let timer = setInterval(onTick, 200); // Timer pour implémenter les lettres toutes les 50 millisecondes

function onTick(){
    const span = text.querySelectorAll("span")[char];
    span.classList.add('fade'); // On utilise la fonction de CSS fade
    char++ // Permet de looper l'implémentation dans la fonction fade, lettre aprés lettre
    if(char === splitText.length){ // Si on atteint la longueur du nombre de lettres on appel la fonction 'complete'
        complete();
        return;
    }
}

function complete(){ // Clear le timer et le met sur "null" quand toutes les lettres on été implémenté
    clearInterval(timer);
    timer = null;
}