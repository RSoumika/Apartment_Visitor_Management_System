function search() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementsByTagName("table")[0]; // Assuming it's the first table
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    for (i = 0; i < tr.length; i++) {
        // Set variable to false by default
        var found = false;
        // Loop through all table cells in the row
        for (j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                // If the search query matches any cell value, set found to true
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break; // Exit the loop if match is found in this row
                }
            }
        }
        // Show or hide the row based on whether a match was found
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
