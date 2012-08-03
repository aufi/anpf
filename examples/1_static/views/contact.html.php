<h3>Contact page</h3>

<p>You can go back to <a href="<?php echo $this->url_for('route_index'); ?>">index page</a>.</p>

<?php if (isset($last_message)) { ?>
	<h3>Great! Last message you sent is: "<?php echo $last_message; ?>"</h3>
<?php } ?>

<p>Let's send a message.</p>

<form action="<?php echo $this->url_for('route_contact'); ?>" method="post">
	
	<label for="message">Your message<label>
	<input type="text" name="message" id="message">
	<input type="submit" name="action_message" value="Send message">
	
</form>