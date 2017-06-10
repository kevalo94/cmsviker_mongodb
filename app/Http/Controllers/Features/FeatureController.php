<?php

namespace App\Http\Controllers\Features;

use Illuminate\Http\Request;
use App\Feature;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->modData = [
            'modTitle' => trans('modules.mod_features_title'),
            'modMenu' => [
                'index' => [
                    trans('config.app_back') => [
                        'class' => 'active',
                        'href' => route('admin'),
                        'atribute' => [],
                    ],
                ],
                'sizes' => [
                    trans('config.app_back') => [
                        'href' => route('features'),
                        'atribute' => [],
                    ],
                    trans('config.app_create') => [
                        'href' => route('admin'),
                        'atribute' => [],
                    ],
                ],
            ],

            'modBreadCrumb' => [
                'index' => [
                    trans('config.app_home') => [
                        'href' => route('admin'),
                    ],
                    trans('modules.mod_features_title') => [
                         'active' => true
                    ],
                ],
                'sizes' => [
                    trans('config.app_home') => [
                        'href' => route('admin'),
                    ],
                    trans('modules.mod_features_title') => [
                        'href' => route('features'),
                    ],
                     trans('modules.mod_features_sizes_list_title') => [
                        'active' => true
                    ]
                ],
            ]
          ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return $this->view('admin.features.index',  compact('features'));
    }

    public function sizes(){
        $plugins[] = 'Datatable';
        return $this->view('admin.features.sizes', compact('plugins'));
    }

    public function colors(){
        dd("colors");
    }
}
