const txtAnim = document.getElementById("typewriter");

new Typewriter(txtAnim, {
    loop: true,
    deleteSpeed: 15
}).changeDelay(40)
.typeString("Le café, une boisson pour ")
.typeString("<span id='color_typewriter' class='px-2'>les plus jeunes.</span>").pauseFor(1000).deleteChars(21)
.typeString("<span id='color_typewriter' class='px-2'>ou pour les plus agés.</span>").pauseFor(1000).deleteChars(23)
.typeString("<span id='color_typewriter' class='px-2'>pour tout le monde ! </span>").pauseFor(5000)
.start();