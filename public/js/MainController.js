/**
 * Created by alexandre on 29.11.2016.
 */

$(function() {
    console.log("Launching front-end scripts...");
    m_initUIBehaviours();
});

function m_initUIBehaviours() {
    var acc = document.getElementsByClassName("accordion");

    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
}
