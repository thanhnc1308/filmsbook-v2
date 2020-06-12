<?php
class GenreThumbnail {
    protected $name;
    protected $id;
    
    function __construct($id, $name) {
        $this->name = $name;
        $this->id = $id;
    }
    
    function render($html) {
        echo "<div>";
        echo "<a href=\"";
        echo $html->getHref('genres/view/' . $this->id);
        echo "\">" . $this->name . "</a>";
        echo "</div>";
    }
}
?>