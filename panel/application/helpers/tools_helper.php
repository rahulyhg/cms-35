<?php

function createSlug($data)
{
    $turkishCharacter = array("Ç", "ç", "ğ", "Ğ", "Ü", "ü", "Ö", "ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "?", "*", "_", "|", "=", " ", "\"", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkishCharacter, $convert, $data));
}