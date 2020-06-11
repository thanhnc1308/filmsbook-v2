/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.getElementById("addcast-btn").addEventListener("click", function(event) {
    event.preventDefault();
    var castinput_parent = document.getElementById('cast-input-parent');
    var castinput = document.getElementById('cast-input');
    var clone_castinput = castinput.cloneNode(true);
    castinput_parent.appendChild(clone_castinput);
})