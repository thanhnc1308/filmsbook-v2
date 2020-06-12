/**
 * file handle global live search
 * @author NCThanh
 */

class LiveSearch {
  navBarSearch(searchKey){
    this.search(searchKey, "livesearch", this.renderHtmlResultForNavBar);
  }

  addFilmSearch(searchKey){
    this.search(searchKey, "add-film-search-results", this.renderHtmlResultForAddFilm);
  }
  /**
   * func do live search and display result
   * @author NCThanh
   * @param {String} searchKey
   */
  search(searchKey, resultAreaId, renderHtmlResult) {
    setTimeout(function () {
      if (searchKey.length == 0) {
        document.getElementById(resultAreaId).innerHTML = "";
        document.getElementById(resultAreaId).style.border = "0px";
        return;
      }
      const url = `${BASE_URL}/livesearch/search/?q=${searchKey}`;
      httpClient.get(url, function (res) {
        if (res.readyState == 4 && res.status == 200) {
          let films = JSON.parse(res.responseText);
          let result = '<div class="link-film">Not found</div>';
          if(films.length != 0){
            result = renderHtmlResult(films);
          }
          document.getElementById(resultAreaId).innerHTML = result;
          document.getElementById(resultAreaId).style.border =
            "1px solid #A5ACB2";
        }
      });
    }, 300);
  }

  renderHtmlResultForNavBar = (films) => {
      let result = '';
      films.forEach(film => {
        result += `<div class="link-film"><a href="${BASE_PATH}/films/view/${film['Film']['id']}" class="fw-bold no-underline rounded" target="_blank">${film['Film']['title']}</a></div>`
      });
      return result;
  }

  renderHtmlResultForAddFilm = (films) => {
    let result = '';
    films.forEach(film => {
      result += `<div class="link-film"><div 
      class="fw-bold no-underline rounded"
      film-id="${film['Film']['id']}"
      film-title="${film['Film']['title']}"
      film-length="${film['Film']['length']}"
      film-year="${film['Film']['year']}"
      film-avatar="${film['Film']['avatar']}"
      onclick="collection.addToCollection(this)"
      >${film['Film']['title']}</div></div>`
    });
    return result;
  }
}

const liveSearch = new LiveSearch();
