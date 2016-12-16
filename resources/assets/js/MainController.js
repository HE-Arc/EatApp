/**
 * Created by alexandre on 16.12.2016.
 */

var isAccessing = {};

$(function () {
    console.log("Lauching front-end scripts");
    m_initUIBehaviours();
});


function m_initUIBehaviours() {
    $('.check-button').click((e) => {
        var objectToTag = m_getObject(e) + '_list';
        console.log(objectToTag);
        $(objectToTag).toggleClass('ingredient-uncheck');
        $(objectToTag).toggleClass('ingredient-check');
    });

    $('.delete-list-button').click((e) => {
        var list = m_getObject(e) + '_heading';

        if (!isAccessing[list]) {
            isAccessing[list] = true;
            $(list).toggleClass('object-delete');
            $(list).toggleClass('object-delete-failed');

            var url = $('#' + e.currentTarget.id).closest('form').attr('action');
            $.ajax(url, {type: 'delete'})
                .done((response) => {
                    console.log(response);
                    $(list).addClass('hidden')
                })
                .fail((error) => {
                    console.log(error);
                    isAccessing[list] = false;
                    $(list).toggleClass('object-delete');
                    $(list).toggleClass('object-delete-failed');
                })
        }

    });

    $('.create-list-or-ingredient-button').click(() => {
        var modal = $('#modal-add');
        modal.modal('show');
    });

    $('.open-modal-name').click(() => {
        var modal = $('#modal-change-name');
        modal.modal('show');
    });
}

function m_getObject(e) {
    return '#' + e.currentTarget.id.split("_")[0];
}