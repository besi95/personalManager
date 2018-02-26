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
                        message: 'Name must be at least two characters'
                    },
                    notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Lastname must be at least 2 characters'
                    },
                    notEmpty: {
                        message: 'Please enter your Last Name'
                    }
                }
            },
            user_name: {
                validators: {
                    stringLength: {
                        min: 8,
                        message: 'Username must be at least 8 characters'
                    },
                    notEmpty: {
                        message: 'Please enter your Username'
                    }
                }
            },
            user_password: {
                validators: {
                    stringLength: {
                        min: 8,
                        message: "Password must be minimum 8 characters."
                    },
                    notEmpty: {
                        message: 'Please enter your Password.'
                    },
                    regexp: {
                        regexp: '^.*(?=.{7,})(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).*$',
                        message: 'Password must contain uppercase,number and special character.'
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
                        message: 'The password and its confirm are not the same'
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            contact_no: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Number must be 10 digits.'
                    },
                    notEmpty: {
                        message: 'Please enter your Contact No.'
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