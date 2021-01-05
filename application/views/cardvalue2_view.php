<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<h1>เติมเงิน</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID </th>
            <th>card type </th>
            <th>Card No</th>
            <th> Card Value</th>
            <th> Card Expire</th>
        </tr>
    </thead>
    <tbody>

        
  

<?php
// print_r($xValue);
foreach ($xValue as $key_xValue=> $value_xValue) {
   
     
    ?>
        <tr>
            <td scope="row"> <?php  echo $value_xValue->data_id   ?></td>
            <td> <?php  echo $value_xValue->card_type_id   ?></td>
            <td> <?php  echo $value_xValue->card_no   ?></td>
            <td> <?php  echo $value_xValue->card_value  ?></td>
            <td> <?php  echo $value_xValue->card_expire  ?></td>
        </tr>

<?php
}
?>
  </tbody>
</table>


<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>