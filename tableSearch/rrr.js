function searchTable(columnIndex, inputId) {
    let input, filter, table, tr, td, txtValue;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (let i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[columnIndex];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Вызов функции для поиска по второму столбцу
    searchTable(1, "myInput");

    // Вызов функции для поиска по третьему столбцу
    searchTable(2, "myInputSupervisoryAuthority");
});