function clearValidation(form) {
    form.find("div").removeClass("has-error");
    form.find(".help-block").remove();
}

function clearForm(form) {
    // form.find('input').val('');
    form.find("select").not("input[dont-clear='true']").val("");
    form.find("checkbox").val("");
    form.find("textarea").val("");
    form.find("input[type='text']").not("input[dont-clear='true']").val("");
    form.find("input[type='number']").not("input[dont-clear='true']").val("");
    form.find("input[type='email']").not("input[dont-clear='true']").val("");
    form.find("input[type='password']").not("input[dont-clear='true']").val("");
    form.find("input[type='file']").not("input[dont-clear='true']").val("");
    form.find("input[type='datetime-local']")
        .not("input[dont-clear='true']")
        .val("");
    form.find("input[type='checkbox']").prop("checked", false);
    form.find("input[name='_method']").remove();
}

function loadingBtn(param) {
    loaderText = param.html();
    param.html('<div class="ld ld-ring ld-spin"></div>');
    param.attr("disabled", "disabled");
}

function removeLoadingBtn(param) {
    param.html(loaderText);
    param.removeAttr("disabled");
}

function submitForm({ form, modal, datatable, customArray, isRecaptcha = false }) {
    clearValidation(form);
    form.attr("enctype", "multipart/form-data");

    let data = new FormData(form[0]);
    let submitBtn = form.find("button[type=submit]");

    loadingBtn(submitBtn);

    return $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                if (modal) {
                    $(modal).modal("hide");
                }

                if (response.redirect) {
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1500);

                    if (response.login) return;
                } else {
                    if (datatable) {
                        datatable.draw();
                    }
                    removeLoadingBtn(submitBtn);
                }

                let with_toastr = response.with_toastr ?? true;
                if(with_toastr){ 
                    toastr.success(response.message);
                }
            } else {
                toastr.error(
                    `Error : ${response.message
                        ? response.message
                        : "No response message"
                    }`
                );
                removeLoadingBtn(submitBtn);
            }
        },
        error: function (response) {
            // console.log(response);

            // check if proses is done
            if (response.readyState === 4) {
                // check response error status is 422 or 423
                if (response.status === 422 || response.status === 423) {
                    // get error response
                    var errors = response.responseJSON.errors;
                    $.each(errors, function (key, error) {
                        // set dafault parameter form field

                        let param = "name";
                        // change param when array is not empty
                        if (customArray.length > 0) {
                            // var array_check = (array.indexOf(key.split(".")[0]) > -1);
                            // // let array_check = customArray.includes(
                            // //     key.split(".")[0]
                            // //);
                            // //if (array_check) {
                            param = "id";
                            // //}
                        }

                        //handle for repeater form

                        if (key.split(".").length === 3) {
                            let keyMap = key.split(".");

                            key = `${keyMap[0]}[${keyMap[1]}][${keyMap[2]}]`;
                        }

                        item = form.find(`input[${param}='${key}']`);
                        item =
                            item.length > 0
                                ? item
                                : form.find(`input[${param}='${key}[]']`);
                        item =
                            item.length > 0
                                ? item
                                : form.find(`select[${param}='${key}']`);
                        item =
                            item.length > 0
                                ? item
                                : form.find(`textarea[${param}='${key}']`);

                        /*
                            get data special validation like : 
                            * radio button
                            * checkbox
                            * array
                            * and other
                        */
                        let custom_validation = item.data("validation");

                        // special validation for checkbos or radio button error feedback
                        if (custom_validation == "radiocheckbox") {
                            item.parent().parent().addClass("has-error");
                            item.parent()
                                .parent()
                                .append(
                                    '<span class="help-block">* ' +
                                    error +
                                    "</span>"
                                );
                        } else if (custom_validation == "inputgroupbutton") {
                            item.parent().parent().addClass("has-error");
                            item.parent()
                                .parent()
                                .append(
                                    '<span class="help-block">* ' +
                                    error +
                                    "</span>"
                                );
                        }

                        //default error feddback
                        else {
                            item.parent().addClass("has-error");
                            // item.parent().append(
                            //     '<span class="help-block">' + error + "</span>"
                            // );
                            if (error.length > 1) {
                                error.forEach(function (entry) {
                                    return item
                                        .parent()
                                        .append(
                                            '<span class="help-block">* ' +
                                            entry +
                                            "</span>"
                                        );
                                });
                            } else {
                                item.parent().append(
                                    '<span class="help-block">* ' +
                                    error +
                                    "</span>"
                                );
                            }
                        }
                    });

                    // console.log(response.responseJSON);
                    // toastr.info("Info :  Periksa lagi kelengkapan data anda");
                    toastr.info("Info : " + response.responseJSON.message ? response.responseJSON.message : "Check again the completeness of your data");
                } else {
                    var responseMessage = response.responseJSON.message;
                    var message = "Warning : looks like something went wrong.";

                    if (responseMessage) {
                        message = responseMessage;
                    }
                    toastr.warning(message);
                }
            }

            if (isRecaptcha) {
                console.log('recaptcha reset');
                grecaptcha.reset();
            }

            removeLoadingBtn(submitBtn);
        },
    });
}

$(document).ready(function () {
    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    } else {
        console.error("CSRF token not found.");
    }

    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "301000",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
});
