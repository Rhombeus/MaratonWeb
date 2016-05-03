<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('Add Game'); ?></legend>
	<?php
		echo $this->Form->input('player1');
		echo $this->Form->input('player2');
		echo $this->Form->input('p1Score');
		echo $this->Form->input('p2Score');
		echo $this->Form->input('ingoranciaScore');
		echo $this->Form->input('p1turn');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?></li>
	</ul>
</div>
