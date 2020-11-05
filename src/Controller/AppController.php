<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Http\Exception\NotFoundException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
     //   parent::initialize();

       // $this->loadComponent('RequestHandler');
        //$this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        parent::initialize();
$this->loadComponent('RequestHandler');
$this->loadComponent('Flash');
// add this like to check authentication result and lock your site
$this->loadComponent('Authentication.Authentication');
$this->Authentication->addUnauthenticatedActions(['districts']);
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
{
parent::beforeFilter($event);
// for all controllers in our application, make index and view
// actions public, skipping the authentication check
$this->Authentication->addUnauthenticatedActions(['display', 'login']);
}

public function allow($users){
  $u = $this->Authentication->getResult()->getData();
        
  if( in_array($u->role_id,$users) )
    return true;
  else
  throw new NotFoundException();

}

public function sendSMS($mobile,$message){
  $this->loadModel('Sms');
  $sms = $this->Sms->newEmptyEntity();
  $sms->mobile=$mobile;
  $sms->message=$message;
  $sms->status='';
  $senderid='FNIINF';
  if(stripos($message,'OTP')){
    $senderid='FNIOTP';
  }

  $this->Sms->save($sms);
return;  
    $xml_data ='<?xml version="1.0"?><parent><child><user>fni2020</user><key>aa826ab535XX</key><mobile>'.$mobile.'</mobile><message>'. $message .'</message><accusage>1</accusage><senderid>'.$senderid.'</senderid></child></parent>';
    
    $URL = "http://sms.bulkssms.com/submitsms.jsp"; 
    
                $ch = curl_init($URL);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                curl_close($ch);
    
}
}
