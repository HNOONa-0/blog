<?php

/**
  * Escapes HTML for output
  * aids in preventing xss attacks
  */

function escape($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
?>