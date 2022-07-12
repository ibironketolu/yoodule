<style>
	#apikey{
		width: 200px;
		margin-bottom: 20px;
		margin-top: 10px;
	}

	.stripe{
		align-items: center;
	}

	#btnSubmitApi{
		background-color: #006dcb;
		color: white;
		border: 0px solid white;
		height: 40px;
		width: 100px;
		border-radius: 5%;
	}
</style>

<?php  

   if ($_SERVER['REQUEST_METHOD']=='POST') {
       include_once 'insertkey.php';
       //Create an object of the class
       $obj = new Stripe();
       $stripekey =($_POST['stripekey']);

       $output = $obj->insertKey($stripekey);

       if ($output ==true) {
         echo "<div class='alert alert-success alert-dismissible fade show 'role='alert'>success category created</div>";
       }else{
        echo "<div class='alert alert-danger alert-dismissible fade show 'role='alert'>Could not be created</div>";
       }



    }



 ?>


<?php  
/**
 * Plugin Name: yodule_stripe
 * Plugin URI: https://yodule.com
 * Description: A wordpress plugin to fetch all the prices from stripe
 * Version: 1.0.0
 * Author: Yoodule
 * Author URI: https://yodule.com/
 * 
 */


add_action("admin_menu", "addMenu");

#create a function to place the menu in an option bar
function addMenu(){
  add_menu_page("Plugin Name", "Yoodule", 4, "plugin-options", "yooduleMenu" );
}

function yooduleMenu(){

echo  "<div class='stripe'>
<h1>Connect to Strip Database</h1>
<form action='#' method='POST'> 
<label style='font-size:20px'>Key</label>
<br>
<input type='text' name='stripekey' id='apikey' \>
<br>
<button type='submit' name='btnSubmit' id='btnSubmitApi'>SAVE KEY</button>
</form>



</div>";
}














?>

