<?php
  class Product extends AppModel
  {
    var $name = 'Product';
    var $belongsTo = array ('Dealer' => array(
'className' => 'Dealer',
'foreignKey'=>'dealer_id')
    );
  }
?>