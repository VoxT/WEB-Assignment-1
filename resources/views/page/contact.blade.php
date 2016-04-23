@extends('templates.master')
 
@section('content')

<section>
<div class="container">
    <div class="content">
        <div class="title">
        	<?php foreach ($admin as $key){
        		echo $key->ten;
        		echo '<br>';
        	} ?>
        </div>
    </div>
</div>
</section>

@stop
