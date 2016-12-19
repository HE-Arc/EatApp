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
        var objectToTag = '#' + m_getObject(e) + '_list';
        $(objectToTag).toggleClass('ingredient-uncheck');
        $(objectToTag).toggleClass('ingredient-bought');
    });

    $('#search-button').click(() => {
        APIComm_request($('#input-search-recipes').val());
    });

    $('#Ingredient').change(() => {
        $('#Unit').val($('#Ingredient').val());
    });

    $('.delete-list-button').click((e) => {
        SComm_deleteIng(e);
    });
    $('.add-ing').click((e) => {
        SComm_addIng(e);
    });

    $('.create-list-or-ingredient-button').click(() => {
        var modal = $('#modal-add');
        $('.alert-danger').empty();
        $('.alert-success').empty();
        $('#modal-alert').empty();
        modal.modal('show');
    });

    $('.open-modal-name').click(() => {
        var modal = $('#modal-change-name');
        $('.alert-danger').empty();
        $('.alert-success').empty();
        modal.modal('show');
    });
}

function m_getUrl(e) {
    return $('#' + e.currentTarget.id).closest('form').attr('action');
}

function m_getObject(e) {
    return e.currentTarget.id.split("_")[0];
}


//SERVER COMMUNICATION
function m_slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
}


function SComm_deleteIng(e) {
    var ing = '#' + m_getObject(e);
    var list = ing + '_heading';
    var error = ing + '_delete-error';

    if (!isAccessing[list]) {
        isAccessing[list] = true;
        $(list).toggleClass('object-delete');
        $(list).toggleClass('object-delete-failed');

        var url = m_getUrl(e);
        $.ajax(url, {type: 'delete'})
            .done((response) => {
                console.log(response);
                $(list).addClass('hidden');
            })
            .fail((error) => {
                console.log(error);
                isAccessing[list] = false;
                $(list).toggleClass('object-delete');
                $(list).toggleClass('object-delete-failed');
                $(error).append("Can't connect to server.");
            })
    }
}

function SComm_addIng(e) {
    var listId = m_getObject(e);
    var ingId = $('#Ingredient').val();
    var quantity = parseFloat($('#Quantity').val());
    var unit = $('#Unit').find('option:selected').text();
    var url = m_getUrl(e);

    if (isNaN(quantity)) {
        $('#modal-alert').append("Please fill all fields.");
        e.preventDefault();
        e.stopPropagation();
    }
    else {
        $.post(url, {
                "liste_id": listId,
                "ingredient_id": ingId,
                "Quantity": quantity,
                "Unit": unit
            })
            .done((response) => {
                var ingName = $('#Ingredient').find('option:selected').text();
                var slug = m_slugify(ingName) + '_heading';
                var html = $(response).find('#' + slug)[0].outerHTML;
                $('#table').append(html);
                var modal = $('#modal-add');
                modal.modal('hide');
            })
            .fail((error) => {
                console.log(error);
                $('.alert-danger').append("Can't connect to server.");
            })
    }
}


//API COMMUNICATION
function APIComm_request(params) {
    var modal = $('#modal-research-results');
    var output = $('.empty-on-result');
    output.removeClass('connection-error');
    var ing, url;
    if (params != "") {
        modal.modal('toggle');
        ing = params.split(' ');
        url = "https://api2.bigoven.com/recipes?include_ing=";
        for (let i = 0; i < ing.length; i++) {
            url += ing[i];
            if (ing[i + 1]) url += '%20';
        }
        url += '&api_key=' + BIGOVEN_KEY;
        $.get(url)
            .done((response) => {
                output.empty();
                for(let i = 0; i < response.ResultCount; i++) {
                    HTMLGen_generateRecipe('results', response.Results[i]);
                }
            })
            .fail((response) => {
                output.empty();
                output.toggleClass('connection-error');
                output.text('Error connecting to server.');
                console.log(response);
            });
    }
}


//HTML Generation
function HTMLGen_generateRecipe(idToAppendTo, recipe) {
    var id = recipe.RecipeID;
    var title = recipe.Title;
    var photo = recipe.PhotoUrl;
    var link = recipe.WebURL;
    var cuisine = recipe.Cuisine;
    $('#' + idToAppendTo).append(
        $('<div/>')
            .addClass('recipe-container')
            .attr('id', id)
            .append(
                $('<div/>')
                    .append(
                        $('<a/>')
                            .addClass('recipe-link')
                            .attr('href', link)
                            .append(
                                $('<img/>')
                                    .addClass('recipe-image')
                                    .attr('src', photo)
                            )
                    ),
                $('<div/>')
                    .addClass('recipe-info')
                    .append(
                        $('<h3>')
                            .addClass('recipe-title')
                            .text(title),
                        $('<p/>')
                            .addClass('cuisine-type')
                            .text(cuisine + " cuisine")
                    )
            )
    )
}