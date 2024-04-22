document.addEventListener("DOMContentLoaded", function () {
  var deleteButton = document.getElementById("deleteButton");
  var confirmationModal = document.getElementById("confirmationModal");
  var confirmDeleteButton = document.getElementById("confirmDelete");
  var cancelDeleteButton = document.getElementById("cancelDelete");
  var deleteForm = document.getElementById("deleteForm");

  deleteButton.addEventListener("click", function (event) {
    event.preventDefault();
    confirmationModal.style.display = "block";
  });

  confirmDeleteButton.addEventListener("click", function () {
    deleteForm.submit();
  });

  cancelDeleteButton.addEventListener("click", function () {
    confirmationModal.style.display = "none";
  });
});
