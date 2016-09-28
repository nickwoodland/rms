<?php foreach($table_meta as $table_id): ?>
    <div class="product-table__wrapper">
        <?php //tablepress_print_table( array( 'id' => $table_id, 'use_datatables' => false, 'print_name' => false ) ); ?>
        <?php echo do_shortcode('[table id='.$table_id.' row_highlight="blue||lgrey||dgrey||bold" use_datatables="false" print_name="false" row_highlight_full_cell_match="false" /]'); ?>
    </div>
<?php endforeach; ?>
