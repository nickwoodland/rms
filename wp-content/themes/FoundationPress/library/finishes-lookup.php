<?php
//really simple lookup array for product finishes. accepts (string)short finish code as a parameter returns array or false.
if ( ! function_exists( 'finishes_lookup' ) ) :
	function finishes_lookup($finish) {

        if(!$finish):
            return false;
        endif;

        $finishes_array = array(
            'bzp' => array('title' => 'Bright Zinc Plate', 'img' => '/assets/images/finishes/bzp.png'),
            'pg' =>  array('title' => 'Pre Galvanised', 'img' => '/assets/images/finishes/pg.png'),
            'hdg' =>  array('title' => 'Hot Dip Galvanised', 'img' => '/assets/images/finishes/hdg.png'),
            'epc' =>  array('title' => 'Epoxy Powder Coat', 'img' => '/assets/images/finishes/pc.png'),
            'ss' =>  array('title' => 'Stainless Steel', 'img' => '/assets/images/finishes/ss.png'),
            'wp' =>  array('title' => 'Waterproof', 'img' => '/assets/images/finishes/wp.png'),
            'br' => array('title' => 'Brass', 'img' => '/assets/images/finishes/br.png'),
            'ch' => array('title' => 'Chrome', 'img' => '/assets/images/finishes/ch.png'),
            'ali' => array('title' => 'Aluminium', 'img' => '/assets/images/finishes/ali.png'),
            'mg' => array('title' => 'Magnelis', 'img' => '/assets/images/finishes/mg.png')
        );

        $finish_return = $finishes_array[$finish];

        if(!empty($finish_return)):
            return $finish_return;
        else:
            return false;
        endif;

    }
endif;
?>
