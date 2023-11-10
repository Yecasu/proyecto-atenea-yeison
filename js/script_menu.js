document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.getElementById("menu-btn");
  const closeBtn = document.getElementById("close-btn");
  const menu = document.querySelector(".menu");

  menuBtn.addEventListener("click", function () {
    menu.classList.toggle("menu-open");
  });

  closeBtn.addEventListener("click", function () {
    menu.classList.remove("menu-open");
  });
});
