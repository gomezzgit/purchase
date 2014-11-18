<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Plugin extends Eloquent implements UserInterface, RemindableInterface {

use UserTrait, RemindableTrait;

/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'plugin';

protected $fillable = ['id', 'orderid', 'type','demoURL',
			'orderURL','description','price'];

/**
 * Disabling Auto Timestamps
 *
 */
public $timestamps = false;


}