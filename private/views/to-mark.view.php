
<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>

    <h4>Tests to mark</h4>
    <nav class="navbar navbar-light">
        <form class="form-inline">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i>&nbsp</button>
                </div>
                <input name="find" value="<?=isset($_GET['find'])? $_GET['find']:'';?>" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon1">
            </div>
        </form>

    </nav>
    <?php include(views_path('to-mark'));?>

</div>
<?php $this->view('includes/footer')?>
