<style type="text/css">
    #container
    {
        width:900px;
        background-color: #d8d8d8;
        margin: auto;
        padding:20px;
        font-size:14px;
        font-family:tahoma;
    }
    label
    {
        vertical-align: top;
        padding:5px;
    }
    input,textarea
    {
        padding:5px;
    }
    .success
    {
        color:green;
    }
</style>
<div id="container">
<h1>Edit Post: <?= $post->post_title ?></h1>
<?php if($msg = $this->session->flashdata("message")): ?>
    <p class="success">
        <?=$msg?>
    </p>
<?php endif; ?>
<form action="" method="post">
    <p>
        <label for="post_title">Post Title:</label>
        <input type="text" name="post[post_title]" id="post_title" value="<?=$post->post_title?>"/>
    </p>
    <p>
        <label for="post_content">Post Content:</label>
        <textarea name="post[post_content]" id="post_content" rows="5" cols="40"><?=$post->post_content?></textarea>
    </p>
    <p>
        <label for="post_status">Status:</label>
        <select name="post[post_status]">
            <option value="publish" <?=$post->post_status == 'publish' ? 'selected' : '' ?>>Publish</option>
            <option value="draft" <?=$post->post_status == 'draft' ? 'selected' : '' ?>>Draft</option>
        </select>
    </p>
    <p>
        <input type="submit" name="update_post" value="Update Post" />
    </p>
</form>
</div>