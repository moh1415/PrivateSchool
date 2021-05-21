<?php

include  "includes/header.php";



?>









<?php
if(isset($_POST['button4']))
{

$b = $_POST['name'];

    



$query = " select * from syllabus WHERE sy_id = $b" ;

$result = mysqli_query($con,$query);
    
    $vw = mysqli_fetch_assoc($result);
    
    $a = $vw['content'];
    

    

    

if ($result)
{ ?>
    <a href="<?php echo $a ?>"><h1> click here to download the file  </h1></a> <?php } 

else 
    {
header('location:view_syllabus1.php?s=0');
    


}
            


}

?>






			  <div>
                  
                  
               <?php 
    if(isset($_GET['s'])&& $_GET['s']==1)       {?>
    <a href="<?php echo $a ?>"><h1> click here to download the file  </h1></a>
    
    <?php } else if(isset($_GET['s'])&& $_GET['s']==0)       {?>
    
   <a href="view_syllabus1.php"> <p> there is no file. please try again later</p></a>
    
    <?php } else { ?>       
                  
                 <div class="container">
                  
                  
  <form name="sample" action="View_syllabus1.php" method="post">
        <fieldset>
            <legend>View Syllabus</legend>
            <br/>
                            <label for="name">ID: </label>
                <input type="text" name="name" id="name" maxlength="10" required placeholder="Enter Syllabus ID here"/>
            
            
            
            			<input class = "btn" type="submit" name="button4" id="button4" value ="View"/>
            
            
                  </fieldset>
			</form>
                     </div> 
			</div>
			 
			 			               <?php 

              include 'footer.php';
              ?>


<?php }?>