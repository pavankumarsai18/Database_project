<?php>
    function position()
    {
        $value= floatval( pow({$coordinates1[lat]}-{$coordinates1[lat]}, 2)+pow({$coordinates1[lon]}-{$coordinates2[lon]},2));
        $result=floatval( sqrt(value)*3958.8);
    }
?>