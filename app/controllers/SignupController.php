<?php

/**
 * SessionController
 *
 * Allows to register new users
 */

class SignupController extends ControllerBase
{
    public function initialize()
    {

        $this->tag->setTitle('Sign Up');
        parent::initialize();
    }

    /**
     * Action to register a new user
     */
   	//Displays basic page and Signups a user.
	public function indexAction()
	{
		//Function to generate a random string to be used as salt.
		function genUniqueReset ($length = 8)
		{
			  // given a string length, returns a random password of that length
		  $UniqueReset = "";
		  // define possible characters
		  $possible = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		  $i = 0;
		  // add random characters to $password until $length is reached
		  while ($i < $length) {
		    // pick a random character from the possible ones
		    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		    // we don't want this character if it's already in the password
		    if (!strstr($UniqueReset, $char)) {
		      $UniqueReset .= $char;
		      $i++;
		    }
		  }
		  return $UniqueReset;
		};
		//If the form is posted to this action then it runs.
		if($this->request->isPost())
		{
			//Get all posted values from form.
			$rollno=$this->request->getPost('roll');
			$name=$this->request->getPost('name');
			$email=$rollno.'@kiit.ac.in';
			$password=$this->request->getPost('pass');
			$cpass=$this->request->getPost('cpass');
			
			//check if a user exists with this email address.
			
			$user = User::findFirst(array(
              		  "(u_email = :email:)",
                	  'bind' => array('email' => $email)
           		 ));
			if($user==false)
			{
				//check if passwords and confirm passwords match.
				if ($password == $cpass)
				{
					//Set salt and generate password combining user password and salt.
					
					$salt=genUniqueReset(16);
					$pass=sha1($password.$salt);
					//Create row in database by invoking corresponding Model Class. Set all required coloumn values accordingly.
					$user=new User();
					$user->name=$name;
					$user->u_email=$email;
					$user->pass=$pass;
					$user->salt=$salt;
					$user->score=0;
					$user->reset=genUniqueReset(50);
					$user->roll_no=$rollno;
					//Save the row in the database.
					if ($user->save()==0) {
						foreach ($user->getMessages() as $message) {
				  		  echo $message;
			     			}
					}
					else
					{
						$msg=array ("html" => "Hi ".$name.",<br>Welcome To KIIT Online Judge. <br>Please confirm your email by clicking on this link: <br> <a href='http://localhost/KiitOJ/signup/confirm/".$user->roll_no."/".$user->reset."'>Continue</a><br> Else please copy paste this link on your browser's URL bar: <br> <a href='http://localhost/KiitOJ/signup/confirm/".$user->roll_no."/".$user->reset."'>http://localhost/KiitOJ/signup/confirm/".$user->roll_no."/".$user->reset."</a><br>  Thank you.",
							"subject" =>"KIIT Online Judge:Confirmation email",
							"toemail" => $email,
							"fromemail" =>"noreply@kiitoj.com",
							"fromname" =>"KIIT Online Judge",
							"trackopen" => true );
						
						$mandrill = new MandrillController();
						$mandrill->sendAction($msg);
						$this->flash->notice('Please Verify Your Email Address.');
						//$this->response->redirect('login');
					}
				}
				else
				{
					$this->flash->error('Passwords do not match.');
				}
			}
			else
			{
				$this->flash->error('Email Id already registered');
			}
		}
	}

	public function confirmAction($roll,$reset)
	{
		if($roll == NULL || $reset==NULL)
		{
			return $this->response->redirect("404");
		}

		$user = User::findFirst(array(
              		  "(roll_no = :id:)",
                	  'bind' => array('id' => $roll)
           		 ));
		if($user->reset==$reset)
		{
			//update user as active.
			$user->reset=NULL;
			$user->active=1;
			$user->save();
			$this->flash->success('<span class="glyphicon glyphicon-info-sign"></span>  Email verified.');
		
		}
		$this->response->redirect('login');
	}


	public function teachersignupAction()
	{
		//Function to generate a random string to be used as salt.
		function genUniqueReset ($length = 8)
		{
			  // given a string length, returns a random password of that length
		  $UniqueReset = "";
		  // define possible characters
		  $possible = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		  $i = 0;
		  // add random characters to $password until $length is reached
		  while ($i < $length) {
		    // pick a random character from the possible ones
		    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		    // we don't want this character if it's already in the password
		    if (!strstr($UniqueReset, $char)) {
		      $UniqueReset .= $char;
		      $i++;
		    }
		  }
		  return $UniqueReset;
		};
		//If the form is posted to this action then it runs.
		if($this->request->isPost())
		{
			//Get all posted values from form.
			$email=mb_strtolower($this->request->getPost('email'));
			$name=$this->request->getPost('name');
			$password=$this->request->getPost('pass');
			$cpass=$this->request->getPost('cpass');
			
			//check if a user exists with this email address.
			
			$user = Teacher::findFirst(array(
              		  "(email = :email:)",
                	  'bind' => array('email' => $email)
           		 ));
			if($user==false)
			{
				//check if passwords and confirm passwords match.
				if ($password == $cpass)
				{
					//Set salt and generate password combining user password and salt.
					
					$salt=genUniqueReset(16);
					$pass=sha1($password.$salt);
					//Create row in database by invoking corresponding Model Class. Set all required coloumn values accordingly.
					$user=new Teacher();
					$user->name=$name;
					$user->email=$email;
					$user->pass=$pass;
					$user->salt=$salt;
					$user->reset=genUniqueReset(50);
					$user->active=0;
					//Save the row in the database.
					if ($user->save()==0) {
						foreach ($user->getMessages() as $message) {
				  		  echo $message;
			     			}
					}
					else
					{
						$msg=array ("html" => "Hi ".$name.",<br>Welcome To KIIT Online Judge. <br>Please confirm your email by clicking on this link: <br> <a href='http://localhost/KiitOJ/signup/teacherconfirm/".$user->t_id."/".$user->reset."'>Continue</a><br> Else please copy paste this link on your browser's URL bar: <br> <a href='http://localhost/KiitOJ/signup/teacherconfirm/".$user->t_id."/".$user->reset."'>http://localhost/KiitOJ/signup/teacherconfirm/".$user->t_id."/".$user->reset."</a><br>  Thank you.",
							"subject" =>"KIIT Online Judge:Confirmation email",
							"toemail" => $email,
							"fromemail" =>"noreply@kiitoj.com",
							"fromname" =>"KIIT Online Judge",
							"trackopen" => true );
						
						$mandrill = new MandrillController();
						$mandrill->sendAction($msg);
						$this->flash->notice('Please Verify Your Email Address.');
						//$this->response->redirect('login');
					}
				}
				else
				{
					$this->flash->error('Passwords do not match.');
				}
			}
			else
			{
				$this->flash->error('Email Id already registered');
			}
		}
	}

	public function teacherconfirmAction($tid,$reset)
	{
		if($tid == NULL || $reset==NULL)
		{
			return $this->response->redirect("404");
		}

		$user = Teacher::findFirst(array(
              		  "(t_id = :id:)",
                	  'bind' => array('id' => $tid)
           		 ));
		if($user->reset==$reset)
		{
			//update user as active.
			$user->reset=NULL;
			$user->active=1;
			$user->save();
			$this->flash->success('<span class="glyphicon glyphicon-info-sign"></span>  Email verified.');
		
		}
		$this->response->redirect('login');
	}
}






