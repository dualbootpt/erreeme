<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of readDir
 *
 * @author romualdo <paulo.romualdo at dualboot.pt>
 */
class readDir {
      private $dir; // DIR handle
      private $path;
      private $files=array();
      private $subdirs=array();
      
      function __construct($dirname){
          $this->path = $dirname;
          $this->dir = openDir($dirname) or die($php_errormsg);
          $filename = "";
          while (false !== ($filename = readdir($this->dir))){
              $fullpath = $this->path . '/' . $filename;
              if (is_file($fullpath)){
                  $this->files[] = $fullpath;
              }else{
                  $this->subdirs[] = $fullpath;
              }
          }
      }

      function __destruct() {
          closedir($this->dir);
      }
      
      // Get all the files in the directory
      function getFileList(){
          return $this->files;
      }
  
      // Get all the sub directories in the directory
      function getSubdirList(){
          return $this->subdirs;
      }
      
      function getPath(){
          return $this->path;
      }
  }
?>
