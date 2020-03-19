// SEARCHING
var $rows = $('#table tr');
      $('#search').keyup(function() {
          
          var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
              reg = RegExp(val, 'i'),
              text;
          
          $rows.show().filter(function() {
              text = $(this).text().replace(/\s+/g, ' ');
              return !reg.test(text);
          }).hide();
      });

// PAGINATION

// $(document).ready(function(){
//     $('#table').after(`<div id="nav" class="card-footer float-right"></div>`);
//     var rowsShown = 5;
//     var rowsTotal = $('#table tbody tr').length;
//     var numPages = rowsTotal/rowsShown;
//     for(i = 0;i < numPages;i++) {
//         var pageNum = i + 1;
//         $('#nav').append(`<a href="#" class="btn btn-primary" rel="${i}">${pageNum}</a>`);
//     }
//     $('#table tbody tr').hide();
//     $('#table tbody tr').slice(0, rowsShown).show();
//     $('#nav a:first').addClass('active');
//     $('#nav a').bind('click', function(){

//         $('#nav a').removeClass('active');
//         $(this).addClass('active');
//         var currPage = $(this).attr('rel');
//         var startItem = currPage * rowsShown;
//         var endItem = startItem + rowsShown;
//         $('#table tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
//         css('display','table-row').animate({opacity:1}, 300);
//     });
// });

// SORTING

/**
 * Sorts a HTML table.
 * 
 * @param {HTMLTableElement} table The table to sort
 * @param {number} column The index of the column to sort
 * @param {boolean} asc Determines if the sorting will be in ascending
 */
function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});

// $(document).ready(function() {
//     $('#table').DataTable();
// } );
