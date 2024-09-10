<?php
namespace App\Interfaces;

interface BrandInterface
{

    public function index();

    public function store($request);

    public function show($item);

    public function update($request,$item);

    public function destroy($item);




}

?>
