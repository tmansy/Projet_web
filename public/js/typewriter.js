const txtAnim = document.getElementById("typewriter");

new Typewriter(txtAnim, {
    loop: true,
    deleteSpeed: 15
}).changeDelay(40)
.typeString("<span id='color_typewriter' class='px-2'>les plus jeunes.</span>").pauseFor(1000).deleteChars(21)
.typeString("<span id='color_typewriter' class='px-2'>les plus agés.</span>").pauseFor(1000).deleteChars(23)
.typeString("<span id='color_typewriter' class='px-2'>tout le monde ! </span>").pauseFor(5000)
.start();