<?php
class drawPagePost
{
	public $mess;
	public function setMsg($mess)
	{
		 $this->mess=$mess;
	}	
	public function get_msg()
	{
		return $this->mess;
	}	
	public function fills_form()
	{
		$postarr = array(
			$Job_post= filter_input(INPUT_POST,'Jpost'),
			$Job_Sal= filter_input(INPUT_POST,'PostSal'),
			$Job_Decp= filter_input(INPUT_POST,'PostDescp'),
			$Job_StartD= filter_input(INPUT_POST,'StartDate'),
			$Job_postD= date("Y/m/d"),
			$Job_EduR= filter_input(INPUT_POST,'EduRequire'),
			$Job_SKillR= filter_input(INPUT_POST,'SKillRequire'),
			$Job_SpecR= filter_input(INPUT_POST,'JObRequire'),
			$Job_ExpR= filter_input(INPUT_POST,'JObExp')
		);		
?>		<form method="POST" action="">
			<div class ="signbox menutext">
				<h1> Post A Job </h1>
				Position <input type = "text"  name = "Jpost" class="text_field" value="<?=$postarr[0]?>" required />
				Salary<input type="number" min="0" max="1000000000000" name="PostSal" class="text_field" value="<?=$postarr[1]?>" required>
				<bR> <bR>
				Description<textarea name="PostDescp" cols="70" rows="3"class="Long_field" value="<?=$postarr[2]?>"required /> </textarea>
				<BR> <bR>
				Starting Date <input type="Date" class="text_field" name="StartDate" value="<?=$postarr[3]?>" required>
				
				<bR><bR>
				Education Requirement <textarea name="EduRequire" cols="70" rows="2"class="Long_field" value="<?=$postarr[5]?>" /> </textarea>		
				<br><bR>
				Skill Requirement <textarea name="SKillRequire" cols="70" rows="2"class="Long_field" value="<?=$postarr[6]?>" /> </textarea>		
						<br><bR>
				Specific Job Requirement<textarea name="JObRequire" cols="70" rows="2"class="Long_field" value="<?=$postarr[7]?>" /> </textarea>		
				<bR><bR>
				Prior Job Experience<textarea name="JObExp" cols="70" rows="2"class="Long_field" value="<?=$postarr[8]?>" /> </textarea>		
				<BR>
				<span class = "exit"><b> <a href="menu.php" > Return to menu</a><b></span><BR>
				
				<input type="submit" value="Post" class =" mbottn button1" >
				<a href="logout.php" class="mbttn button1">Log Out</a> 
			</div>
		</form>
<?php
		
		
		return $postarr;
	}

	public function insert_job($Post_arr,$usename)
	{
		$IN_job="INSERT INTO `jobs`(`position`, `description`, `salary`, `start_date`, `posted_date`, `required_education`,
		`required_skills`, `required_job_specific`, `required_prior_experience`, `employer`) 
				VALUES('$Post_arr[0]','$Post_arr[2]','$Post_arr[1]','$Post_arr[3]','$Post_arr[4]',
				'$Post_arr[5]','$Post_arr[6]','$Post_arr[7]','$Post_arr[8]','$usename')";
				
				return $IN_job;
	}
}
?>