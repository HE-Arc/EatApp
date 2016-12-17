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

    $('#Ingredient').change(() => {
        $('#Unit').val($('#Ingredient').val());
    });

    $('.delete-list-button').click((e) => {
        var list = m_getObject(e) + '_heading';

        if (!isAccessing[list]) {
            isAccessing[list] = true;
            $(list).toggleClass('object-delete');
            $(list).toggleClass('object-delete-failed');

            var url = m_getUrl(e);
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

    $('.add-ing').click((e) => {
        var listId = m_getObject(e);
        var ingId = $('#Ingredient').val();
        var quantity = parseFloat($('#Quantity').val());
        var unit = $('#Unit').find('option:selected').text();
        var url = m_getUrl(e);

        $.post(url, {
            'liste_id': listId,
            'ingredient_id': ingId,
            'Quantity': quantity,
            'Unit': unit})
            .done((response) => {
                console.log(response);
            })
            .fail((error) => {
                console.log(error);
            })
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

function m_getUrl(e) {
    return $('#' + e.currentTarget.id).closest('form').attr('action');
}

function m_getObject(e) {
    return '#' + e.currentTarget.id.split("_")[0];
}