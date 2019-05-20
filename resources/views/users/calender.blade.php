@extends('layouts.master')
	<div class="container" style=" margin-top: 50px">

  {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    </div>