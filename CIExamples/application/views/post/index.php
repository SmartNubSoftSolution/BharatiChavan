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
    .crud 
    {
        font-size: 12px;
        width: 100%;
    }
    .crud th
    {
        background-color: #242424;
        color:#efefef;
        padding:10px;
    }
    .crud td
    {
        background-color: #efefef;
        padding:10px;
        color:#242424;
    }
    .crud tr.even td
    {
        background-color: #fefefe;
    }
</style>
<div id="container">
<h1>Post Listing</h1>
<?php if($msg = $this->session->flashdata("message")): ?>
 
    <p class="success">
        <?=$msg?>
    </p>
 
<?php endif; ?>
<p><a href="<?=site_url('post/create')?>">New Post</a></p>
<table class="crud" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Post Content</th>
            <th>Post Status</th>
            <th>Post Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($posts as $post): ?>
        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
            <td><?=$post->id?></td>
            <td><?=$post->post_title?></td>
            <td><?=$post->post_content?></td>
            <td><?=$post->post_status?></td>
            <td><?=$post->post_date?></td>
            <td><a href="<?=site_url("post/edit/".$post->id)?>">edit</a> <a href="<?=site_url("post/delete/".$post->id)?>">delete</a></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>