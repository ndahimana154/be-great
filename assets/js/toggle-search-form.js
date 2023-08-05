// JavaScript to show/hide the search form when the search button is clicked
document.getElementById('searchButton').addEventListener('click', function() {
    var searchForm = document.getElementById('searchForm');
    if (searchForm.style.display === 'none') {
      searchForm.style.display = 'block';
    } else {
      searchForm.style.display = 'none';
    }
  });