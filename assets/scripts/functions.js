// Run when document is ready
$(document).ready(function() {
    let phoneKeyCodes   =   [8, 35, 36, 37, 38, 39, 40, 46, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105];
    $('#PhoneNumber').keydown(function(evt) {
        console.log(evt.keyCode);
        // Disable non-numeric input
        if (!phoneKeyCodes.includes(evt.keyCode)) {
            evt.preventDefault();
        }
        // Simple input mask for phone numbers
        else {
            let inputLength =   $(this).val().length;
            let phoneNumber =   $(this).val();
            if (((evt.keyCode >= 48 && evt.keyCode <= 57) || (evt.keyCode >= 96 && evt.keyCode <= 105)) && (inputLength == 3 || inputLength == 7)) {
                $(this).val(phoneNumber + '-');
            }
            else if ((evt.keyCode == 46 || evt.keyCode == 8) && (inputLength == 5 || inputLength == 9)) {
                $(this).val(phoneNumber.substring(0, inputLength - 1));
            }
        }
    });
});