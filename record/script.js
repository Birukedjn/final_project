const tableLinks = document.querySelectorAll('.sidebar a');
const tableBody = document.getElementById('records-table').getElementsByTagName('tbody')[0];

tableLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    const selectedTable = link.getAttribute('data-table');
    fetchTableData(selectedTable);
  });
});

function fetchTableData(table) {
  tableBody.innerHTML = ''; // Clear previous data
  fetch(`data.php?table=${table}`)
    .then(response => response.text())
    .then(data => {
      tableBody.innerHTML = data;
    });
}
