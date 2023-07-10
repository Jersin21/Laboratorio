<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yc2b004bcjth0ohvtzadlvojgigwmnm4jbhmqoazt3054z0i"></script>

<?php

setlocale(LC_TIME, "spanish");
$fechaescrita = strftime("%d   de   %B   de   %Y");

?>
<style type="text/css">
    .table {
    width: 100%;
    border: 2px solid #808080;
    border-collapse: collapse;
  }

  .td {
    border: 1px solid #808080;
    padding: 5px;
  }

  .th{
  padding: 3px;
    border: 0.5px solid #808080;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <table class="table_proforma table" width="100%" style="font-size:18px">
                 
                <thead>
                    <tr>
                        <th class="th" width="100%" style="font-size:19px"><strong style="text-align:center;"><?=$data[0]?></strong></th>
                    </tr>
                    <tr>
                        <th class="th" width="60%" ><strong style="text-align:center;">ANALISIS</strong></th>
                        <th class="th" width="40%" ><strong style="text-align:center;">CANTIDAD</strong></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $cat = "";
                    foreach ($data[1] as $solicitud) {
                    ?>  

                        <?php                         
                         if($cat != $solicitud["categoria"]){
                        ?> 
                            <tr>
                                <td class="td" width="60%" style="font-size:13px"><strong style="text-align:center;"><?=$solicitud["categoria"]?></strong></td>
                                <td class="td" width="40%" style="text-align:center; font-size:16px"></td>
                            </tr>

                        <?php
                            $cat = $solicitud["categoria"];
                        }?> 
                        <tr>
                            <td class="td" width="60%" style="font-size:16px"><?=$solicitud["name"]?></td>
                            <td class="td" width="40%" style="text-align:center; font-size:16px"><?=$solicitud["cantidadSolicitada"]?></td>
                        </tr>
                    <?php  }?>    

                </tbody>
            </table>
        </div>
    </div>
</div>
