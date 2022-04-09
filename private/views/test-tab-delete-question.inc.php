<?php if (is_object($question)):?>
<center><h5>Delete  Question</h5></center>
<form method="post" enctype="multipart/form-data">

    <?php if(count($errors) > 0):?>
        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
            <strong>Errors:</strong>
            <?php foreach($errors as $error):?>
                <br><?=$error?>
            <?php endforeach;?>
            <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </span>
        </div>
    <?php endif;?>

    <label>Question:</label>
    <textarea autofocus class="form-control" name="question" placeholder="Type your question here"> <?=get_var('question',$question->question)?></textarea>
    <div class="input-group mb-3 pt-3">
        <label class="input-group-text" for="inputGroupFile01">Comment(optional)</label>
        <input  readonly type="text" name="comment" value="<?=get_var('comment',$question->comment)?>" class="form-control"  placeholder="comment">
       </div>
    <div>
        <?php if (file_exists($question->image)):?>
        <img src="<?=ROOT.'/'.$question->image?>" class="d-block mx-auto w-50">
        <?php endif;?>
    </div>
    <a href="<?=ROOT?>/single_test/<?=$row->test_id?>?">
        <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</button>
    </a>

    <button class="btn btn-danger float-end">Delete</button>
<div></div>
</form>
<?php else:?>
Sorry that question not fount
<br>
<a href="<?=ROOT?>/single_test/<?=$row->test_id?>?">
    <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</button>
</a>
<?php endif;?>
