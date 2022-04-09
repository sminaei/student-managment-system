
    <?php $this->view('includes/header')?>
    <?php $this->view('includes/nav')?>
    <style>
        h1{
            font-size: 80px;
            color: limegreen;
        }
        a{
            text-decoration: none;
        }
    </style>

    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
<div class="row justify-content-center">
<?php if (Auth::access('super-admin')):?>
    <div class="col-3 shadow rounded m-4 p-0 border">
        <a href="<?=ROOT?>/schools">
        <div class="card-header">SCHOOLS</div>
        <h1 class="text-center">
            <i class="fa fa-graduation-cap"></i>
        </h1>
        <div class="card-footer">View All Schools</div>
        </a>
    </div>
    <?php endif;?>
    <?php if (Auth::access('super-admin')):?>

    <div class="col-3 shadow rounded m-4 p-0 border">
        <a href="<?=ROOT?>/users">
        <div class="card-header">STAFF</div>
        <h1 class="text-center">
            <i class="fa fa-chalkboard-teacher"></i>
        </h1>
        <div class="card-footer">View All staff member</div>
        </a>
    </div>
    <?php endif;?>
    <?php if (Auth::access('reception')):?>

    <div class="col-3 shadow rounded m-4 p-0 border">
        <a href="<?=ROOT?>/students">
        <div class="card-header">STUDENTS</div>
        <h1 class="text-center">
            <i class="fa fa-user-graduate"></i>
        </h1>
        <div class="card-footer">View All students</div>
        </a>
    </div>
    <?php endif;?>

    <div class="col-3 shadow rounded m-4 p-0 border">
        <a href="<?=ROOT?>/classes">
        <div class="card-header">CLASSES</div>
        <h1 class="text-center">
            <i class="fa fa-university"></i>
        </h1>
        <div class="card-footer">View All classes</div>
        </a>
    </div>
    <div class="col-3 shadow rounded m-4 p-0 border">
        <a href="<?=ROOT?>/tests">
        <div class="card-header">TESTS</div>
        <h1 class="text-center">
            <i class="fa fa-file-signature"></i>
        </h1>
    <div class="card-footer">View All tests</div>
        </a>
    </div>
    <?php if (Auth::access('admin')):?>

        <div class="col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/statistic">
            <div class="card-header">STATISTIC</div>
            <h1 class="text-center">
                <i class="fa fa-graduation-cap"></i>
            </h1>
            <div class="card-footer">View All statistic</div>
            </a>
        </div>
     <?php endif?>
        <div class="col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/setting">
            <div class="card-header">SETTING</div>
            <h1 class="text-center">
                <i class="fa fa-cogs"></i>
            </h1>
            <div class="card-footer">View All setting</div>
            </a>
        </div>
        <div class="col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/profile">
            <div class="card-header">PROFILE</div>
            <h1 class="text-center">
                <i class="fa fa-id-card"></i>
            </h1>

            <div class="card-footer">View your profiles</div>
            </a>
        </div>
            <div class="col-3 shadow rounded m-4 p-0 border">
                <a href="<?=ROOT?>/logout">
                <div class="card-header">LOGOUT</div>
                <h1 class="text-center">
                    <i class="fa fa-sign-out-alt"></i>
                </h1>
                <div class="card-footer">Logout from system</div>
                </a>
            </div>
        </div>

    </div>
    <?php $this->view('includes/footer')?>
