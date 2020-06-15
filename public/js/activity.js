/**
 * class handle business logic for activity such as watchlist and like
 * @author NCThanh
 */

class Activity {
  /**
   * store selected watch item
   */
  currentWatchItem = null;

  /**
   * store selected watch-icon of current watch item
   */
  currentWatchButton = null;

  /**
   * store selected like item
   */
  currentLikeItem = null;

  /**
   * store selected like-icon of current like item
   */
  currentLikeButton = null;

  /**
   * func add or remove watchlist item
   * @param {String} activityId
   * @author NCThanh
   */
  toggleWatchList(activityId) {
    const me = this,
      selectedEl = document.querySelector(`div[activity-id='${activityId}']`),
      iconButtonEl = selectedEl.querySelector(".icon-button-watch"),
      isCurrentActive = iconButtonEl.classList.contains("watch-active");
    me.currentWatchItem = selectedEl;
    me.currentWatchButton = iconButtonEl;
    if (!isCurrentActive) {
      me.addToWatchList();
    } else {
      me.removeWatchList(activityId);
    }
  }

  /**
   * func add a film to user watchlist
   * @author NCThanh
   */
  addToWatchList() {
    const me = this,
      url = `${BASE_URL}/profiles/addWatchList`,
      payload = {
        filmId: me.currentWatchItem.getAttribute("film-id"),
        userId: me.currentWatchItem.getAttribute("user-id"),
      };
    httpClient.post(url, payload, function (res) {
      if (res.readyState == 4 && res.status == 200 && res.response === "1") {
        me.currentWatchButton.classList.add("watch-active");
      } else {
        console.log("Error: addToWatchList");
      }
    });
  }

  /**
   * func remove a film from user watch list
   * @param {*} activityId
   * @author NCThanh
   */
  removeWatchList(activityId) {
    const me = this,
      url = `${BASE_URL}/profiles/removeActivity`,
      payload = {
        activityId,
      };
    httpClient.post(url, payload, function (res) {
      if (res.readyState == 4 && res.status == 200 && res.response === "1") {
        me.currentWatchButton.classList.remove("watch-active");
      } else {
        console.log("Error: removeWatchList");
      }
    });
  }

  /**
   * func add or remove like item
   * @param {String} activityId
   * @author NCThanh
   */
  toggleLike(activityId) {
    const me = this,
      selectedEl = document.querySelector(`div[activity-id='${activityId}']`),
      iconButtonEl = selectedEl.querySelector(".icon-button-like"),
      isCurrentActive = iconButtonEl.classList.contains("like-active");
    me.currentLikeItem = selectedEl;
    me.currentLikeButton = iconButtonEl;
    if (!isCurrentActive) {
      me.addToLike();
    } else {
      me.removeLike(activityId);
    }
  }

  /**
   * func add a film to user watchlist
   * @author NCThanh
   */
  addToLike() {
    const me = this,
      url = `${BASE_URL}/profiles/addLike`,
      payload = {
        filmId: me.currentLikeItem.getAttribute("film-id"),
        userId: me.currentLikeItem.getAttribute("user-id"),
      };
    httpClient.post(url, payload, function (res) {
      if (res.readyState == 4 && res.status == 200 && res.response === "1") {
        me.currentLikeButton.classList.add("like-active");
      } else {
        console.log("Error: addToLike");
      }
    });
  }

  /**
   * func remove a film from user Like list
   * @param {*} activityId
   * @author NCThanh
   */
  removeLike(activityId) {
    const me = this,
      url = `${BASE_URL}/profiles/removeActivity`,
      payload = {
        activityId,
      };
    httpClient.post(url, payload, function (res) {
      if (res.readyState == 4 && res.status == 200 && res.response === "1") {
        me.currentLikeButton.classList.remove("like-active");
      } else {
        console.log("Error: removeLike");
      }
    });
  }
}

const activity = new Activity();
