// sidebar open-close
$(document).click((e) => {
  if (
    e.target.id !== "header-main-nav-btn" &&
    e.target.id !== "sidebar-content" &&
    e.target.id !== "header-main-nav-btn-i" &&
    e.target.id !== "header-main-nav-dropdown" &&
    e.target.id !== "btn-dropdown" &&
    e.target.id !== "photo-dropdown" &&
    e.target.id !== "line1" &&
    e.target.id !== "line2" &&
    e.target.id !== "line3"
  ) {
    $("#sidebar-content").removeClass("minimize__sidebar");
    $("#main-content").removeClass("minimize__sidebar");
  }
});

$("#header-main-nav-btn-i").click(() => {
  $("#sidebar-content").toggleClass("minimize__sidebar");
  $("#main-content").toggleClass("minimize__sidebar");
  $(".collapse.collapse__dropside").removeClass("show");
});