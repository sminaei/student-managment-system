<?php
/**
 * class controller
 */
class Classes extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $classes = new Classes_model();
        $school_id = Auth::getSchool_id();

        if (Auth::access('admin')){
            $query="select * from classes where school_id = :school_id && year(date) = :school_year order by id desc";
            $arr['school_id'] =$school_id;
            $arr['school_year'] = !empty($_SESSION['SCHOOL_YEAR']->year) ? $_SESSION['SCHOOL_YEAR']->year : date("Y",time());

            if (isset($_GET['find'])){
                $find = '%' . $_GET['find'] . '%';
                $query = "select * from classes where school_id = :school_id  && (class like :find) && year(date) = :school_year order by id desc";
                $arr['find'] = $find;
            }
            $data = $classes->query($query,$arr);
        }else{
            $class = new Classes_model();
            $mytable = "class_students";
            if (Auth::getRank() == "lecturer"){
                $mytable = "class_lecturers";
            }
            $query="select * from classes where (class_id in (select class_id from $mytable where user_id =:user_id && disabled =0) && year(date) = :school_year) || user_id =:user_id ";
            $arr['user_id'] = Auth::getUser_id() ;
            $arr['school_year'] =!empty($_SESSION['SCHOOL_YEAR']->year) ? $_SESSION['SCHOOL_YEAR']->year : date("Y",time());

            if (isset($_GET['find'])){
                $find = '%' . $_GET['find'] . '%';
                $query = "select classes.class, {$mytable}.* from $mytable join classes on classes.class_id =  {$mytable}.class_id  where ({$mytable}.user_id =:user_id && {$mytable}.disabled = 0 && classes.class like :find && year(classes.date) = :school_year)";
                $arr['find'] = $find;
            }
            $data =$class->query($query,$arr);
       /*     $arr['stud_classes'] = $class->query($query,$arr);
//get class ids from classes that dont already have member
            $classes_i_own =$class->where('user_id' ,Auth::getUser_id());
            if ($classes_i_own && $arr['stud_classes'])
            {
                $arr['stud_classes'] =array_merge($classes_i_own,$arr['stud_classes']);
            }

            $data=array();
            if ($arr['stud_classes']){
                $all_classes = array_column($arr['stud_classes'],'class_id');
                $all_classes = array_unique($all_classes);
                foreach ($all_classes as $class_id){
                    $data[]= $class->first('class_id',$class_id);
                }
            }
       */
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];

        $this->view('classes', [
            'crumbs' => $crumbs,
            'rows' => $data,

        ]);
    }

    public function add()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $errors = array();
        if (count($_POST) > 0) {
            $classes = new Classes_model();
            if ($classes->validate($_POST)) {
                $_POST['date'] = date("Y-m-d H:i:s");
                $classes->insert($_POST);
                $this->redirect('classes');
            } else {
                $errors = $classes->errors;
            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Add', 'classes/add'];


        $this->view('classes.add', [
            'errors' => $errors,
            'crumbs' => $crumbs,
        ]);
    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $classes = new Classes_model();
        $row = $classes->where('id', $id);

        $errors = array();
        if (count($_POST) > 0 && Auth::access('lecturer') && Auth::i_own_content($row)) {

            if ($classes->validate($_POST)) {

                $classes->update($id, $_POST);
                $this->redirect('classes');
            } else {
                $errors = $classes->errors;
            }
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Edit', 'classes/edit'];

        if (Auth::access('lecturer') && Auth::i_own_content($row)){
            $this->view('classes.edit', [
                'row' => $row,
                'errors' => $errors,
                'crumbs' => $crumbs,
            ]);
        }else{
            $this->view('access-denied');
        }


    }

    public function delete($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $classes = new Classes_model();
        $row = $classes->where('id', $id);

        $errors = array();

        if (count($_POST) > 0 && Auth::access('lecturer')  && Auth::i_own_content($row)) {

            $classes->delete($id);
            $this->redirect('classes');
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Delete', 'classes/delete'];

        if (Auth::access('lecturer') && Auth::i_own_content($row)){
            $this->view('classes.delete', [
                'row' => $row,
                'crumbs' => $crumbs,
            ]);
        }else{
            $this->view('access-denied');

        }

    }

}