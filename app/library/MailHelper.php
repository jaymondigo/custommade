<?php
	class MailHelper {

		public static function qualifyToPremiumMessage($data) {
			
		}

		public static function afterPurchaseMessage($order)
		{
			Mail::send('emails.after_purchase', array('order' => $order), function($message) use ($order)
			{
			    $message->to($order->user->email)->subject('We have received your Order');
			    $message->from('hello@dreambuildersolutions.com', 'Dream Builder Solutions');
			});
		}

		public static function helpMessage($data) {

			$msg = nl2br($data['message']);
			$name = $data['name'];
			$email = $data['email'];


			Mail::send('emails.help_message', array('msg' => $msg), function($message) use ($name, $email)
			{
			    $message->to('support@dreambuildersolutions.com')->subject('Dream Builder Solutions - Need Help');
			    $message->from($email, $name);
			});

		}

		public static function feedbackMessage($name, $email, $feedback)
		{

			Mail::send('emails.feedback', array('feedback' => $feedback), function($message) use ($name, $email)
			{
			    $message->to('support@dreambuildersolutions.com')->subject('Dream Builder Solutions - Portal - Feedback');
			    $message->from($email, $name);
			});

			// self::sendHtmlEmail('support@dreambuildersolutions.com', 'Dream Builder Solutions - Portal - Feedback',	$feedback, Auth::user()->email);
		}

		public static function afterPurchaseFeedback($name, $email, $feedback)
		{
			Mail::send('emails.after_purchase_feedback', array('feedback' => $feedback), function($message) use ($name, $email)
			{
			    $message->to('support@dreambuildersolutions.com')->subject('Dream Builder Solutions -  Feedback After Purchase');
			    $message->from($email, $name);
			});

		}

		public static function referralMessage($email)
		{

			Mail::send('emails.referral', array(), function($message) use($email)
			{
			    $message->to($email)->subject('Wicked cool stuff I\'ve tried.');
			    $message->from('hello@dreambuildersolutions.com', 'Dream Builder Solutions');
			});
		}

		public static function forgotPasswordMessage($email, $password) {


			Mail::send('emails.forgot_password', array('email' => $email, 'password' => $password), function($message) use ($email)
			{
			    $message->to($email)->subject('Newly generated password - Dream Builder Solutions');
			    $message->from('hello@dreambuildersolutions.com', 'Dream Builder Solutions');
			});

		}

		public static function signupMessage($name, $email, $password)
		{

			Mail::send('emails.signup', array('email' => $email, 'password' => $password, 'name' => $name), function($message) use($name, $email)
			{
			    $message->to($email, $name)->subject('Welcome!');
			    $message->from('hello@dreambuildersolutions.com', 'Dream Builder Solutions');
			});
		}

	}
?>