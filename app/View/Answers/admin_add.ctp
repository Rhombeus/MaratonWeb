<div class="answers form">
<?php echo $this->Form->create('Answer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Answer'); ?></legend>
	<?php
		echo $this->Form->input('answer_text');
		echo $this->Form->input('index');
		echo $this->Form->input('questions_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Answers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
