/**
 * class handle sort film
 * @author NCThanh
 */

class Sorter {

  sortFilm(sortKey) {
    window.open(`${BASE_URL}/profiles/watchlist/?sort=${sortKey}`, "_self");
  }
  
}


const sorter = new Sorter();
