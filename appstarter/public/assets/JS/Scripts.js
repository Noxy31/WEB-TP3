document.addEventListener("DOMContentLoaded", function() {
    const text = document.querySelector(".name");
    const strText = text.textContent;
    const splitText = strText.split("");
    text.textContent = "";
    for (let i = 0; i < splitText.length; i++) {
        text.innerHTML += "<span>" + splitText[i] + "</span>";
    }

    let char = 0;
    let timer = setInterval(onTick, 200);

    function onTick() {
        const span = text.querySelectorAll("span")[char];
        span.classList.add('fade');
        char++;
        if (char === splitText.length) {
            complete();
            return;
        }
    }

    function complete() {
        clearInterval(timer);
        timer = null;
    }
});

// document.getElementById("enterButton").addEventListener("click", function (event) {
//    event.preventDefault();
//    
//    document.body.classList.add("fadeOut");
//
//    setTimeout(function () {
//        window.location.href = event.target.href;
//    }, 1000);
//}); 