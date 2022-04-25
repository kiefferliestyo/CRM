// Run when page has finished loading
$(document).ready(function(){
    // Set different input type for the search depending on the search filter
    $('#SearchFilter').on("change", function(){
        // Get the value of the search filter
        let searchFilter    =   $(this).val();
        // Get the current type of the search input
        let searchType      =   $('#SearchValueSelect').attr('disabled') == 'disabled' ? $('#SearchValue').attr('type') : 'select';
        console.log(searchFilter);
        console.log(searchType);
        // Hide the select tag and show the input tag if the previous search filter was 'Status'
        if (searchFilter != 'Status' && searchType == 'select') {
            $('#SearchValueSelect').attr('disabled', 'true');
            $('#SearchValueSelect').hide();
            $('#SearchValue').removeAttr('disabled');
            $('#SearchValue').show();
        }
        // Set search input type to text
        if ((searchFilter == 'FirstName' || searchFilter == 'LastName' || searchFilter == 'Email') && searchType != 'text') {
            $('#SearchValue').attr('type', 'text');
            $('#SearchValue').attr('placeholder', 'Type to search');
        }
        // Set search input type to numeric
        if (searchFilter == 'CustomerID' && searchType != 'number') {
            $('#SearchValue').attr('type', 'number');
            $('#SearchValue').attr('placeholder', 'Type a number to search');
        }
        // Set search input type to date
        if (searchFilter == 'DOB' && searchType != 'date') {
            $('#SearchValue').attr('type', 'date');
        }
        // Set search input type to select
        if (searchFilter == 'Status' && searchType != 'select') {
            $('#SearchValue').attr('disabled', 'true');
            $('#SearchValue').hide();
            $('#SearchValueSelect').removeAttr('disabled');
            $('#SearchValueSelect').show();
        }
    });
});