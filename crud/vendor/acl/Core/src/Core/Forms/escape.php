<?php
/**
 *
 * Filter Escape Characters
 * Filter Escape
 *
 *
 *
 * @param string $valueToEscape
 * @return string
 */
function escape($valueToEscape){
    return addslashes($valueToEscape);         
}