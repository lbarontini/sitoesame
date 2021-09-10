function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId, actionType) {

    var formElems;

    function sendAjaxReq() {
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    console.log(data.responseText);
                    $("#" + id).parent().find(".errors").remove();
                    if(id.includes("name")){
                        console.log("error name");
                        $("#" + id).after(getErrorHtml(errMsgs["name"]));
                    }else if(id.includes("description")){
                        $("#" + id).after(getErrorHtml(errMsgs["description"]));
                    }else{
                        $("#" + id).after(getErrorHtml(errMsgs[id]));
                    }
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#"+id);
    var name = elem.attr('name');
    if (elem.attr('type') === 'file') {
    // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(name, inputVal);
    formElems.append('_method', actionType);
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId, actionType) {

    var form = new FormData(document.getElementById(formId));
    form.append('_method', actionType);

    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').remove();
                    if(id.includes("name")){
                        console.log("error name");
                        $("#" + id).after(getErrorHtml(errMsgs["name"]));
                    }else if(id.includes("description")){
                        $("#" + id).after(getErrorHtml(errMsgs["description"]));
                    }else{
                        $("#" + id).after(getErrorHtml(errMsgs[id]));
                    }
                });
            }
        },
        success: function (data) {
            if (data.hasOwnProperty('html')){
                if(data.hasOwnProperty('malfunction_id')){
                    $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").parent().html(data.html);
                    $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").show();
                }
                else if(data.hasOwnProperty('solution_id')){
                    $("div.info_solution[solutionId="+data.solution_id+"]").parent().html(data.html);
                    $("div.info_solution[solutionId="+data.solution_id+"]").show();
                }
            }else{
                window.location.replace(data.redirect);
            }
        },
        contentType: false,
        processData: false
    });
}

function deleteElement(actionUrl) {
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
    type: 'DELETE',
    url: actionUrl,
    dataType: "json",
    success: function (data) {
        if(data.hasOwnProperty('malfunction_id')){
            $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").parent().remove();
        }
        else if(data.hasOwnProperty('solution_id')){
            $("div.info_solution[solutionId="+data.solution_id+"]").parent().remove();
        }
        else{
            window.location.replace(data.redirect);
        }
    },
    contentType: false,
    processData: false
    });
}




