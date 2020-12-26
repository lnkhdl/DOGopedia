<?php

namespace App\Http\Controllers;

use App\Services\Api;
use App\ViewModels\DogsViewModel;
use App\ViewModels\DogViewModel;
use App\ViewModels\RandomDogsViewModel;

class DogsController extends Controller
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Display random breeds.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Not every image has info about breeds, that is why more is taken and then limited to 6 in the ViewModel
        $data = $this->api->getImages('50', 'small');
        $viewModel = new RandomDogsViewModel($data, 6);

        return view('index', $viewModel);
    }

    /**
     * Display all breeds.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = $this->api->getAll();
        $viewModel = new DogsViewModel($data);

        return view('all', $viewModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->api->getSingleWithImages($id);
        $viewModel = new DogViewModel($data);

        return view('show', $viewModel);
    }
}
