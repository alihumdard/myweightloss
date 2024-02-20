jQuery(function ($) {
    "use strict";

    // Set the form action attribute
    $('form#wrapped').attr('action', 'form_send_multiple_branch.php');

    // Check if there's a stored step in localStorage
    var storedStep = localStorage.getItem('wizardStep');

    // Initialize wizard with stored step
    var wizard = $("#wizard_container").wizard({
        stepsWrapper: "#wrapped",
        submit: ".submit",
        startStep: storedStep ? parseInt(storedStep) : 0,
        transitions: {
            branchtype: function ($step, action) {
                var branch = $step.find(":checked").val();
                if (!branch) {
                    $("form").valid();
                }
                return branch;
            }
        },
        beforeSelect: function (event, state) {
            if ($('input#website').val().length != 0) {
                return false;
            }
            if (!state.isMovingForward)
                return true;
            var inputs = $(this).wizard('state').step.find(':input');
            return !inputs.length || !!inputs.valid();
        },
        validate: {
            errorPlacement: function (error, element) {
                if (element.is(':radio') || element.is(':checkbox')) {
                    error.insertBefore(element.next());
                } else {
                    error.insertAfter(element);
                }
            }
        }
    });

    // Function to show or hide the submit button based on input fields
    function toggleSubmitButton() {
        var allFilled = true;
        $('input.required').each(function () {
            if ($(this).val() == '') {
                allFilled = false;
                return false; // exit each loop early if any field is empty
            }
        });

        if (allFilled) {
            $('.submit').show();
        } else {
            $('.submit').hide();
        }
    }

    // Call the function when the page loads
    toggleSubmitButton();

    // Event listener for input fields
    $('input').on('input', function () {
        toggleSubmitButton();
    });

    // Add click event for the submit button
    $('.submit').on('click', function (event) {
        // Prevent the default behavior of the link
        event.preventDefault();
        // Submit the form
        $('#wrapped').submit();
    });

    // Save current step to localStorage when step changes
    wizard.on('stepchange', function (event, state) {
        localStorage.setItem('wizardStep', state.currentIndex);
    });
});
