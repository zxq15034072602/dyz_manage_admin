<?php
if(!defined('CORE'))exit("error!");
class dyz_image
{
     var $root_path="e:/dyz.duyiwang.cn";
     //var $root_path="e:/wamp/wamp/www/apptupian/dyz.duyiwang.cn";
     var $images_dir;
     var $type_maping = array(1 => 'image/gif', 2 => 'image/jpeg', 3 => 'image/png');
    
    function __construct($images_dir='')
    {
        $this->dyz_image($images_dir);
    }
    
    function dyz_image($images_dir='')
    {
        if ($images_dir)
        {
            $this->images_dir = $images_dir;
        }
        else
        {
            $this->images_dir = "/img";
        }
    }
    /**
     * 图片上传的处理函数
     *
     * @access      public
     * @param       array       upload       包含上传的图片文件信息的数组
     * @param       array       img_name     上传图片名称，为空则随机生成
     * @return      mix         如果成功则返回文件名，否则返回false
     */
    function upload_image($upload, $img_name = ''){
        /* 创建当月目录 */
        $dir = date('Ym');
        
        
        $dir = $this->root_path . $this->images_dir . '/' . $dir . '/';
        
        /* 如果目标目录不存在，则创建它 */
        if (!file_exists($dir))
        {
            if (!mkdir($dir,0777,true))
            {
                /* 创建目录失败 */
                return false;
            }
        }
        
        if (empty($img_name))
        {
            $img_name = $this->unique_name($dir);
            $img_name = $dir . $img_name . $this->get_filetype($upload['name']);
        }
        if ($this->move_file($upload, $img_name))
        {
            return str_replace($this->root_path, '', $img_name);
        }
        else
        {
            return false;
        }
    }
    /**
     *  生成指定目录不重名的文件名
     *
     * @access  public
     * @param   string      $dir        要检查是否有同名文件的目录
     *
     * @return  string      文件名
     */
    function unique_name($dir)
    {
        $filename = '';
        while (empty($filename))
        {
            $filename = dyz_image::random_filename();
            if (file_exists($dir . $filename . '.jpg') || file_exists($dir . $filename . '.gif') || file_exists($dir . $filename . '.png'))
            {
                $filename = '';
            }
        }
    
        return $filename;
    }
    /**
     * 生成随机的数字串
     *
     * @author: weber liu
     * @return string
     */
    static function random_filename()
    {
        $str = '';
        for($i = 0; $i < 9; $i++)
        {
            $str .= mt_rand(0, 9);
        }
    
        return time() . $str;
    }
    /**
     *  返回文件后缀名，如‘.php’
     *
     * @access  public
     * @param
     *
     * @return  string      文件后缀名
     */
    function get_filetype($path)
    {
        $pos = strrpos($path, '.');
        if ($pos !== false)
        {
            return substr($path, $pos);
        }
        else
        {
            return '';
        }
    }
    /**
     * 检查图片类型
     * @param   string  $img_type   图片类型
     * @return  bool
     */
    function check_img_type($img_type)
    {
        return $img_type == 'image/pjpeg' ||
        $img_type == 'image/x-png' ||
        $img_type == 'image/png'   ||
        $img_type == 'image/gif'   ||
        $img_type == 'image/jpeg';
    }
    function move_file($upload, $target)
    {
        if (isset($upload['error']) && $upload['error'] > 0)
        {
            return false;
        }
       
            
        if (!move_uploaded_file($upload['tmp_name'], $target))
        {
            return false;
        }
        
        return true;
    	
    }
}