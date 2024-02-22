jQuery(function ($) {
    "use strict";

    $('form#wrapped').attr('action', 'form_send_multiple_branch.php');

    $("#wizard_container").wizard({
        stepsWrapper: "#wrapped",
        submit: ".submit",
        beforeSelect: function (event, state) {
            if ($('input#website').val().length != 0) {
                return false;
            }
            if (!state.isMovingForward)
                return true;
            var inputs = $(this).wizard('state').step.find(':input');
            return !inputs.length || !!inputs.valid();
        }
    }).validate({
        errorPlacement: function (error, element) {
            if (element.is(':radio') || element.is(':checkbox')) {
                error.insertBefore(element.next());
            } else {
                error.insertAfter(element);
            }
        }
    });

    // // Logic to handle continue button visibility
    // $("#wizard_container").on('stepclick', function (event, state) {
    //     var currentStep = state.step.data('state');
    //     alert()
    //     if (currentStep === 'Design') {
    //         $('.forward').hide(); // Hide forward button in the third step
    //     } else {
    //         $('.forward').show(); // Show forward button in other steps
    //     }
    // });

    // Initialize wizard with transitions
    $("#wizard_container").wizard({
        transitions: {
            branchtype: function ($step, action) {
                // var branch = $step.find(":checked").val();
                // if (!branch) {
                //     $("form").valid();
                // }
                // return branch;
                return "branchtype";
            }
        }
    });
});
