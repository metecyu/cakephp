<?php
  class Dealer extends AppModel
  {
    var $name = 'Dealer';
    var $hasMany = array ('Product' => array(
'className' => 'Product',
'foreignKey'=>'dealer_id')
    );
  }
?>