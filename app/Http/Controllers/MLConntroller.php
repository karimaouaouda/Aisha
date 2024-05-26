<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\Dataset\CsvDataset;
use Phpml\ModelManager;

class MLConntroller extends Controller
{


    protected $filepath;

    public function __construct() {
        $this->filepath = base_path("/storage/app/public/model.txt");
    }
    public function index()
    {

        $manager = new ModelManager();
        $classifier = $manager->restoreFromFile($this->filepath);
        dd($classifier);
        dd($classifier->predict(["JOAAO iPad Mini Hard Case Protective Heavy Duty Cover Compatible for Apple iPad Mini 3/2/1, Shockproof Drop Resistance Anti-Slip Cover (ipadmini123, LightBlue) Size name:ipadmini123                                                                                 |                            Colour:LightBlue   Best complete protection for your iPad mini tablet"]));
    }

    public function getRecommandations(){
        $user_id = auth()->user()->id;
    }
}
