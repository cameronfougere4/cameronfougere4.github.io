function setNav(current_path) {
  fetch("nav.html")
    .then(r => r.text())
    .then(html => {
      // 👉 Replace this line with your code:
      document.getElementById("main-nav").innerHTML = html;

      // Optional: highlight the current page
      const cleanPath = splitAtRoot(current_path);
      document.querySelectorAll("#main-nav a").forEach(link => {
        const linkPath = splitAtRoot(link.getAttribute("href"));
        if (linkPath === cleanPath) {
          link.classList.add("current_page");
        }
      });
    });
}

// Helper function to compare relative paths
function splitAtRoot(path) {
  return path.split("/").pop();
}
