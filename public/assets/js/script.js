document.addEventListener("DOMContentLoaded", function () {
  // Confirmation before deleting a student
  let deleteButtons = document.querySelectorAll(".btn-delete");

  deleteButtons.forEach(function (button) {
      button.addEventListener("click", function (event) {
          let confirmDelete = confirm("Are you sure you want to delete this student?");
          if (!confirmDelete) {
              event.preventDefault();
          }
      });
  });

  // Smooth scroll effect for sidebar links
  let sidebarLinks = document.querySelectorAll(".sidebar ul li a");

  sidebarLinks.forEach(function (link) {
      link.addEventListener("click", function (event) {
          event.preventDefault();
          let targetSection = document.querySelector(this.getAttribute("href"));
          if (targetSection) {
              window.scrollTo({
                  top: targetSection.offsetTop,
                  behavior: "smooth"
              });
          }
      });
  });
});