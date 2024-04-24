function setupAutocomplete(inputId, suggestionsUrl) {
  const inputField = document.getElementById(inputId);
  const suggestionsDiv = document.createElement("ul");
  suggestionsDiv.classList.add("autocomplete-suggestions");
  inputField.parentNode.appendChild(suggestionsDiv);

  let propertyName;
  if (inputId === 'nom_abonne') {
      propertyName = 'nom_abonne';
  } else if (inputId === 'titre_livre') {
      propertyName = 'titre_livre';
  } else {
      propertyName = 'default_property';
  }

  inputField.addEventListener("input", function () {
      const inputValue = this.value;

      if (inputValue.length >= 2) {
          fetch(suggestionsUrl + "?query=" + inputValue)
              .then((response) => {
                  if (!response.ok) {
                      throw new Error("Network response was not ok");
                  }
                  return response.json();
              })
              .then((data) => {
                  suggestionsDiv.innerHTML = "";
                  if (data.length === 0) {
                      console.log("Aucun résultat trouvé.");
                      return;
                  }
                  for (let i = 0; i < data.length; i++) {
                      const suggestionItem = document.createElement("li");
                      suggestionItem.textContent = data[i][propertyName];
                      suggestionItem.addEventListener("click", function () {
                          inputField.value = data[i][propertyName];
                          suggestionsDiv.innerHTML = "";
                      });
                      suggestionsDiv.appendChild(suggestionItem);
                  }
              })
              .catch((error) => {
                  console.error("Fetch error:", error);
              });
          suggestionsDiv.style.position = "absolute";
          suggestionsDiv.style.top = inputField.offsetTop + inputField.offsetHeight + "px";
          suggestionsDiv.style.left = inputField.offsetLeft + "px";
      } else {
          suggestionsDiv.innerHTML = "";
      }
  });
}
  