<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Game'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Game.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Game.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?></li>
	</ul>
</div>
