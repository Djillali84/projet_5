<?php

namespace OpenFram;

function u($string = "")
{
    return urlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}
