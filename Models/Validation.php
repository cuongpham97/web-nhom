<?php

class Validation
{
	protected $error;

	public function isGender($gender)
	{
		$regex = '/(^Mr\.$)|(^Ms\.$)|(^Mrs\.$)/';

		if (empty($gender)) {
			$this->error['gender'] = "Giới tính không được để trống";
		} else {
			if (!preg_match($regex, $gender)) {
				$this->error['gender'] = 'Bạn nhập sai giới tính';
			}	
		}

		return $this;
	}

	public function isName($name)
	{
		$regex = '/^[aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆ fFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+$/';

		if ($name == '') {
			$this->error['name'] = "Tên không được để trống";
		} else {
			if (!preg_match($regex, $name)) {
				$this->error['name'] = 'Bạn nhập sai tên';
			}	
		}

		return $this;
	}

	public function isEmail($email)
	{
		$regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

		if ($email == '') {
			$this->error['email'] = "Email không được để trống";
		} else {
			if (!preg_match($regex, $email)) {
				$this->error['email'] = 'Bạn nhập sai email';
			}	
		}

		return $this;
	}

	public function isPhone($phone)
	{
		$regex = '/^[0-9\-\+]{9,15}$/';

		if ($phone == '') {
			$this->error['phone'] = "Số điện thoại không được để trống";
		} else {
			if (!preg_match($regex, $phone)) {
				$this->error['phone'] = 'Bạn nhập sai số điện thoại';
			}	
		}

		return $this;
	}

	public function isPassword($password)
	{
		$regex = '/^([A-Za-z0-9#?!@$%^&*-]{8,})$/';

		if ($password == '') {
			$this->error['password'] = 'Mật khẩu không được để trống';
		} else {
			if (!preg_match($regex, $password)) {
				$this->error['password'] = 'Bạn nhập sai mật khẩu';
			}	
		}

		return $this;
	}

	public function isComment($cmt)
	{
		$regex = '/.{1,1000}/';

		if ($cmt == '') {
			$this->error['comment'] = 'Comment không được để trống';
		} else {
			if (!preg_match($regex, $cmt)) {
				$this->error['comment'] = 'Comment quá dài';
			}
		}

		return $this;
	}

	public function getError()
	{
		return $this->error;
	}
}