<?php
if(!defined('CORE'))exit("error!");

class dyz_file{
    var $root_path="f:/wamp/www/dyz.duyiwang.cn";
    var $file_dir;
    var $type_maping=array("gif", "png", "jpg","jpeg","txt","avi","doc","mp3","xls");
    
    function __construct($file_dir='')
    {
        $this->dyz_file($file_dir);
    }
    
    function dyz_file($file_dir='')
    {
        if ($file_dir)
        {
            $this->file_dir = $file_dir;
        }
        else
        {
            $this->file_dir = "/file";
        }
    }
    
    //创建目录
    function upload_file($upload, $file_name = ''){
        /* 创建当月目录 */
        $dir = date('Ym');
    
    
        $dir = $this->root_path . $this->file_dir . '/' . $dir . '/';
    
        /* 如果目标目录不存在，则创建它 */
        if (!file_exists($dir))
        {
            if (!mkdir($dir,0777,true))
            {
                /* 创建目录失败 */
                return false;
            }
        }
    
        if (empty($file_name))
        {
            $file_name = $this->unique_name($dir);
            $file_name = $dir . $file_name . $this->get_filetype($upload['name']);
        }
        if ($this->move_file($upload, $file_name))
        {
            return str_replace($this->root_path, '', $file_name);
        }
        else
        {
            return false;
        }
    }
    //过滤空数据
    function delEmpty($v){
        return $v!="";
    }
    
}