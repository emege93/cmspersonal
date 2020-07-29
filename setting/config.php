<?php

error_reporting( error_reporting() & ~E_NOTICE );

class Config{
  const SERVERNAME = 'localhost';
  const USERNAME = 'root';
  const PASSWORD = '';
  const DATABASE =  'cms_solvetic';
  const URL = 'http://localhost/cms/public/';
  const PREFIX = 'solvetic_';
  const PREFIX_PAGE = 'page_';
  const PATH_ROOT = 'cms/public/';
}
?>
