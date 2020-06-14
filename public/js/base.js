/**
 * func run a callback function when DOM is ready
 * @param {Function} fn
 * @author NCThanh 6.6.2020
 */
function DOMReady(fn) {
  // see if DOM is already available
  if (
    document.readyState === "complete" ||
    document.readyState === "interactive"
  ) {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

/**
 * func hide div when click outside
 * @param {*} id
 * @author NCThanh
 */
function hideWhenClickOutside(id, cbOnClickIn, cbOnClickOut) {
  const el = document.getElementById(id);
  if (el) {
    window.addEventListener("click", function (e) {
      if (el.contains(e.target)) {
        if (cbOnClickIn instanceof Function) {
          cbOnClickIn(el);
        }
      } else {
        // Clicked outside the box
        if (cbOnClickOut instanceof Function) {
          cbOnClickOut(el);
        }
      }
    });
  }
}

/**
 * func add classs to a element and remove all others
 * @param {*} el
 * @param {*} className
 * @author NCThanh 6.6.2020
 */
function setActiveClass(el, className) {
  // remove all class active
  let allElements = document.querySelectorAll("." + className);
  for (const item of allElements) {
    item.classList.remove("active");
  }

  // add class active to active item
  el.classList.add("active");
}

/**
 * func set nav-item active based on url
 * @author NCThanh 6.6.2020
 */
function setActiveNavbar() {
  const path = window.location.pathname,
    currentPath = path.split("/")[2],
    currentActive = document.getElementById(
      `nav${currentPath.toCapitalizeFirst()}`
    ),
    navItemList = document.getElementsByClassName("nav-item");

  for (const navItem of navItemList) {
    navItem.classList.remove("active");
  }

  if (currentActive) {
    currentActive.classList.add("active");
  }
}

DOMReady(function () {
  setActiveNavbar();
});
