/**
 * file handle global live search
 * @author NCThanh
 */

class LiveSearch {
  /**
   * func do live search and display result
   * @author NCThanh
   * @param {String} searchKey
   */
  search(searchKey) {
    setTimeout(function () {
      if (searchKey.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
      }
      const url = `${BASE_URL}/livesearch/search?q=${searchKey}`;
      httpClient.get(url, function (res) {
        if (res.readyState == 4 && res.status == 200) {
          document.getElementById("livesearch").innerHTML = res.responseText;
          document.getElementById("livesearch").style.border =
            "1px solid #A5ACB2";
        }
      });
    }, 500);
  }
}

const liveSearch = new LiveSearch();
