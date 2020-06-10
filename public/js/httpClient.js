/**
 * class handle ajax request
 * @author NCThanh
 */

class HttpClient {
  get(url, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      callback(this);
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }

  post(url, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      callback(this);
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }
}

const httpClient = new HttpClient();