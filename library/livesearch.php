<?php

$q = $_GET["q"];

// //lookup all links from the xml file if length of q>0
// if (strlen($q)>0) {
//   $hint="";
//   for($i=0; $i<($x->length); $i++) {
//     $y=$x->item($i)->getElementsByTagName('title');
//     $z=$x->item($i)->getElementsByTagName('url');
//     if ($y->item(0)->nodeType==1) {
//       //find a link matching the search text
//       if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
//         if ($hint=="") {
//           $hint="<a href='" .
//           $z->item(0)->childNodes->item(0)->nodeValue .
//           "' target='_blank'>" .
//           $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
//         } else {
//           $hint=$hint . "<br /><a href='" .
//           $z->item(0)->childNodes->item(0)->nodeValue .
//           "' target='_blank'>" .
//           $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
//         }
//       }
//     }
//   }
// }

$hint = "";
if ($hint == "") {
  $response = "Not found!";
} else {
  $response = $hint;
}

//output the response
echo $response;
