@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8 md:py-16 flex flex-col md:flex-row">
        <img src="https://cdn2.thedogapi.com/images/1lFmrzECl.jpg" alt="dog-image" class="self-center w-full md:w-96 h-full object-cover rounded">
        <div class="md:ml-10 lg:ml-20">
            <h2 class="text-4xl font-semibold mt-4 md:mt-0">Affenpinscher</h2>
            <div class="text-xs inline-block font-bold leading-sm uppercase px-3 py-1 my-2 bg-purple-200 text-purple-700 rounded">
                Hound
            </div>
            <div class="my-2">
                <span>3-6 kg</span>
                <span class="mx-2">|</span>
                <span>23-29 cm</span>
                <span class="mx-2">|</span>
                <span>10-13 years</span>
            </div>
            <div class="my-4 flex flex-col">
                <span class="text-gray-400">Characteristics</span>
                <span>Hunting birds, small mammals</span>
            </div>
            <div class="my-4 flex flex-col">
                <span class="text-gray-400">Temperament</span>
                <span>Affectionate, Athletic, Gentle, Intelligent, Quiet, Even Tempered</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-4xl font-semibold mb-4">Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <a href="#">
                <img class="h-80 w-full object-cover rounded hover:opacity-75 transition ease-in-out duration-150" src="https://cdn2.thedogapi.com/images/B1IcfgqE7.jpg" alt="dog_img">
            </a>
            <a href="#">
                <img class="h-80 w-full object-cover rounded hover:opacity-75 transition ease-in-out duration-150" src="https://cdn2.thedogapi.com/images/By9zNgqE7.jpg" alt="dog_img">
            </a>
            <a href="#">
                <img class="h-80 w-full object-cover rounded hover:opacity-75 transition ease-in-out duration-150" src="https://cdn2.thedogapi.com/images/C3KfxN2DG.jpg" alt="dog_img">
            </a>
        </div>
    </div>
@endsection