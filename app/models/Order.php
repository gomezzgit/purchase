<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Order extends Eloquent implements UserInterface, RemindableInterface {

use UserTrait, RemindableTrait;

/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'orders';

protected $fillable = ['customer_name', 'chinese_name', 'english_name', 
		'state','requested_at','authorised_at','requested_by','authorised_by',
		'prefer_authorizer','final_price','comment'];

/**
 * Disabling Auto Timestamps
 *
 */
public $timestamps = false;


}