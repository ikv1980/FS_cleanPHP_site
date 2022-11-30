<?php

    //Секретный ключ интернет-магазина
    $key = "4c4777794b5b586267503042655a367a6764324634327142544b4a";

    $fields = array();

    // Добавление полей формы в ассоциативный массив
    $fields["WMI_MERCHANT_ID"]    = "136308335199";
    $fields["WMI_PAYMENT_AMOUNT"] = $sum;
    $fields["WMI_CURRENCY_ID"]    = "643";
    $fields["WMI_PAYMENT_NO"]     = time();
    $fields["WMI_DESCRIPTION"]    = "BASE64:".base64_encode("Покупка товаров на сайте itProger");
    $fields["WMI_EXPIRED_DATE"]   = date('Y-m-d')."T23:59:59";
    $fields["WMI_SUCCESS_URL"]    = "https://itproger.com/success";
    $fields["WMI_FAIL_URL"]       = "https://itproger.com/fail.php";
    $fields["id_of_tovar"]       = "ID-234567"; // Дополнительные параметры

    //Если требуется задать только определенные способы оплаты, раскоментируйте данную строку и перечислите требуемые способы оплаты.
    // $fields["WMI_PTENABLED"]      = array("UnistreamRUB", "SberbankRUB", "RussianPostRUB");

    //Сортировка значений внутри полей
    foreach($fields as $name => $val)
    {
        if(is_array($val))
        {
            usort($val, "strcasecmp");
            $fields[$name] = $val;
        }
    }

    // Формирование сообщения, путем объединения значений формы,
    // отсортированных по именам ключей в порядке возрастания.
    uksort($fields, "strcasecmp");
    $fieldValues = "";

    foreach($fields as $value)
    {
        if(is_array($value))
            foreach($value as $v)
            {
                //Конвертация из текущей кодировки (UTF-8)
                //необходима только если кодировка магазина отлична от Windows-1251
                $v = iconv("utf-8", "windows-1251", $v);
                $fieldValues .= $v;
            }
        else
        {
            //Конвертация из текущей кодировки (UTF-8)
            //необходима только если кодировка магазина отлична от Windows-1251
            $value = iconv("utf-8", "windows-1251", $value);
            $fieldValues .= $value;
        }
    }

    // Формирование значения параметра WMI_SIGNATURE, путем
    // вычисления отпечатка, сформированного выше сообщения,
    // по алгоритму MD5 и представление его в Base64

    $signature = base64_encode(pack("H*", md5($fieldValues . $key)));

    //Добавление параметра WMI_SIGNATURE в словарь параметров формы

    $fields["WMI_SIGNATURE"] = $signature;

    // Формирование HTML-кода платежной формы

    print "<form action='https://wl.walletone.com/checkout/checkout/Index' method='POST'>";

    foreach($fields as $key => $val)
    {
        if(is_array($val))
            foreach($val as $value)
            {
                print "<input type='hidden' name='$key' value='$value'/>";
            }
        else
            print "<input type='hidden' name='$key' value='$val'/>";
    }

    print "<button type='submit' class='btn'>Приоребсти (<b>".$sum." рублей</b>)</button></form>";

?>