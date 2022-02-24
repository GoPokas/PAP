let preloader = $("#preloader");
if (preloader) {
  window.addEventListener("load", () => {
    preloader.remove();
  });
}
