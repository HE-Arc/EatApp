/**
 * Created by alexandre on 29.11.2016.
 */
var $ = require('jquery');

$(function() {
    console.log("Launching front-end scripts...");
    m_initUIBehaviours();
});

function m_initUIBehaviours() {
    $('.check-button').click(function(e) {
        var objectToTag = '#' + e.currentTarget.id.split("_")[0] + "_list";
        $(objectToTag).toggleClass('ingredient-uncheck');
        $(objectToTag).toggleClass('ingredient-check');
    });
}
