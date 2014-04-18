<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Coordcenter Class
 *
 * @package   ExpressionEngine
 * @category  Plugin
 * @author    Samuel J. King
 * @copyright Copyright (c) 2012, Samuel J. King
 * @link      http://www.ehousestudio.com
 */

$plugin_info = array(
  'pi_name'         => 'Coordinate Center',
  'pi_version'      => '1.0',
  'pi_author'       => 'Samuel J. King',
  'pi_author_url'   => 'http://www.ehousestudio.com',
  'pi_description'  => 'Returns a the center points of a given set of comma separated XY coordinates (from an image map, for example)',
  'pi_usage'        =>  coordcenter::usage()
);

class coordcenter {

  public $return_data = '';
  
  public function __construct()
  {
    $this->EE =& get_instance();
    $coordinates = $this->EE->TMPL->fetch_param('coordinates');
  }
  
  public function getX()
  {
    $coordinates = explode(',', $coordinates);
    $xc = array();
    foreach ($coors as $key => $value)
    {
      if ($key%2==0)
      {
        $xc[] = $value;
      }
    }
    $xc_avg = 0;
    foreach ($xc as $key => $value)
    {
      $xc_avg += $value;
    }
    $this->return_data = floor($xc_avg / count($xc));
  }
  
  public function getY()
  {
    $coordinates = explode(',', $coordinates);
    $yc = array();
    foreach ($coors as $key => $value)
    {
      if ($key%2!=0)
      {
        $yc[] = $value;
      }
    }
    $yc_avg = 0;
    foreach ($yc as $key => $value)
    {
      $yc_avg += $value;
    }
    $this->return_data = floor($yc_avg / count($yc));
  }
  
  /**
  * Usage
  *
  * This function describes how the plugin is used.
  *
  * @access  public
  * @return  string
  */
  public static function usage()
  {
    ob_start();  ?>
  

  <?php
    $buffer = ob_get_contents();
    ob_end_clean();
  
    return $buffer;
  }
  // END
}

/* End of file pi.coordcenter.php */
/* Location: ./system/expressionengine/third_party/plugin_name/pi.coordcenter.php */