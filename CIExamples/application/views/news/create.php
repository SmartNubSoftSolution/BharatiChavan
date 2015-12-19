<div  width="55%" height="10%" top="40%" left="50%">
<h2>Create a news item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Text</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />

</form>
</div>