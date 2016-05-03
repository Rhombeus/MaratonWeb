<div class="games view">
<h2><?php echo __('Game'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player1'); ?></dt>
		<dd>
			<?php echo h($game['Game']['player1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player2'); ?></dt>
		<dd>
			<?php echo h($game['Game']['player2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1Score'); ?></dt>
		<dd>
			<?php echo h($game['Game']['p1Score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P2Score'); ?></dt>
		<dd>
			<?php echo h($game['Game']['p2Score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IngoranciaScore'); ?></dt>
		<dd>
			<?php echo h($game['Game']['ingoranciaScore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1turn'); ?></dt>
		<dd>
			<?php echo h($game['Game']['p1turn']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game'), array('action' => 'edit', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game'), array('action' => 'delete', $game['Game']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $game['Game']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('action' => 'add')); ?> </li>
	</ul>
</div>
