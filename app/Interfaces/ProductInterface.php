<?php
namespace App\Interfaces;

interface ProductInterface
{

    public function index();

    public function store($request);

    public function show($item);

    public function update($request,$item);

    public function destroy($item);

    public function activation($item);
}

?>
