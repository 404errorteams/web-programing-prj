<?php if ($this->Paginator->hasPage(2)):?>

	<?php 
		if (!isset($class)) {
			$class = 'pagination pagination-centered';
		}
	?>
	<div class="<?php echo $class;?>">
		<ul>
		    <li>
		    	<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled'));?>
		    </li>
		    <li>
		    	<?php 
		    		echo $this->Paginator->numbers(
		    			array(
		    				'first' => __('先頭'),
		    				'last' => __('最後'),
		    				'modulus' => 9, 
		    				'separator' => false
		    			)
		    		);
		    	?>
		    	
		    </li>
		    <li><?php echo $this->Paginator->next('>>', array(), null, array('class' => 'next disabled'));?></li>
	  	</ul>
	</div>

<?php endif;?>