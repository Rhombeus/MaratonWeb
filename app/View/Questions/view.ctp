<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Text'); ?></dt>
		<dd>
			<?php echo h($question['Question']['question_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correct'); ?></dt>
		<dd>
			<?php echo h($question['Question']['correct']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($question['Question']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Category']['description'], array('controller' => 'categories', 'action' => 'view', $question['Category']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $question['Question']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('controller' => 'answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Respuestas'), array('controller' => 'answers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Answers'); ?></h3>
	<?php if (!empty($question['respuestas'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Answer Text'); ?></th>
		<th><?php echo __('Index'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Questions Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($question['respuestas'] as $respuestas): ?>
		<tr>
			<td><?php echo $respuestas['id']; ?></td>
			<td><?php echo $respuestas['answer_text']; ?></td>
			<td><?php echo $respuestas['index']; ?></td>
			<td><?php echo $respuestas['created']; ?></td>
			<td><?php echo $respuestas['modified']; ?></td>
			<td><?php echo $respuestas['questions_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'answers', 'action' => 'view', $respuestas['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'answers', 'action' => 'edit', $respuestas['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'answers', 'action' => 'delete', $respuestas['id']), array('confirm' => __('Are you sure you want to delete # %s?', $respuestas['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Respuestas'), array('controller' => 'answers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
