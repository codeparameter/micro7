<?php

function _global($var_name){
    global ${$var_name};
    return ${$var_name};
}