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
                    $("#" + formId).find("#"+id).next(".errors").remove();
                    $("#" + formId).find("#"+id).after(getErrorHtml(errMsgs[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId).find("#"+id);
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
    console.log("elemvalidation name"+name+"inputval"+inputVal);
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
                    console.log(formId);
                    $("#" + formId).find('#'+id).next(".errors").remove();
                    $("#" + formId).find('#'+id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            if (data.hasOwnProperty('html')){
                //in case of new product malfunction
                if(data.hasOwnProperty('new_malfunction_id')){
                    $("ul.malfunctions").append(data.html);
                    $("a.add_malfunction").show();
                    $("a.add_malfunction").next().remove("");
                    $("div.info_malfunction[malfunctionId="+data.new_malfunction_id+"]").show();
                }
                //in case of new product solution
                else if(data.hasOwnProperty('new_solution_id')){
                    $("ul.solutions[malfunctionId="+data.malfunction_id+"]").append(data.html);
                    $("a.add_solution[malfunctionId="+data.malfunction_id+"]").show();
                    $("a.add_solution[malfunctionId="+data.malfunction_id+"]").next().remove();
                    $("div.info_solution[solutionId="+data.new_solution_id+"]").show();
                }
                //in case of edit product malfunction
                else if(data.hasOwnProperty('malfunction_id')){
                    $("li.malfunction[malfunctionId="+data.malfunction_id+"]").replaceWith(data.html);
                    $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").show();
                }
                //in case of edit product solution
                else if(data.hasOwnProperty('solution_id')){
                    $("li.solution[solutionId="+data.solution_id+"]").replaceWith(data.html);
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
            $("li.malfunction[malfunctionId="+data.malfunction_id+"]").remove();
        }
        else if(data.hasOwnProperty('solution_id')){
            $("li.solution[solutionId="+data.solution_id+"]").remove();
        }
        else{
            window.location.replace(data.redirect);
        }
    },
    contentType: false,
    processData: false
    });
}




