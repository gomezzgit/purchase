<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Domainname extends Eloquent implements UserInterface, RemindableInterface {

use UserTrait, RemindableTrait;

/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'domainname';

protected $fillable = ['id', 'orderid', 'type','name',
			'serviceYear','description','price'];

/**
 * Disabling Auto Timestamps
 *
 */
public $timestamps = false;


}