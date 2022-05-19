<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Table extends CI_Table {
	protected function _default_template()
	{
		return array(
                        'table_open'		=> '<table border="" cellpadding="3" cellspacing="0">',

			'thead_open'		=> '<thead style="background-color:orange">',
			'thead_close'		=> '</thead>',

			'heading_row_start'	=> '<tr>',
			'heading_row_end'	=> '</tr>',
			'heading_cell_start'	=> '<th>',
			'heading_cell_end'	=> '</th>',

			'tbody_open'		=> '<tbody>',
			'tbody_close'		=> '</tbody>',

			'row_start'		=> '<tr style="background-color:#66cc00">',
			'row_end'		=> '</tr>',
			'cell_start'		=> '<td>',
			'cell_end'		=> '</td>',

			'row_alt_start'		=> '<tr style="background-color:#ff1493">',	
			'row_alt_end'		=> '</tr>',
			'cell_alt_start'	=> '<td>',
			'cell_alt_end'		=> '</font></td>',

			'table_close'		=> '</table>'
		);
	}	

}
