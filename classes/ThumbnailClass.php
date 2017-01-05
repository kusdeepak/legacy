<?php
class ThumbnailClass
{

	private static $thumb_instance;
	
	/**
     * Create ThumbnailClass object
     *
     * @return object $thumb_instance - Thumbnail Object
     */
    public static function getInstance(){ 
        // If instance exists then return it, else create new instance and return it
        if (!self::$thumb_instance)
        {
            self::$thumb_instance = new ThumbnailClass();
        }
        return self::$thumb_instance;
    }
	/**
     * Create Thumbnail and store it in specified folder
     *
     * @return boolean - true or false
     */
    public function thumbnail($filethumb,$fileloc,$Twidth,$Theight,$tag,$maxheight){
		
       list($width,$height,$type,$attr)=getimagesize($fileloc);
		switch($type)
		{
			case 1:
				$img = ImageCreateFromGIF($fileloc);
			break;
			case 2:
				$img=ImageCreateFromJPEG($fileloc);
			break;
			case 3:
				$img=ImageCreateFromPNG($fileloc);
			break;
		}
		if($tag == "width") //width contraint
		{
			$Theight=round(($height/$width)*$Twidth);
			
			//die();
		}
		elseif($tag == "height") //height constraint
		{
			$Twidth=round(($width/$height)*$Theight);
			
			//die();
		}
		else
		{
			if($width > $height)
				$Theight=round(($height/$width)*$Twidth);
			else
				$Twidth=round(($width/$height)*$Theight);
			
			//die();
		}
		
		//die();
		$thumb=imagecreatetruecolor($Twidth,$Theight);
		if(imagecopyresampled($thumb,$img,0,0,0,0,$Twidth,$Theight,$width,$height))
		{
			$cropy = 0;
			if($Theight>$maxheight)
			{
				$cropy = ceil(($Theight-$maxheight)/2);
				$Theight = $maxheight;
				$thumbnew=imagecreatetruecolor($Twidth,$maxheight);
				@imagecopyresampled($thumbnew,$thumb,0,0,0,$cropy,$Twidth,$maxheight,$Twidth,$maxheight);
				switch($type)
				{
					
					case 1:
						ImageGIF($thumbnew,$filethumb);
					break;
					case 2:
						ImageJPEG($thumbnew,$filethumb);
					break;
					case 3:
						ImagePNG($thumbnew,$filethumb);
					break;
				}
			}
			else
			{
				switch($type)
				{
					case 1:
						ImageGIF($thumb,$filethumb);
					break;
					case 2:
						ImageJPEG($thumb,$filethumb);
					break;
					case 3:
						ImagePNG($thumb,$filethumb);
					break;
				}
			}
			//chmod($filethumb,0777);
			return true;
		}
    }
	
	
}
?>