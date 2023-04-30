const searchBar = document.getElementById('search');
searchBar.addEventListener('input', () => {
  searchTable(searchBar.value);
});

function searchTable(query) {
    const table = document.querySelector('table');
    const rows = table.querySelectorAll('tr');
  
    rows.forEach(row => {
      const cells = row.querySelectorAll('td');
      let found = false;
  
      cells.forEach(cell => {
        if (cell.textContent.toLowerCase().includes(query.toLowerCase())) {
          found = true;
        }
      });
  
      if (found) {
        row.style.display = '';
      } else {
        //if header row, don't hide
        if (row.querySelector('th')) {
            row.style.display = '';
        }
        else{
        row.style.display = 'none';
        }
      }
    });
  }
  