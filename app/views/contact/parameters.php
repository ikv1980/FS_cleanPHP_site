<?php
if (!isset($data['message']))
    if(count($data) != 0) {
        echo '
        <hr style="margin-top: 10px">
        <h2 style="margin-top: 30px">Есть дополнительные параметры:</h2>
        <span>Данные из URL:
        <b>
        ';
        foreach ($data as $el)
            echo $el . ', ';
        echo '</b></span>';
    }
