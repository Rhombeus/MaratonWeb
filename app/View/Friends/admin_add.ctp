<div class="friends form">
<?php echo $this->Form->create('Friend'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Friend'); ?></legend>
	<?php
		echo $this->Form->input('user_from');
		echo $this->Form->input('user_to');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Friends'), array('action' => 'index')); ?></li>
	</ul>
</div>
