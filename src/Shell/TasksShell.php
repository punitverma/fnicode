<?php
declare(strict_types=1);

namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use App\Controller\PayoutController;
/**
 * Tasks shell command.
 */
class TasksShell extends Shell
{
    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser(): ConsoleOptionParser
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main($name=null)
    {
        $pay = new PayoutController();
        if($name=='admin_dash'){
            $pay->admindashborad();
        }else
        if($name=='payout'){
            $pay->generateenolpqxudred();
        }
        else
        if($name=='distb_dash'){
            $pay->distbdashborad();
        }

    }
}
