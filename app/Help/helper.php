<?php
	
	/* Option functions */

	#users
	if(! function_exists('userType')){
		/**
		* Get type of the User
		* 
		* @return array
		*/
		function userType()
		{
			$userType = [
				'User',
				'Admin',
				'Supervisor'
			];
			return $userType;
		}
	}

	if(! function_exists('GetUserType')){
		/**
		* Get type of the User
		* 
		* @var integer $type
		* @return void
		*/
		function GetUserType($type)
		{
			if($type == 0){
				$strType = 'User';
			}elseif($type == 1){
				$strType = 'Admin';
			}
			else{
				$strType = 'Supervisor';
			}
			return $strType;
		}
	}

	if(! function_exists('getGender')){
		/**
		* Get Gender of the User
		* 
		* @return array
		*/
		function getGender()
		{
			$gender = [
				'Male',
				'Female'
			];
			return $gender;
		}
	}

	if(! function_exists('getTypeMessage')){
		/**
		* Get type of the message
		* 
		* @return array
		*/
		function getTypeMessage()
		{
			$Type = [
				'1' => 'Thanks',
				'2' => 'Problem',
				'3' => 'Suggestion',
				'4' => 'Question',
				'5' => 'Other'
			];
			return $Type;
		}
	}

	

	#pockets
	if(! function_exists('pocketType')){
		/**
		* Get type of the pocket
		* 
		* @return array
		*/
		function pocketType()
		{
			$pocketType = [
				'Public',
				'Protected',
				'Private'
			];
			return $pocketType;
		}
	}

	if(! function_exists('GetPocketType')){
		/**
		* Get type of the pocket
		* 
		* @var integer $type
		* @return void
		*/
		function GetPocketType($type)
		{
			if($type == 0){
				$strType = 'Public';
			}elseif($type == 1){
				$strType = 'Protected';
			}
			else{
				$strType = 'Private';
			}
			return $strType;
		}
	}

	if(! function_exists('GetPocketTypeLabel')){
		/**
		* Get type of the pocket
		* 
		* @var integer $type
		* @return void
		*/
		function GetPocketTypeLabel($type)
		{
			if($type == 0){
				$strType = 'success';
			}elseif($type == 1){
				$strType = 'warning';
			}
			else{
				$strType = 'danger';
			}
			return $strType;
		}
	}

	if(! function_exists('GetPocketImage')){
		/**
		* Get image of the pocket by the given type of the pocket
		* 
		* @var integer $type
		* @return void
		*/
		function GetPocketImage($type)
		{
			if($type == 0){
				$image = Request::root().'/public/website/img/public.png';
			}elseif($type == 1){
				$image = Request::root().'/public/website/img/protected.png';
			}
			else{
				$image = Request::root().'/public/website/img/private.png';
			}
			return $image;
		}
	}

	if(! function_exists('chackUrl')){
		/**
		* Check url 
		* 
		* @var string $url
		* @return void
		*/
		function chackUrl($url)
		{
			if(strpos($url, 'http://') !== false || strpos($url, 'https://') !== false){
				$validUrl = $url;
			}else{
				$validUrl = 'http://'.$url;
			}
			
			return $validUrl;
		}
	}

	/*  Database Quick Functions */

	// Sit Main settings and counts 

	if(! function_exists('getSettings')){
		/**
		* Get Settings
		* 
		* @param string $settingName
		* @return void
		*/

		function getSettings($settingName = 'title'){
	    return \App\SiteSetting::where('name', $settingName)->get()[0]->value;
		}
	}

	if(! function_exists('getImgesByName')){
		/**
		* Get Images
		* 
		* @param string $imageName
		* @return void
		*/

		function getImgesByName($imageName = 'title'){
	    return \App\WebsiteImages::where('name', $imageName)->get()[0]->image;
		}
	}

	if(! function_exists('getPageData')){
		/**
		* Get page by the given id and value
		* 
		* @param integer $id
		* @param string $get
		* @return void
		*/

		function getPageData($id, $get){
	    return \App\Page::where('id', $id)->get()[0]->$get;
		}
	}


	// User settings

	if(! function_exists('getImage')){
		/**
		* Get Image By the given id
		* 
		* @param integer $id
		* @return void
		*/

		function getImage($id){
	    $gender = \App\User::where('id', $id)->get()[0]->gender;
	    if($gender == 0){
	    	$image = Request::root().'/public/website/img/male.png';
	    }else{
	    	$image = Request::root().'/public/website/img/female.png';
	    }
	    return $image;
		}
	}



	if(! function_exists('getUserPocketsCount')){
		/**
		* Get Count of the user pocket by the given id
		* 
		* @param integer $id
		* @return void
		*/

		function getUserPocketsCount($id){
			 return \App\Pocket::where('user_id', $id)->count();
		}
	}

	if(! function_exists('checkFollow')){
		/**
		* Get Count of the user pocket by the given id
		* 
		* @param integer $id
		* @return void
		*/

		function checkFollow($follow, $follower){
			 return \App\Follow::where('follow', $follow)->where('user_id', $follower)->count();
		}
	}

	if(! function_exists('GetCountFollow')){
		/**
		* Get Count of the user pocket by the given id
		* 
		* @param integer $id
		* @return void
		*/

		function GetCountFollow($follow){
			 return \App\Follow::where('follow', $follow)->count();
		}
	}

	if(! function_exists('GetCountFollower')){
		/**
		* Get Count of the user pocket by the given id
		* 
		* @param integer $id
		* @return void
		*/

		function GetCountFollower($follower){
			 return \App\Follow::where('user_id', $follower)->count();
		}
	}

	if(! function_exists('GetCountShared')){
		/**
		* Get Count of the user pocket by the given id
		* 
		* @param integer $id
		* @return void
		*/

		function GetCountShared($id){
			 return \App\Share::where('user_id', $id)->count();
		}
	}

	if(! function_exists('getUserData')){
		/**
		* Get  user data by the given id
		* 
		* @param integer $id
		* @return array
		*/

		function getUserData($id, $x){
			 $data = \App\User::findOrFail($id)->toArray();
			 foreach ($data as $key => $value) {
			 	$array[$key] = $value;
			 }

			 return $array[$x];
		}
	}

	if(! function_exists('getPocketData')){
		/**
		* Get pocket data by the given id
		* 
		* @param integer $id
		* @return array
		*/

		function getPocketData($id, $x){
			 $data = \App\Pocket::where('user_id', $id)->where('type', 0)->orderBy('created_at', 'desc')->first()->toArray();
			 if(!empty($data)){
			 foreach ($data as $key => $value) {
			 	$array[$key] = $value;
			 }
			}
			else{
				$array[$x] = null;
			}

			 return $array[$x];
		}
	}

	/*  To Get Unreading Messages */
	function getUreadMessages(){
	  return \App\Contact::where('view', 0)->orderBy('created_at', 'DESC')->get();
	}

/*  To Get Count Of Unreading Messages */
	function getCountUreadMessages(){
	  return \App\Contact::where('view', 0)->count();
	}





?>