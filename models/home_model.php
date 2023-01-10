<?php
$auteur = Authors::getAllAuthors();
$names= Authors::getByName("ridovic");
debug($names);
exit;