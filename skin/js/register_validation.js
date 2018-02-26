$(document).ready(function () {
    $('#contact_form').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Emri duhet të jetë të paktën dy karaktere'
                    },
                    notEmpty: {
                        message: 'Ju lutem vendosni emrin'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Mbiemri duhet të jetë të paktën dy karaktere'
                    },
                    notEmpty: {
                        message: 'Ju lutem vendosni mbiemrin'
                    }
                }
            },
            user_name: {
                validators: {
                    stringLength: {
                        min: 8,
                        message: 'Username duhet të jetë të paktën 8 karaktere'
                    },
                    notEmpty: {
                        message: 'Ju lutem vendosni username'
                    }
                }
            },
            user_password: {
                validators: {
                    stringLength: {
                        min: 8,
                        message: "Password duhet të jetë të paktën 8 karaktere"
                    },
                    notEmpty: {
                        message: 'Ju lutem vendosni fjalekalimin tuaj.'
                    },
                    regexp: {
                        regexp: '^.*(?=.{7,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).*$',
                        message: 'Fjalekalimi duhet të mbajë të paktën një shkronjë të madhe, një karakter special dhe një numër.'
                    }
                }
            },
            confirm_password: {
                validators: {
                    stringLength: {
                        min: 8,
                    },
                    identical: {
                        field: 'user_password',
                        message: 'Fjalekalimet nuk përputhen'
                    },
                    notEmpty: {
                        message: 'Ju lutem shkruani fjalekalimin'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Ju lutem shkruani emailin tuaj'
                    },
                    emailAddress: {
                        message: 'Vendosni një adresë emaili të vlefshme'
                    }
                }
            },
            contact_no: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Numri duhet të ketë 10 shifra.'
                    },
                    notEmpty: {
                        message: 'Vendosni numrin e kontaktit.'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function (e) {
            $('#success_message').slideDown({opacity: "show"}, "slow");
            $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function (result) {
                console.log(result);
            }, 'json');
        });
});