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

  post(url, payload, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      callback(this);
    };
    xmlhttp.open("POST", url, true);
    const formData = new FormData();
    for (const key in payload) {
      if (payload.hasOwnProperty(key)) {
        const element = payload[key];
        formData.append(key, element);
      }
    }
    xmlhttp.send(formData);
  }
}

const httpClient = new HttpClient();