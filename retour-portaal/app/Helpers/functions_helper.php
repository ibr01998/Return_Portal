<?php

function clearSessions($array = array()){

    if(!in_array('sku', $array)){
        unset($_SESSION['sku']);

    }
    if (!in_array('items', $array)){
        unset($_SESSION['items']);

    }
    if (!in_array('order_id', $array)){
        unset($_SESSION['order_id']);

    }
    if (!in_array('shop_id', $array)){
        unset($_SESSION['shop_id']);

    }
    if (!in_array('reason', $array)){
        unset($_SESSION['reason']);

    }
    if (!in_array('amount', $array)){
        unset($_SESSION['amount']);

    }
    if (!in_array('description', $array)){
        unset($_SESSION['description']);

    }
    if (!in_array('back', $array)){
        unset($_SESSION['back']);

    }
    if (!in_array('customer', $array)){
        unset($_SESSION['customer']);

    }
    if (!in_array('postcode', $array)){
        unset($_SESSION['postcode']);

    }
    if (!in_array('email', $array)){
        unset($_SESSION['email']);

    }
    if (!in_array('settings', $array)){
        unset($_SESSION['settings']);
    }

}




