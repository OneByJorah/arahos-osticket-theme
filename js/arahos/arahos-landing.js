/* ============================================================
   Arahos Help Desk — Landing page accordion toggle
   Expands/collapses the Front Page FAQ items.
   ============================================================ */
(function () {
  "use strict";
  function ready(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }
  ready(function () {
    document.querySelectorAll("arahos-acc-toggle").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var item = btn.closest("arahos-acc-item");
        var body = item.querySelector("arahos-acc-body");
        var open = item.classList.toggle("open");
        btn.setAttribute("aria-expanded", open ? "true" : "false");
        if (open) body.removeAttribute("hidden");
        else body.setAttribute("hidden", "");
      });
    });
  });
})();
