<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Other extends Eloquent implements UserInterface, RemindableInterface {

use UserTrait, RemindableTrait;

/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'other';

protected $fillable = ['id', 'orderid', 'type','demoURL',
			'description','price'];

/**
 * Disabling Auto Timestamps
 *
 */
public $timestamps = false;


}