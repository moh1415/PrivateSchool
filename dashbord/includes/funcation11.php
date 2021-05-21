<?php
function comfirm($result){

    if (!$result)
    {
        global $con;
        die("query failed".mysqli_error($con));
    }



}



function all_student()
{
    global $con;
    $query = "select * from student";
    $list_student =mysqli_query($con,$query);
    return mysqli_num_rows($list_student);
}
function all_parent()
{
    global $con;
    $query = "select * from parent";
    $list_student =mysqli_query($con,$query);
    return mysqli_num_rows($list_student);
}
function all_teacher()
{
    global $con;
    $query = "select * from teacher";
    $list_student =mysqli_query($con,$query);
    return mysqli_num_rows($list_student);
}

function all_course()
{
    global $con;
    $query = "select * from course";
    $list_student =mysqli_query($con,$query);
    return mysqli_num_rows($list_student);
}

function notification($title,$class_id,$content,$t_id)
{
    global $con;
    $date = date("Y/m/d");
    $query = "INSERT INTO notification(content, date,c_id,t_id,title)";
    $query .= "VALUES('{$content}','{$date}','{$class_id}','{$t_id}','{$title}') ";
    $create_notification = mysqli_query($con, $query);
}
function find_class($course_id)
{
    global $con;
    $fact = array();
    $query = "select * from class where sub1={$course_id} or  sub2={$course_id} or sub3={$course_id} or sub4={$course_id} or sub5={$course_id} or sub6={$course_id} or sub7={$course_id}";

    $find_class =mysqli_query($con,$query);

    while ($row=mysqli_fetch_assoc($find_class))
    {

        $id =$row['c_id'];
        array_push( $fact, $id );
    }
    return $fact;
}
function find_class1($s_id)
{
    global $con;
//    $query = "select * from class where sub1={$course_id} or  sub2={$course_id} or sub3={$course_id} or sub4={$course_id} or sub5={$course_id} or sub6={$course_id} or sub7={$course_id}";
    $query1 = "select * from student where s_id=$s_id";
    // $find_class =mysqli_query($con,$query);
    $find_class1 =mysqli_query($con,$query1);
    $row1=mysqli_fetch_assoc($find_class1);
    $id1 =$row1['class'];
    //$row=mysqli_fetch_assoc($find_class);
    //$id =$row['c_id'];
    return $id1;
}
function view_notification($class_id)
{
    global $con;
    $fact = array();
    $query = "select * from notification where c_id={$class_id}";
    $find_class = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($find_class)) {
        $id = $row['c_id'];
        $content = $row['content'];
        $date = $row['date'];
        $title = $row['title'];
        array_push( $fact, $content,$date );

    }
    return $fact;
    //return $content . "<br>" . "<span>$date</span>";
}
function nums_notification($class_id)
{
    global $con;
    $today=date("Y/m/d");
    $query = "select * from notification where c_id={$class_id} and date='{$today}'";
    $find_class =mysqli_query($con,$query);
    $row=mysqli_num_rows($find_class);
    if ($row)
    {
        $row;
    }
    else {
        $row=0;
    }

    return $row;
}
function notification_par($title,$class_id,$content,$t_id,$s_id)
{
    global $con;
    $date = date("Y/m/d");
    $query = "INSERT INTO notification(content, date,c_id,t_id,title,s_id)";
    $query .= "VALUES('{$content}','{$date}','{$class_id}','{$t_id}','{$title}','{$s_id}') ";
    $create_notification = mysqli_query($con, $query);
}
function view_notification_par($s_id)
{
    global $con;
    $fact = array();
    $query = "select * from notification where c_id={$s_id}";
    $find_class = mysqli_query($con, $query);
    if ($find_class)
    {
        while ($row = mysqli_fetch_assoc($find_class)) {
            $id = $row['c_id'];
            $content = $row['content'];
            $date = $row['date'];
            $title = $row['title'];
            array_push( $fact, $content,$date );

//            return $content . "<br>" . "<span>$date</span>";
            echo $content . "<br>" . "<span>$date</span><br>";
        }

    }
    else {
        echo "<p>No notfication</p>";
    }

    //return $content . "<br>" . "<span>$date</span>";
}

function sendlownotifaction($s_id)
{
    global $con;
    $query = "select * from attendance where s_id={$s_id}";
    $find_att = mysqli_query($con, $query);
    $num_of_abs=mysqli_num_rows($find_att);
    if ($num_of_abs>15)
    {
        echo "<p>The student exude the limit 15%  </p><br>";
    }
    else {
                echo  $num_of_abs;
    }

}

function find_student_class($p_id)
{
    global $con;
    $query = "select * from student where p_id={$p_id}";
    $find_student = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($find_student);
    return $row['class'];

}
function find_course_id($t_id)
{
    global $con;
    $query = "select * from teacher where t_id={$t_id}";
    $find_student = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($find_student);
    return $row['c_id'];

}
function find_course_name($c_id)
{
    global $con;
    $query = "select * from course where crn={$c_id}";
    $find_student = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($find_student);
    return $row['c_name'];

}
function find_student_name($s_id)
{
    global $con;
    $query = "select * from student where s_id={$s_id}";
    $find_student = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($find_student);
    return $row['s_name'];

}