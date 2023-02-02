let searchInput = document.getElementById("search-input");

searchInput.addEventListener("keyup", function (event) {
  let searchQuery = event.target.value.toLowerCase();
  console.log(searchQuery);

  let allNameDOMCollection = document.getElementsByTagName("li");

  for (let i = 0; i < allNameDOMCollection.length; i++) {
    const currentName = allNameDOMCollection[i].textContent.toLowerCase();

    if (currentName.includes(searchQuery)) {
      console.log(currentName);
      allNameDOMCollection[i].style.display = "block";
    } else {
      allNameDOMCollection[i].style.display = "none";
    }
  }
});
