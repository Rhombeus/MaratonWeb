<div class="answers view">
<h2><?php echo __('Answer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($answer['Answer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer Text'); ?></dt>
		<dd>
			<?php echo h($answer['Answer']['answer_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Index'); ?></dt>
		<dd>
			<?php echo h($answer['Answer']['index']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($answer['Answer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($answer['Answer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questions'); ?></dt>
		<dd>
			<?php echo $this->Html->link($answer['Questions']['id'], array('controller' => 'questions', 'action' => 'view', $answer['Questions']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answer'), array('action' => 'edit', $answer['Answer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answer'), array('action' => 'delete', $answer['Answer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $answer['Answer']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
