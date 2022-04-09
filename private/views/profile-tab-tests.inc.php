<h3>Tests</h3>
<nav class="navbar navbar-light bg-light">
    <form class="container-fluid">
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i>&nbsp;</span>
            <input value="<?=!empty($_GET['find']) ?$_GET['find']:''?>" type="text" class="form-control" placeholder="search" aria-label="Search" aria-describedby="basic-addon1">
        <input type="hidden" name="tab" value="tests">
        </div>
    </form>
</nav>
<?php
if ($row->rank == 'student'):?>
    <?php include (views_path('marked'))?>
<?php else:?>
<?php include (views_path('tests'))?>
<?php endif;?>
