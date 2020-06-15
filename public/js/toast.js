/**
 * file display and hide toast message
 * @author NCThanh
 */

class Toast {
  /**
   * func display a toast message
   * @param {String} message
   * @param {Number} time
   * @author NCThanh
   */
  show(message, type, time = 3000) {
    const toastDiv = document.createElement("div"),
      cbOnClickIn = (el) => {
        if (document.body.contains(toastDiv)) {
          document.body.removeChild(toastDiv);
        }
      };
    toastDiv.id = "toast";
    toastDiv.textContent = message;
    document.body.appendChild(toastDiv);
    toastDiv.classList.add("show");
    toastDiv.classList.add(type);

    hideWhenClickOutside("toast", cbOnClickIn);

    setTimeout(function () {
      if (document.body.contains(toastDiv)) {
        document.body.removeChild(toastDiv);
      }
    }, time);
  }
}

const toast = new Toast();
